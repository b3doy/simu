<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Laporan Input Data Harian</h3>
            <table class="table table-hover table-sm mt-4 hurufKecil" id="inputDataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal input</th>
                        <th>Nama Konsumen</th>
                        <th>No Mitra</th>
                        <th>Plafond</th>
                        <th>Angsuran</th>
                        <th>Tenor</th>
                        <th>Marketing</th>
                        <th>Input Oleh</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Sub Total <br> Grand Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
<script src="<?= base_url(); ?>/public/assets/js/sum.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>
<script>
    table = $('#inputDataTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/report/inputDataTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }],

        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    parseInt(i.split('Rp.').join('').split('.').join('')) * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };
            // Total over all pages
            total = api
                .column(4)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(4, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(4).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );


        }
    });
</script>

<?= $this->endSection(); ?>