<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Kwitansi Angsuran Pertama</h3>
            <table class="table table-hover table-sm mt-4" id="kwitansiPerjanjianTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Mitra</th>
                        <th>Tanggal Angsuran ke-1</th>
                        <th>angsuran_ke</th>
                        <th>Nama Konsumen</th>
                        <th>Angsuran</th>
                        <th>Action</th>
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
    table = $('#kwitansiPerjanjianTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/kwitansi/kwitansiPerjanjianTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>