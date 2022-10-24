<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row mb-5">
                <div class="col-10">
                    <h3>Data FPD Konsumen Yang Di Survey Oleh <?= $surveyor['nama_pegawai']; ?></h3>
                </div>
                <div class="col">
                    <div class="col-2">
                        <a href="<?= base_url('/surveyor'); ?>" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id_pegawai" value="<?= $surveyor['id']; ?>">
            <table class="table table-hover mt-5 hurufKecil" id="fpdTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tgl Angsuran</th>
                        <th scope="col">Marketing</th>
                        <th scope="col">FPD</th>
                </thead>
                <tbody>


                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script>
    table = $('#fpdTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/surveyor/fpdTable'); ?>",
            "type": "POST",
            "data": {
                id_pegawai: $('#id_pegawai').val()
            },
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }],
    });
</script>

<?= $this->endSection(); ?>