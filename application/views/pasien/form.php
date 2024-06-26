<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Breadcrumb -->
                    <h6 class="mb-2">
                        Breadcrumb
                        <!-- <?php foreach ($breadcrumbs as $breadcrumb) { ?>
              <span class="<?php echo $breadcrumb['class']; ?>"><?php echo ($breadcrumb['active'] == TRUE) ? '<a href="' . $breadcrumb['href'] . '" class="pe-3 text-muted">' : NULL; ?><?php echo $breadcrumb['text']; ?><?php echo ($breadcrumb['active'] == TRUE) ? '</a>' : NULL; ?>
            <?php } ?> -->
                    </h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Daftar Pesanan -->
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 fw-bold">Data Pasien</h4>
                                    <!-- <small class="text-muted float-end">Daftar Pesanan</small> -->
                                </div>
                                <div class="card-body">
                                    <!-- Tabel untuk menampilkan daftar pesanan -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="produk">Nama</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Jumlah Pesanan . . ." autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="quantity">Usia</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Jumlah Pesanan . . ." autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price">Alamat</label>
                                            <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="Masukkan Harga . . ." autocomplete="off">
                                            <!-- <span style="color: red;"><?= form_error('sell_price'); ?></span> -->
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">NO.hp</label>
                                            <input type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Jenis Kelamin</label>

                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    PRIA
                                                </label>

                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    WANITA
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Rontgen</label>
                                            <input type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="empty" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Subjective</label>
                                            <textarea type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="empty" autocomplete="off"></textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Assement</label>
                                            <textarea type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="empty" autocomplete="off"></textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Objective</label>
                                            <textarea type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="empty" autocomplete="off"></textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="sell_price_total">Plan</label>
                                            <textarea type="text" class="form-control" name="sell_price_total" id="sell_price_total" placeholder="" value="empty" autocomplete="off"></textarea>

                                        </div>
                                    </div>

                                    <center>
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <!-- Tambah Produk Button -->
                                                <button type="button" class="btn btn-primary" onclick="tambahProduk()">Tambah Rekamedis</button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Tambah Pesanan -->
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">


                                </div>
                                <div class="card-body">
                                    <!-- Form untuk menambahkan produk -->
                                    <h3 class="mb-4 fw-bold">Rekamedis historty</h3>
                                    <div class="row">
                                        <!-- Hoverable Table rows -->
                                        <div class="card pb-3 px-4">
                                            <table id="pegawai" class="table table-hover">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-header fw-bold px-1 pt-3 pb-3">List history</h5>
                                                    <div class="table-responsive text-nowrap">
                                                        <div class="pb-3 pt-4">
                                                            <button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                                                <i class="bx bx-export me-sm-1"></i>
                                                                <span class="d-none d-sm-inline-block">Export</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Assement</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Plan</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">


                                </div>
                                <div class="card-body">
                                    <!-- Form untuk menambahkan produk -->
                                    <h3 class="mb-4 fw-bold">Rekamedis Tambahan</h3>
                                    <div class="row">
                                        <!-- Hoverable Table rows -->
                                        <div class="card pb-3 px-4 ">
                                            <div class="d-flex column gap-1 justify-content-center">
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>8</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>7</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>6</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>4</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>3</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>2</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>1</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>1</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>2</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>3</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>4</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>5</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>6</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>7</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>8</p>


                                                </div>




                                            </div>
                                            <hr>
                                            <div class="d-flex column gap-1 justify-content-center">
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>8</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>7</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>6</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>5</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>4</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>3</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>2</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>1</p>


                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>1</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>2</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>3</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>4</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>6</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>7</p>
                                                </div>
                                                <div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="" id="flexCheckChecked">
                                                    </div>
                                                    <p>8</p>
                                                </div>

                                            </div>
                                        </div>




                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / Content -->
        </div>
    </div>
</div>
</div>
