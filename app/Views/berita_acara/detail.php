<?php
echo $this->extend('layout/template');
echo $this->section('content');

foreach ($akun as $a) {
};
foreach ($konsumen as $konsumen) {
};
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Detail Berita Acara</h3>
                </div>
                <div class="col-md-2 noprint">
                    <a href="<?= base_url('/berita_acara'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <table class="table-sm">
                <tr>
                    <td>No Berita Acara</td>
                    <td>:</td>
                    <td><?= $a['no_ba']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= date('d M Y', strtotime($a['tanggal'])); ?></td>
                </tr>
            </table>
            <table id="table_ba" class="table table-hover table-sm mt-4 hurufKecil">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>No Akun</td>
                        <td>Nama Konsumen</td>
                        <td>Jumlah Angsuran</td>
                        <td>Bayar</td>
                        <td>Angsuran Ke</td>
                        <td>Total Tagihan</td>
                        <td>Uang Tunai</td>
                        <td>Saldo</td>
                        <td class="noprint">Lihat Akun</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($akun as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['no_akun']; ?></td>
                            <td><?= $akun['nama_konsumen']; ?></td>
                            <td><?= $konverter->rupiah02($akun['angsuran']); ?></td>
                            <td><?= $konverter->rupiah02($akun['simpan']); ?></td>
                            <td><?= $akun['angsuran_ke']; ?></td>
                            <td id="total_tagihan">
                                <?php
                                $dp_angsuran1 = $akun['angsuran'] + $akun['dp'];
                                $saldo = $akun['ambil'] - $akun['simpan'];
                                $saldo_angsuran1 = $saldo + $akun['simpan'];

                                if ($akun['simpan'] >= $akun['angsuran']) {
                                    if ($akun['angsuran_ke'] == '1') {
                                        echo $konverter->rupiah02($dp_angsuran1);
                                    } else {
                                        echo $konverter->rupiah02($akun['angsuran']);
                                    }
                                } else if ($akun['simpan'] < $akun['angsuran']) {
                                    if ($saldo_angsuran1 >= $akun['angsuran']) {
                                        echo $konverter->rupiah02($akun['angsuran']);
                                    } else {
                                        echo 0;
                                    }
                                }
                                ?>
                            </td>
                            <td id="uang_masuk">
                                <?php
                                if ($akun['simpan'] >= $akun['angsuran']) {
                                    echo $konverter->rupiah02($akun['simpan']);
                                } else if ($saldo_angsuran1 >= $akun['angsuran']) {
                                    echo $konverter->rupiah02($akun['simpan']);
                                } else if ($akun['simpan'] < $akun['angsuran'] && (date('d/m/Y', strtotime('+1 month', strtotime($konsumen['tanggal_angsuran1']))))) {
                                    echo $konverter->rupiah02($akun['simpan']);
                                } else {
                                    echo 0;
                                }
                                ?>
                            </td>
                            <td><?= $konverter->rupiah02($saldo); ?></td>
                            <td class="noprint">
                                <a href="<?= base_url('/akun/' . $akun['konsumen_id']); ?>" class="btn badge bg-info text-dark">Lihat Data</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table table-hover table-sm" style="font-size: 0.9em;">
                <tr>
                    <td></td>
                    <td></td>
                    <td style="width: 40%;"></td>
                    <th>Total</th>
                    <th>:</th>
                    <th id="sumTT" style="padding-left:100px;"></th>
                    <th id="sumUM" style="padding-right:0px;"></th>
                    <th id="sumSL" style="padding-right:80px;"></th>
                    <td></td>
                </tr>
            </table>
            <div class=" noprint card-footer">
                <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>
<script>
    var rp = 'Rp. '
    var totalTagihan = document.getElementById('table_ba'),
        sumTotalTagihan = 0,
        sumUangMasuk = 0,
        sumSaldo = 0
    for (var i = 1; i < totalTagihan.rows.length; i++) {
        var col6 = totalTagihan.rows[i].cells[6].innerHTML
        var col6a = col6.split('Rp.').join('').split('.').join('')
        var col7 = totalTagihan.rows[i].cells[7].innerHTML
        var col7a = col7.split('Rp.').join('').split('.').join('')
        var col8 = totalTagihan.rows[i].cells[8].innerHTML
        var col8a = col8.split('Rp.').join('').split('.').join('')
        sumTotalTagihan = (sumTotalTagihan + parseInt(col6a))
        sumUangMasuk = (sumUangMasuk + parseInt(col7a))
        sumSaldo = (sumSaldo + parseInt(col8a))
    }
    document.getElementById('sumTT').innerHTML = rp + duit(sumTotalTagihan) + ',00'
    document.getElementById('sumUM').innerHTML = rp + duit(sumUangMasuk) + ',00'
    document.getElementById('sumSL').innerHTML = rp + duit(sumSaldo) + ',00'
</script>

<?= $this->endSection(); ?>