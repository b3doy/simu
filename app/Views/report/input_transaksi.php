<?php

echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Laporan Input Transaksi</h3>
            <table class="table table-hover table-sm hurufKecil mt-4" id="inputTransaksiTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Update</th>
                        <th>Nama Konsumen</th>
                        <th>No Mitra</th>
                        <th>No BA</th>
                        <th>Angs Ke-</th>
                        <th>Simpan</th>
                        <th>Ambil</th>
                        <th>Saldo</th>
                        <th>Input Oleh</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>Sub Total <br>Grand Total</td>
                        <td colspan="3"></td>
                        <th></th>
                        <th></th>
                        <th></th>
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
    table = $('#inputTransaksiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/report/inputTransaksiTable'); ?>",
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
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(7).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );

            // Total over all pages
            total = api
                .column(8)
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Update footer
            $(api.column(8).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );

            // Kolom ke-3
            // Total over all pages
            total = api
                .column(9)
                .data()
                .reduce(function(e, f) {
                    return intVal(e) + intVal(f);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function(e, f) {
                    return intVal(e) + intVal(f);
                }, 0);

            // Update footer
            $(api.column(9).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );
        }
    });
</script>

<?= $this->endSection(); ?>