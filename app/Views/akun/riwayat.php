<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
foreach ($akun as $a) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>Riwayat Pembayaran</h2>
                </div>
                <div class="col-md-2 noprint">
                    <a href="<?= base_url('/akun/' . $a['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <table class="table-sm">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <th><?= $konsumen['nama_konsumen']; ?></th>
                        </tr>
                        <tr>
                            <td>No Akun</td>
                            <td>:</td>
                            <th><?= $a['no_akun']; ?></th>
                        </tr>
                        <tr>
                            <td>Pinjaman / OS</td>
                            <td>:</td>
                            <th><?= $konverter->rupiah02($a['os']); ?></th>
                        </tr>
                        <tr>
                            <td>Tanggal Jatuh Tempo Perbulan</td>
                            <td>:</td>
                            <th><?= $konsumen['tanggal_angsuran2'][8] . $konsumen['tanggal_angsuran2'][9]; ?></th>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Bayar</th>
                                <th>Angsuran Ke -</th>
                                <th>Sisa OS</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($akun); $i++) : ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($akun[$i]['tanggal'])); ?></td>
                                    <!-- <td><?= $konverter->rupiah02($akun[$i]['simpan']); ?></td> -->
                                    <td><?= $konverter->rupiah02($akun[$i]['ambil']); ?></td>
                                    <td><?= $akun[$i]['angsuran_ke']; ?></td>
                                    <?php if ($akun[$i] != $akun[0]) : ?>
                                        <td>
                                            <?php
                                            $dp = $konsumen['dp'];
                                            $angsuran = $konsumen['angsuran'];
                                            $dpAngs = $dp + $angsuran;
                                            if ($akun[$i]['simpan'] == $akun[$i]['angsuran']) {
                                                $akun[$i]['sisa_os'] = ($akun[$i - 1]['sisa_os']) - ($akun[$i]['simpan']);
                                                $sisaOs = $konverter->rupiah02($akun[$i]['sisa_os']);
                                                echo $sisaOs;
                                            } else if ($akun[$i]['simpan'] == $dpAngs) {
                                                $akun[$i]['sisa_os'] = ($akun[$i - 1]['sisa_os']) - ($akun[$i]['simpan'] - $konsumen['dp']);
                                                $sisaOs = $konverter->rupiah02($akun[$i]['sisa_os']);
                                                echo $sisaOs;
                                            } else if (($akun[$i]['simpan'] > $akun[$i]['angsuran']) && ($akun[$i]['simpan'] != $dpAngs)) {
                                                $akun[$i]['sisa_os'] = ($akun[$i - 1]['sisa_os']) - ($akun[$i]['ambil']);
                                                $sisaOs = $konverter->rupiah02($akun[$i]['sisa_os']);
                                                echo $sisaOs;
                                            } else if (($akun[$i]['simpan'] < $akun[$i]['angsuran'])) {
                                                $akun[$i]['sisa_os'] = ($akun[$i - 1]['sisa_os']) - ($akun[$i]['ambil']);
                                                $sisaOs = $konverter->rupiah02($akun[$i]['sisa_os']);
                                                echo $sisaOs;
                                            }
                                            ?>
                                        </td>
                                    <?php elseif ($akun[$i] == $akun[0]) : ?>
                                        <td>
                                            <?php
                                            $osAwal = $konverter->rupiah02($akun[0]['sisa_os']);
                                            echo $osAwal;
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                    <td><?= $akun[$i]['keterangan']; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                    <div class=" noprint card-footer">
                        <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
            <?php foreach ($akun as $akun) {
            } ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>