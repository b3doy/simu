<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Laporan Sisa Kwitansi</h3>
            <table class="table table-hover table-sm mt-4 hurufKecil" id="sisaKwitansiTable">
                <thead class="text-sm-center">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Cetak</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Konsumen</th>
                        <th>No Mitra</th>
                        <th>Angsuran Ke</th>
                        <th>Pembayaran Angsuran</th>
                        <th>Skema</th>
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
    table = $('#sisaKwitansiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/report/sisaKwitansiTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>