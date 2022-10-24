<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row mb-5">
                <div class="col-10">
                    <h1>Data Konsumen <?= $pegawai['nama_pegawai']; ?></h1>
                </div>
                <div class="col">
                    <div class="col-4">
                        <a href="<?= base_url('/pegawai'); ?>" class="btn btn-secondary btn-sm mt-2" role="button"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id_pegawai" value="<?= $pegawai['id']; ?>">
            <table class="table table-hover mt-5 hurufKecil" id="konsumenPegawaiTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tgl Angsuran</th>
                        <th scope="col">Angsuran</th>
                        <th scope="col">Surveyor</th>
                        <th scope="col">SLA</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script>
    table = $('#konsumenPegawaiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/pegawai/konsumenpegawaitable'); ?>",
            "type": "POST",
            "data": {
                id_pegawai: $('#id_pegawai').val()
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>