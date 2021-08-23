<?php

echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="mb-5">Tagihan Perbulan</h3>
            <table class="table table-hover table-sm mt-4 hurufKecil" id="tagihanPerBulanTable">
                <thead class="text-sm-center">
                    <tr>
                        <th>#</th>
                        <th>Tgl Jatuh Tempo</th>
                        <th>No Mitra</th>
                        <th>Konsumen</th>
                        <th>Angsuran</th>
                        <th>Ke</th>
                        <th>DPD</th>
                        <th>Sisa Os</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <td colspan="3"></td>
                    <th>Sub Total : <br>Grand Total : </th>
                    <th></th>
                    <td colspan="2"></td>
                    <th></th>
                    <td></td>
                </tfoot>
            </table>
            <div class=" noprint card-footer">
                <button class="btn-sm btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/sum.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>
<script>
    table = $('#tagihanPerBulanTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/tagihan/tagihanPerBulanTable'); ?>",
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
                    // i.replace(/[\$,]/g, '') * 1 :
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
                    // search: 'applied'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(4).footer()).html(
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
                    // search: 'applied'
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