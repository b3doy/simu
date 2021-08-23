<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <img src="<?= base_url(); ?>/public/assets/img/mbz.png" style="width: 180px;" class="mt-5" alt="logo">

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-3">

        <!-- Home Nav -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/page'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Data Pegawai -->
        <?php if (user()->username == 'owner') : ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/users'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pegawai'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pegawai</span></a>
            </li>
        <?php endif; ?>

        <!-- Data Konsumen -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKonsumen" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Konsumen</span>
            </a>
            <div id="collapseKonsumen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('/konsumen'); ?>">Data Konsumen</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/akan_lunas'); ?>">Konsumen Akan Lunas</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/sudah_lunas'); ?>">Konsumen Sudah Lunas</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/dpd'); ?>">Konsumen DPD</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/nunggak'); ?>">Konsumen Menunggak</a>
                </div>
            </div>
        </li>

        <!-- Berita Acara -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/berita_acara'); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Berita Acara</span></a>
        </li>

        <!-- Kwitansi di Menu Owner -->
        <?php if (user()->username == 'owner') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKwitansi" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money"></i>
                    <span>Kwitansi</span>
                </a>
                <div id="collapseKwitansi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('/kwitansi/kwitansiperjanjian'); ?>">Kwitansi Angsuran 1</a>
                        <a class="collapse-item" href="<?= base_url('/kwitansi'); ?>">Kwitansi Berikutnya</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <!-- Kwitansi di Menu != Owner -->
        <?php if (user()->username != 'owner') : ?>
            <li class="nav-item bg-dark">
                <a class="nav-link collapsed" href="#" data-toggle="collapsed" data-target="#collapseKwitansi" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money"></i>
                    <span>Kwitansi</span>
                </a>
                <div id="collapseKwitansi" class="" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 kwitMod mb-1">
                        <a class="collapse-item aKwit" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop0">Kwitansi Angsuran 1</a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop0" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Silahkan Masukkan Password Untuk Melanjutkan</h5>
                                        <input type="password" id="password0" name="password0" class="form-control" onkeyup="sandi()">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="lanjutkan0" data-bs-dismiss="modal">Lanjutkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-dark py-2 kwitMod">
                        <a class="collapse-item aKwit" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Kwitansi</a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Silahkan Masukkan Password Untuk Melanjutkan</h5>
                                        <input type="password" id="password" name="password" class="form-control" onkeyup="kataSandi()">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="lanjutkan" data-bs-dismiss="modal">Lanjutkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <!-- Tagihan Perbulan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/tagihan'); ?>">
                <i class="fas fa-fw fa-money-bill-alt"></i>
                <span>Tagihan Perbulan</span></a>
        </li>

        <!-- Report -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereport" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-list"></i>
                <span>Report</span>
            </a>
            <div id="collapsereport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('/report/input_data'); ?>">Laporan Input Data</a>
                    <a class="collapse-item" href="<?= base_url('/report/data_total'); ?>">Laporan Data Total</a>
                    <a class="collapse-item" href="<?= base_url('/report/kwitansi_print'); ?>">Laporan Print Kwitansi</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Logout User -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span><?= user()->username; ?></span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('/logout'); ?>">Logout</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Content -->
                <?= $this->renderSection('content'); ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white noprint">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SIMU-1.0 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded noprint" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>

<script>
    function sandi() {
        var passwd = 'sarewelah'
        var pass0 = document.getElementById('password0').value
        if (pass0 == passwd) {
            document.getElementById('lanjutkan0').addEventListener('click', function() {
                window.location.href = "<?= base_url('/kwitansi/kwitansiperjanjian') ?>"
            })
        } else {
            document.getElementById('lanjutkan0').addEventListener('click', function() {
                window.location.href = "<?= base_url('/page') ?>"
            })
        }
    }

    function kataSandi() {
        var password = 'sarewelah'
        var pass = document.getElementById('password').value
        if (pass == password) {
            document.getElementById('lanjutkan').addEventListener('click', function() {
                window.location.href = "<?= base_url('/kwitansi') ?>"
            })
        } else {
            document.getElementById('lanjutkan').addEventListener('click', function() {
                window.location.href = "<?= base_url('/page') ?>"
            })
        }
    }
</script>