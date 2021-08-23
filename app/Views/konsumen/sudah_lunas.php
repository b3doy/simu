<?php
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($akun as $akun) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1 class="mb-5">Data Konsumen Yang Sudah Lunas</h1>
            <table class="table table-hover mt-4" id="konsumenSudahLunasTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun / Mitra</th>
                        <th scope="col">Nama</th>
                        <!-- <th scope="col">Tanggal Angsuran 1</th> -->
                        <!-- <th scope="col">Tanggal Jatuh Tempo</th> -->
                        <th scope="col">Angsuran</th>
                        <th scope="col" class="noprint">Pilihan</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
            <div class=" noprint card-footer">
                <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script>
    table = $('#konsumenSudahLunasTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/konsumenSudahLunasTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>


<?= $this->endSection(); ?>