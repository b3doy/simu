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
                    <h2>Detail Akun</h2>
                </div>
                <div class="col-md-2 noprint">
                    <a href="<?= base_url('/konsumen/' . $konsumen['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
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
                                <th>Simpan</th>
                                <th>Ambil</th>
                                <th>Saldo</th>
                                <!-- <th>Sisa Os</th>
                                <th>Angsuran Ke</th> -->
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($akun); $i++) :  ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($akun[$i]['tanggal'])); ?></td>
                                    <td><?= $konverter->rupiah02($akun[$i]['simpan']); ?></td>
                                    <td><?= $konverter->rupiah02($akun[$i]['ambil']); ?></td>
                                    <?php if ($akun[$i] != $akun[0]) : ?>
                                        <td>
                                            <?php
                                            $akun[$i]['saldo'] = ($akun[$i - 1]['saldo']) + ($akun[$i]['simpan']) - ($akun[$i]['ambil']);
                                            $saldoT = $konverter->rupiah02($akun[$i]['saldo']);
                                            echo $saldoT;
                                            ?>
                                        </td>
                                    <?php elseif ($akun[$i] == $akun[0]) : ?>
                                        <td>
                                            <?php $saldoA = $konverter->des4($akun[0]['saldo']);
                                            $saldoNya = $konverter->rupiah02($saldoA);
                                            echo $saldoNya;
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                    <!-- <?php if ($akun[$i] != $akun[0]) : ?>
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
                                    <td><?= $akun[$i]['angsuran_ke']; ?></td> -->
                                    <td><?= $akun[$i]['keterangan']; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php foreach ($akun as $akun) {
            } ?>
            <!-- Pilihan Method Delete, Buat Akun, Tambah Transaksi -->
            <form action="<?= base_url('/akun/' . $akun['konsumen_id']); ?>" method="POST" class="d-inline noprint">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger mt-3 noprint" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?');"><i class="fa fa-trash"></i> Hapus Akun</button>
            </form>
            <!-- <a href="<?php if ($akun['no_akun'] != null) {
                                echo base_url('/akun/kembali');
                            } else {
                                echo base_url('/akun/create/' . $konsumen['id']);
                            }
                            ?>" class="btn btn-outline-primary mt-3 mx-3"><i class="fa fa-book"></i> Buat Akun</a> -->
            <a href="<?php if ($akun['no_akun'] != null) {
                            echo base_url('/transaksi/create/' . $akun['id']);
                        } else {
                            echo base_url('/transaksi/kembali');
                        } ?>" class="btn btn-outline-success mt-3 mx-3 noprint"><i class="fa fa-money"></i> Tambah Transaksi</a>
            <a href="<?= base_url('/akun/riwayat/' . $akun['id']); ?>" class="btn btn-outline-info mt-3 noprint"><i class="fa fa-search"></i> Lihat Riwayat Pembayaran</a>
            <button class="btn btn-success noprint mt-3 ms-3" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>