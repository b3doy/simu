<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Laporan Input Data Harian</h3>
            <table class="table table-hover table-sm mt-4" id="inputDataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal input</th>
                        <th>Nama Konsumen</th>
                        <th>No Mitra</th>
                        <th>Plafond</th>
                        <th>Angsuran</th>
                        <th>Tenor</th>
                        <th>Input Oleh</th>
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
    table = $('#inputDataTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/report/inputDataTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>