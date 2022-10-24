<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Konsumen Ditolak</h1>

            <table class="table table-sm table-hover mt-4 hurufKecil" id="rejectedTable">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tgl Ditolak</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Marketing</th>
                        <th scope="col">Status</th>
                        <th scope="col">Surveyor</th>
                        <th scope="col">Keterangan Surveyor</th>
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
    table = $('#rejectedTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/rejectedTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>


<?= $this->endSection(); ?>