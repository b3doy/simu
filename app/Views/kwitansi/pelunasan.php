<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Kwitansi Pelunasan Dipercepat</h3>
            <table class="table table-hover table-sm mt-4" id="kwitansiPelunasanTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Mitra</th>
                        <th>Angsuran_ke</th>
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
    table = $('#kwitansiPelunasanTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/kwitansi/kwitansiPelunasanTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>