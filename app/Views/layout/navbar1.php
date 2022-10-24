<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <img src="<?= base_url(); ?>/public/assets/img/mbz.png" style="width: 100%;" class="mt-5" alt="logo">

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-3">

        <!-- Home Nav -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/page'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Data User SIMU -->
        <?php

        use App\Controllers\Users;

        if (in_groups('Superuser') || in_groups('Administrator')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/users'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Data Pegawai -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pegawai'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pegawai</span></a>
            </li>
        <?php endif; ?>

        <!-- Data Surveyor -->
        <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Surveyor')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/surveyor'); ?>">
                    <i class="fas fa fa-users"></i>
                    <span>Data Surveyor</span></a>
            </li>
        <?php endif ?>

        <!-- Data Konsumen -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKonsumen" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Konsumen</span>
            </a>
            <div id="collapseKonsumen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('/konsumen'); ?>">Data Konsumen</a>
                    <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Surveyor') || in_groups('Admin')) : ?>
                        <a class="collapse-item" href="<?= base_url('/konsumen/status_approval'); ?>">Status Approval</a>
                    <?php endif ?>
                    <a class="collapse-item" href="<?= base_url('/konsumen/rejected'); ?>">Konsumen Ditolak</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/akan_lunas'); ?>">Konsumen Akan Lunas</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/sudah_lunas'); ?>">Konsumen Sudah Lunas</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/dpd'); ?>">Konsumen DPD</a>
                    <a class="collapse-item" href="<?= base_url('/konsumen/nunggak'); ?>">Konsumen Menunggak</a>
                </div>
            </div>
        </li>

        <!-- Berita Acara -->
        <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/berita_acara'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Berita Acara</span></a>
            </li>
        <?php endif ?>

        <!-- Kwitansi di Menu Owner -->
        <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin')) : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKwitansi" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money"></i>
                    <span>Kwitansi</span>
                </a>
                <div id="collapseKwitansi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('/kwitansi/kwitansiperjanjian'); ?>">Kwitansi Angsuran 1</a>
                        <a class="collapse-item" href="<?= base_url('/kwitansi'); ?>">Kwitansi Berikutnya</a>
                        <a class="collapse-item" href="<?= base_url('/kwitansi/kwitansipelunasan'); ?>">Kwitansi Pelunasan</a>
                    </div>
                </div>
            </li>
        <?php endif ?>

        <!-- Tagihan Perbulan -->
        <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin') || in_groups('Collector')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/tagihan'); ?>">
                    <i class="fas fa-fw fa-money-bill-alt"></i>
                    <span>Tagihan Perbulan</span></a>
            </li>
        <?php endif ?>

        <!-- Report -->
        <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin')) : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereport" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Report</span>
                </a>
                <div id="collapsereport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('/report/input_data'); ?>">Laporan Input Data</a>
                        <a class="collapse-item" href="<?= base_url('/report/input_transaksi'); ?>">Laporan Input Transaksi</a>
                        <a class="collapse-item" href="<?= base_url('/report/data_total'); ?>">Laporan Data Total</a>
                        <a class="collapse-item" href="<?= base_url('/report/data_aktif'); ?>">Laporan Data Aktif</a>
                        <a class="collapse-item" href="<?= base_url('/report/uang_masuk'); ?>">Laporan Uang Masuk</a>
                        <a class="collapse-item" href="<?= base_url('/report/kwitansi_print'); ?>">Laporan Print Kwitansi</a>
                        <a class="collapse-item" href="<?= base_url('/report/sisa_kwitansi'); ?>">Laporan Sisa Kwitansi</a>
                    </div>
                </div>
            </li>
        <?php endif ?>

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