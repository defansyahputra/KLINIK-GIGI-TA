<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();

        $this->load->library('tank_auth');


        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->data['dataUser'] = $this->session->userdata('data_ldap');

            $this->data['user_id'] = $this->tank_auth->get_user_id();
            $this->data['username'] = $this->tank_auth->get_username();
            $this->data['email'] = $this->tank_auth->get_email();

            $profile = $this->tank_auth->get_user_profile($this->data['user_id']);

            $this->data['profile_name'] = $profile['name'];
            $this->data['profile_foto'] = $profile['foto'];

            foreach ($this->tank_auth->get_roles($this->data['user_id']) as $val) {
                $this->data['role_id'] = $val['role_id'];
                $this->data['role'] = $val['role'];
                $this->data['full_name_role'] = $val['full'];
            }

            $this->data['link_active'] = 'Pegawai';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Pegawai');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("User_web_list_model");
            $this->load->model("Usersmanagement_model");
        }
    }

    public function index()
    {
        $this->data['title'] = 'Pasien';

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Pasien',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('Pasien')
        ];

        $this->data['listuser'] = $this->Usersmanagement_model->getAllUser();

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('component/navbar', $this->data);
        $this->load->view('pasien/index', $this->data);
        $this->load->view('component/footer');
    }

    public function form()
    {
        $this->data['title'] = 'Pasien';

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('component/navbar', $this->data);
        $this->load->view('pasien/form', $this->data);
        $this->load->view('component/footer', $this->data);
    }
    function add()
    {
        $this->data['title'] = "tambah Pasien";



        $use_username = $this->config->item('use_username', 'tank_auth');
        if ($use_username) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|callback__check_username_blacklist|callback__check_username_exists');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        // Check for additional fields
        $registration_fields = (bool)$this->config->item('registration_fields', 'tank_auth') ? $this->config->item('registration_fields', 'tank_auth') : array();
        if ($registration_fields) {
            foreach ($registration_fields as $val) {
                $this->data['registration_fields'][] = $val;
                list($name, $label, $rules, $type) = $val;
                $this->form_validation->set_rules($name, $label, $rules);

                // Check if you need to query a db
                if ($type == 'dropdown') {
                    $selection = $val[4];

                    if (is_string($val[4])) {
                        $default = isset($val[5]) ? $val[5] : NULL;
                        preg_match('/\w+(?=\.)/', $selection, $dbname);
                        preg_match_all('/(?<=\.)\w+/', $selection, $fields);
                        $fields = $fields[0];

                        // Create the dropdown field
                        //$this->data['dropdown_name'] = $name;
                        $this->data['dropdown_items'][$name] = $this->tank_auth->create_regdb_dropdown($dbname, $fields);
                        $this->data['dropdown_items_default'][$name] = $default;
                        $this->data['db_dropdowns'][] = $name;
                    } else {
                        $default = isset($val[5]) ? $val[5] : NULL;
                        $this->data['dropdown_simple'][$name] = $selection;
                        $this->data['dropdown_simple_default'][$name] = $default;
                    }
                }
            }
        }

        $data['errors'] = array();

        $email_activation = false;

        $config['upload_path'] = './assets/media/profiles';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 15000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() || $this->form_validation->run() && $this->upload->do_upload('foto')) {
            // validation ok
            $foto = $this->upload->data();
            $custom['foto'] = $foto["file_name"];

            // Custom registration fields
            $registration_fields = (bool)$this->config->item('registration_fields', 'tank_auth') ? $this->config->item('registration_fields', 'tank_auth') : array();
            if ($registration_fields) {
                // $datatypes = $this->tank_auth->get_profile_datatypes();
                foreach ($this->config->item('registration_fields', 'tank_auth') as $val) {
                    $name = $val[0];
                    $value = $this->form_validation->set_value($name);
                    $custom[$name] = $value;
                }

                // Remove all NULL values so MySQL will use the default value
                foreach ($custom as $key => $val) {
                    if (is_null($val)) unset($custom[$key]);
                }

                $custom = serialize($custom);
            } else {
                $custom = '';
            }

            // Create the user here
            if (!is_null($data = $this->tank_auth->create_user(
                $use_username ? $this->form_validation->set_value('username') : '',
                $this->form_validation->set_value('email'),
                $this->form_validation->set_value('password'),
                $email_activation,
                $custom
            ))) {                                    // success

                $this->data['site_name'] = $this->config->item('website_name', 'tank_auth');

                if ($email_activation) {                                    // send "activate" email
                    $this->data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $this->data['email'], $data);

                    unset($this->data['password']); // Clear password (just for any case)

                } else {
                    if ($this->config->item('email_account_details', 'tank_auth')) {    // send "welcome" email

                        $this->_send_email('welcome', $this->data['email'], $data);
                    }
                    unset($this->data['password']); // Clear password (just for any case)
                }

                redirect('Pasien');
            } else {
                $errors = $this->tank_auth->get_error_message();

                foreach ($errors as $k => $v) $this->data['errors'][$k] = $this->lang->line($v);
            }
        }
        // else {

        // $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        // $this->data['debug'] = $this->tank_auth->debug('14');
        $this->data['use_username'] = $use_username;

        $this->data['action'] = site_url('Usersmanagement/add');
        $this->data['url'] = site_url('Usersmanagement');

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('component/navbar', $this->data);
        $this->load->view('usersmanagement/form_register', $this->data);
        $this->load->view('component/footer');
        // }
    }
}
