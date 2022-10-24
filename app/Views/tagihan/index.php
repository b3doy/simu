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
                        <th>Tgl JT Berikutnya</th>
                        <th>Terakhir Bayar</th>
                        <th>No Mitra</th>
                        <th>Konsumen</th>
                        <th>Tgl Angsuran</th>
                        <th>Angsuran</th>
                        <th>Ke</th>
                        <th>DPD</th>
                        <th>Saldo</th>
                        <th>Sisa Os</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <td colspan="6">Sub Total : <br>Grand Total : </td>
                    <th></th>
                    <th colspan="3"></th>
                    <th></th>
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
                    parseInt(i.split('Rp.').join('').split(',').join('')) * 1 :
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
                'Rp ' + desimal(pageTotal) + '<br>' + '  Rp ' + desimal(total)
            );

            // Total over all pages
            total = api
                .column(10)
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(10, {
                    page: 'current'
                })
                .data()
                .reduce(function(c, d) {
                    return intVal(c) + intVal(d);
                }, 0);

            // Update footer
            $(api.column(10).footer()).html(
                'Rp ' + desimal(pageTotal) + '<br>' + '  Rp ' + desimal(total) + ',00'
            );
        }
    });
</script>

<?= $this->endSection(); ?>