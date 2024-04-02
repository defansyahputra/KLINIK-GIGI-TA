-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 10:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2e841f28491f4b7c492930fb6c09b8a1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1554634874, 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"site_lang\";s:7:\"english\";s:7:\"user_id\";s:1:\"1\";s:8:\"username\";s:4:\"iiky\";s:6:\"status\";s:1:\"1\";s:5:\"roles\";a:1:{i:0;a:4:{s:7:\"role_id\";s:1:\"1\";s:4:\"role\";s:5:\"admin\";s:4:\"full\";s:13:\"Administrator\";s:7:\"default\";s:1:\"0\";}}s:12:\"user_profile\";a:13:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:16:\"Tintapuccino CMS\";s:6:\"gender\";s:1:\"m\";s:13:\"tanggal_lahir\";s:10:\"0000-00-00\";s:6:\"alamat\";s:0:\"\";s:4:\"kota\";s:0:\"\";s:12:\"tentang_saya\";s:0:\"\";s:4:\"foto\";s:12:\"no_image.jpg\";s:3:\"dob\";s:10:\"0000-00-00\";s:7:\"country\";s:0:\"\";s:8:\"timezone\";s:0:\"\";s:7:\"website\";s:0:\"\";s:8:\"modified\";s:19:\"2018-07-17 22:15:44\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(10, '::1', 'user_b', '2024-03-15 06:21:41'),
(11, '::1', 'user_b', '2024-03-15 06:23:07'),
(12, '::1', 'user_b', '2024-03-15 06:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_parent` int(11) NOT NULL,
  `nama_menu` varchar(70) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `kategori` enum('Controller','Link') NOT NULL,
  `href` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `sort` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_menu_parent`, `nama_menu`, `icon`, `kategori`, `href`, `status`, `sort`) VALUES
(2, 7, 'Pengaturan Pengguna', '', 'Controller', 'Usersmanagement', 'Y', '1'),
(3, 7, 'Pengaturan Hak Akses', '', 'Controller', 'Roles', 'Y', '1'),
(6, 7, 'Pengaturan Menu', '', 'Controller', 'Menu', 'Y', '2'),
(7, 0, 'Pengaturan', 'bx bxs-cog', 'Controller', '', 'Y', '2'),
(8, 7, 'Pengaturan Modul', '', 'Controller', 'Permission', 'Y', '3'),
(9, 0, 'Dashboard', 'bx bxs-dashboard', 'Controller', 'Dashboard', 'Y', '1'),
(10, 0, 'Pasien', 'bx bxs-heart', 'Controller', 'Pasien', 'Y', '1'),
(37, 0, 'Pengguna Web', 'bx bx-user', 'Controller', '', 'Y', '1'),
(39, 0, 'Pegawai', 'bx bx-group', 'Controller', 'Pegawai', 'Y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `overrides`
--

CREATE TABLE `overrides` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `allow` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `permission` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission`, `description`, `parent`, `sort`) VALUES
(2, 'Menu', 'Menu Management', NULL, NULL),
(3, 'Permission', 'Permission Management', NULL, NULL),
(4, 'Roles', 'Role Management', NULL, NULL),
(5, 'Usersmanagement', 'User Management', NULL, NULL),
(6, 'Dashboard', 'Dashboard', NULL, NULL),
(7, 'Pegawai', 'Pegawai', NULL, NULL),
(8, 'Pasien', 'Pasien', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `full`, `default`) VALUES
(1, 'Admin', 'Administrator', 0),
(2, 'User', 'User', 1),
(3, 'Sup Admin', 'Super Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(0, 2),
(0, 3),
(0, 4),
(0, 5),
(0, 6),
(0, 0),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoices`
--

CREATE TABLE `tb_invoices` (
  `id_invoice` int(11) NOT NULL,
  `id_rekamedis` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekamedis`
--

CREATE TABLE `tb_rekamedis` (
  `id_rekamedis` int(11) NOT NULL,
  `id_users` int(10) DEFAULT NULL,
  `subjective` text DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `assement` text DEFAULT NULL,
  `plan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekamedis`
--

INSERT INTO `tb_rekamedis` (`id_rekamedis`, `id_users`, `subjective`, `objective`, `assement`, `plan`) VALUES
(1, 1, '1asdasdasd', 'asdasdasd', 'asdasda', 'asdasdas'),
(2, 1, '2asdasdasdas', 'asdasdasda', 'asdasdasdas', 'asdasdasdas'),
(3, 1, '3asdasdasd', 'asdasdasd', 'asdasda', 'asdasdas'),
(4, 1, '4asdasdasdas', 'asdasdasda', 'asdasdasdas', 'asdasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL COMMENT 'For acct approval.',
  `meta` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `last_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `approved`, `meta`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$10$gtANPNMiG2UEL9fPbbJaBOKY1juVGP8PhYCKJWuV6yYIuz29qJF7W', 'defansyahputra@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"62c4714b325a0\";s:4:\"name\";s:11:\"Raihan Arif\";}', '::1', '2024-03-08 11:36:07', '2022-07-05 19:13:47', '2024-03-15 06:13:34'),
(2, 'sup_admin', '$2a$10$.45q.HlDPIiFaaILIMJfHe7YXmqSKqB8AtZXlplDZgWLqTeBszIzu', 'khuzen.ard@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"65d085a3965ff\";s:4:\"name\";s:20:\"Khuzainil Ardiansyah\";}', '::1', '2024-03-15 08:22:14', '2024-02-17 11:08:35', '2024-03-15 07:22:14'),
(3, 'user_b', '0192023a7bbd73250516f069df18b500', 'test@gmailo.com', 1, 0, NULL, NULL, '2024-03-15 07:18:48', NULL, NULL, NULL, '', '', '2024-03-15 07:18:48', '2024-03-15 07:18:48', '2024-03-15 06:23:21'),
(7, 'userbiasa', '$2a$10$i1LPNXNsCeZjf37EYn2UTeQ2a68dCiU.SvO0RXTq9DsuX.ZDu1vQG', 'marif666@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"65f3f27635614\";s:4:\"name\";s:5:\"marif\";}', '::1', '2024-03-15 08:13:29', '2024-03-15 08:02:14', '2024-03-15 07:13:29'),
(8, 'userbiasa2', '$2a$10$kMdDjfuLaUtEEc54chq0J.qczjDgpcBFnnnlBLR9pDDM4yAMNXJse', 'binta@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"65f3f5dd73788\";s:4:\"name\";s:5:\"binta\";}', '::1', '2024-03-15 08:17:09', '2024-03-15 08:16:45', '2024-03-15 07:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('bbecaa5ab748280b48db65737ee04f49', 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '172.16.10.1', '2022-03-13 16:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nipeg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT '',
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `nipeg`, `name`, `gender`, `tanggal_lahir`, `alamat`, `nohp`, `foto`, `modified`) VALUES
(1, NULL, 'Defan Syahputra', 'P', '2000-02-06', 'Jakarta', '085823139', '62c4714b325a0', '2024-03-15 08:25:53'),
(2, NULL, 'Hari dhova', 'P', '2001-03-09', 'Mampang IV', '085823139', '65d085a3965ff', '2024-03-15 08:26:04'),
(3, NULL, 'Reza Fauzi Nur Taufiq', 'P', '2000-03-02', 'Jl Randu', '0894234', '65d19a456fea3', '2024-03-15 08:28:48'),
(5, NULL, 'Iskandar Muda', 'W', '0000-00-00', 'Pelajar Pejuang', '08769123', '65d8b47d883f6', '2024-03-15 08:29:00'),
(7, NULL, 'marif', 'P', '2000-01-29', 'jl.air Tawar', '0858135733', '65f3f27635614', '2024-03-15 08:30:39'),
(8, NULL, 'binta1', 'P', '2000-03-19', 'jl.raya bogos', '0858124900', '65f3f5dd73788', '2024-03-15 08:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 3),
(3, 2),
(5, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`) USING BTREE;

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_invoices`
--
ALTER TABLE `tb_invoices`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_rekamedis` (`id_rekamedis`);

--
-- Indexes for table `tb_rekamedis`
--
ALTER TABLE `tb_rekamedis`
  ADD PRIMARY KEY (`id_rekamedis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_invoices`
--
ALTER TABLE `tb_invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rekamedis`
--
ALTER TABLE `tb_rekamedis`
  MODIFY `id_rekamedis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_invoices`
--
ALTER TABLE `tb_invoices`
  ADD CONSTRAINT `tb_invoices_ibfk_1` FOREIGN KEY (`id_rekamedis`) REFERENCES `tb_rekamedis` (`id_rekamedis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
