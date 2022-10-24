<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-5">Status Approval Calon Konsumen di Survey Oleh <?= user()->username ?></h2>
            <table class="table table-hover mt-4 hurufKecil" id="statusApprovalTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun / Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Angsuran</th>
                        <th scope="col">Tenor</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="noprint">Pilihan</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <div class=" noprint card-footer">
                <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>

<script>
    table = $('#statusApprovalTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/statusApprovalTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }],
    });
</script>


<?= $this->endSection(); ?>