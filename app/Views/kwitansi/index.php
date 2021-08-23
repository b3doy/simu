<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Kwitansi Jatuh Tempo</h3>
            <table class="table table-hover table-sm mt-4" id="kwitansiTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Angsuran Ke</th>
                        <th>Nama Konsumen</th>
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
<script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.js"></script>
<script>
    table = $('#kwitansiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/kwitansi/kwitansitable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>