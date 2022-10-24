<?php
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($akun as $akun) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1 class="mb-5">Data Konsumen Menunggak Lewat Masa Perjanjian</h1>
            <table class="table table-hover mt-4" id="konsumenNunggakTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun / Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                        <th scope="col">Tanggal Terakhir Bayar</th>
                        <th scope="col">DPD</th>
                        <th scope="col">Angsuran</th>
                        <th scope="col">Sisa OS</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
                <tfoot>
                    <td colspan="4"></td>
                    <th>Sub Total : <br>Grand Total : </th>
                    <td></td>
                    <th></th>
                    <th></th>
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
    table = $('#konsumenNunggakTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/konsumenNunggakTable'); ?>",
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
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(6).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );

            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Update footer
            $(api.column(7).footer()).html(
                'Rp ' + desimal(pageTotal) + ',00' + '<br>' + '  Rp ' + desimal(total) + ',00'
            );
        }
    });
</script>


<?= $this->endSection(); ?>