<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Data Berita Acara</h3>
            <table class="table table-hover table-sm mt-4" id="baTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>No Berita Acara</th>
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
    table = $('#baTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/beritaacara/batable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>