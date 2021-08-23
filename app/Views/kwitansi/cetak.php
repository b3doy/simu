<?php
date_default_timezone_set('Asia/Jakarta');
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($akun as $akun) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row noprint">
                <div class="col-10">
                    <h2>Cetak Kwitansi</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/kwitansi'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <form action="<?= base_url('/kwitansi/print'); ?>" method="POST">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="kwit">
                            <h3 class="card-title text-center fw-bolder">MITRA BERSAMA ZE</h3>
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= base_url(); ?>/public/assets/img/mbz.png" class="mt-5 ms-3" style="width:300px;" alt="logo">
                                    <p class="ms-3">Jl. Raya Cibeber - Cianjur 43262</p>
                                </div>
                                <div class="col-md-7">
                                    <table class="huruf">
                                        <tr>
                                            <td>No</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <!-- <td><?= date('d M Y'); ?></td> -->
                                            <td><input type="text" name="tanggal_cetak" class="form-aing" value="<?= date('d M Y'); ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>:&nbsp</td>
                                            <td>
                                                <?= $konsumen['nama_barang1'] . $konsumen['nama_barang2'] . $konsumen['nama_barang3'] . $konsumen['nama_barang4']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mulai Dari</td>
                                            <td>:&nbsp</td>
                                            <td><?= date('d M Y', strtotime($konsumen['tanggal_datang'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="jdl">Skema Angsuran</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="skema" class="form-aing" value="<?= $konsumen['skema']; ?>" readonly></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <hr style="height: 5px; color:black;"> -->
                        <div class="kwit">
                            <h1 class="card-title text-center fw-bold">KWITANSI</h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table-sm huruf">
                                        <tr>
                                            <td>Terima Dari</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="nama_konsumen" class="form-aing" value="<?= $konsumen['nama_konsumen']; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="jdl">Angsuran Ke</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="angsuran_ke" class="form-aing" value="<?= $jt; ?>" readonly></td>

                                            <!-- <td><?= $jt; ?></td> -->
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table-sm huruf">
                                        <tr>
                                            <td style="width:85%">Jatuh Tempo Setiap Tanggal</td>
                                            <td>:&nbsp</td>
                                            <td>
                                                <input type="text" name="jt" class="form-aing" value="<?php
                                                                                                        if ($konsumen['tanggal_angsuran2'] != null) {
                                                                                                            echo $konsumen['tanggal_angsuran2'][8] . $konsumen['tanggal_angsuran2'][9];
                                                                                                        } else {
                                                                                                            echo $konsumen['tanggal_angsuran1'][8] . $konsumen['tanggal_angsuran1'][9];
                                                                                                        }
                                                                                                        ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tenor</td>
                                            <td>:&nbsp</td>
                                            <td><?= $konsumen['tenor']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col">
                                    <table class="table-sm huruf">
                                        <tr>
                                            <td style="width: 31.5%;">Jumlah Uang</td>
                                            <td>:&nbsp</td>
                                            <td>
                                                <?php
                                                if ($akun['angsuran_ke'] < '1') {
                                                    $jumlahUang = $konsumen['angsuran'] + $konsumen['dp'];
                                                    echo $konverter->terbilang($jumlahUang) . ' Rupiah';
                                                } else {
                                                    echo $konverter->terbilang($konsumen['angsuran']) . ' Rupiah';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <hr style="height:3px; color:black;"> -->
                        <div class="kwit">
                            <table class="table table-bordered huruf">
                                <thead>
                                    <tr>
                                        <th>Nomor Mitra</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="no_mitra" class="form-aing" style="width: 100%;" value="<?= $akun['no_akun']; ?>" readonly></td>
                                        <td style="width: 40%;">Pembayaran Angsuran</td>
                                        <td style="width: 30%;"><input type="text" class="form-aing" name="pembayaran_angsuran" value="<?= $konverter->rupiah02($konsumen['angsuran']); ?>" readonly></td>
                                    </tr>
                                    <?php if ($akun['angsuran_ke'] < '1') : ?>
                                        <tr>
                                            <td>Pembayaran DP</td>
                                            <!-- <td><?= $konverter->rupiah02($konsumen['dp']); ?></td> -->
                                            <td style="width: 30%;"><input type="text" class="form-aing" name="pembayaran_dp" value="<?= $konverter->rupiah02($konsumen['dp']); ?>" readonly></td>
                                        </tr>
                                    <?php endif ?>
                                    <tr>
                                        <td></td>

                                        <th>TOTAL</th>
                                        <th><input type="text" name="total_pembayaran" class="form-aing fw-bolder" value="<?php
                                                                                                                            if ($akun['angsuran_ke'] < '1') {
                                                                                                                                echo $konverter->rupiah02($jumlahUang);
                                                                                                                            } else {
                                                                                                                                echo $konverter->rupiah02($konsumen['angsuran']);
                                                                                                                            }
                                                                                                                            ?>" readonly>

                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <div class="mb-3 huruf">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="perhatian" class="form-label">Perhatian</label>
                                        <textarea name="perhatian" id="perhatian" class="form-control"></textarea>
                                        <p style="font-size: 14px;">Lembar 1 untuk mitra</p>
                                        <p style="font-size: 14px;">Lembar 2 untuk kantor</p>
                                    </div>
                                    <div class="col-sm-5 text-center">
                                        <p>MITRA BERSAMA ZE</p>
                                        <br>
                                        <p>(...............................)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" noprint card-footer">
                    <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
echo $this->endSection();
?>