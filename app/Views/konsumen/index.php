<?php
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($akun as $akun) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Konsumen</h1>
            <!-- Menampilkan Notifikasi Alert -->
            <?php if (session()->getFlashData('pesanBerhasil')) : ?>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashData('pesanBerhasil'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif (session()->getFlashData('pesanGagal')) : ?>
                <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashData('pesanGagal'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Menampilkan Notifikasi Alert -->
            <div class="row">
                <div class="col mb-5">
                    <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin')) : ?>
                        <a href="<?= base_url('/konsumen/create'); ?>" class="btn btn-primary mt-3"><i class="fa fa-plus-circle"></i> Tambah Data Konsumen</a>
                    <?php endif ?>
                </div>
            </div>
            <table class="table table-sm table-hover mt-4 hurufKecil" id="konsumenTable">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun / Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Angsuran</th>
                        <th scope="col">Tgl Jatuh Tempo Akhir</th>
                        <th scope="col" style="width:80px">Angsuran</th>
                        <th scope="col">Marketing</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody class="">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script>
    table = $('#konsumenTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/konsumentable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>


<?= $this->endSection(); ?>