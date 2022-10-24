<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row mb-5">
                <div class="col-10">
                    <h3>Data SLA Konsumen Yang Di Survey Oleh <?= $surveyor['nama_pegawai']; ?></h3>
                </div>
                <div class="col">
                    <div class="col-2">
                        <a href="<?= base_url('/surveyor'); ?>" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id_pegawai" value="<?= $surveyor['id']; ?>">
            <table class="table table-hover mt-5 hurufKecil" id="slaTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tgl Input</th>
                        <th scope="col">Tgl Rekomendasi / Ditolak</th>
                        <th scope="col">No Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Marketing</th>
                        <th scope="col">SLA</th>
                </thead>
                <tbody>


                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td></td>
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
    table = $('#slaTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/surveyor/slaTable'); ?>",
            "type": "POST",
            "data": {
                id_pegawai: $('#id_pegawai').val()
            },
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }],

        // MENGHITUNG AVERAGE TIME (H:i:s) DATATABLES !!!
        "footerCallback": function(tfoot, data, start, end, display) {
            var api = this.api();

            var intVal = function(i) {
                return typeof i === 'string' ?
                    parseInt(i.split('').join('')) * 1 :
                    typeof i === 'date' ?
                    i : 0;
            };

            // total column
            var columnDataTotal = api
                .column(6)
                .data();
            var theColumnTotal = columnDataTotal
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            // view page column
            var columnData = api
                .column(6, {
                    page: 'current'
                })
                .data();
            var theColumnPage = columnData
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            var avgPage = parseFloat(theColumnPage / columnData.count()).toFixed(2)
            var avgTotal = parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(2)
            $(api.column(0).footer()).html('Rata-rata <br> Total Rata-rata');
            $(api.column(6).footer()).html(
                avgPage + ' Jam' + '<br>' + avgTotal + ' Jam'
            );

        }
    });
</script>

<?= $this->endSection(); ?>