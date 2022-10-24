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
                    <h2>Cetak Kwitansi Angsuran 1</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/kwitansi/kwitansiperjanjian'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <form action="<?= base_url('/kwitansi/printKwitansiPerjanjian'); ?>" method="POST">
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
                                            <td><input type="text" name="tanggal_cetak" class="form-aing" value="<?= date('d M Y'); ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>:&nbsp</td>
                                            <td>
                                                <?php
                                                if ($konsumen['nama_barang2'] == null && $konsumen['nama_barang3'] == null && $konsumen['nama_barang4'] == null) {
                                                    echo $konsumen['nama_barang1'];
                                                } else if ($konsumen['nama_barang2'] != null && $konsumen['nama_barang3'] == null && $konsumen['nama_barang4'] == null) {
                                                    echo $konsumen['nama_barang1'] . ', ' . $konsumen['nama_barang2'];
                                                } else if ($konsumen['nama_barang2'] != null && $konsumen['nama_barang3'] != null && $konsumen['nama_barang4'] == null) {
                                                    echo $konsumen['nama_barang1'] . ', ' . $konsumen['nama_barang2'] . ', ' . $konsumen['nama_barang3'];
                                                } else if ($konsumen['nama_barang2'] != null && $konsumen['nama_barang3'] != null && $konsumen['nama_barang4'] != null) {
                                                    echo $konsumen['nama_barang1'] . ', ' . $konsumen['nama_barang2'] . ', ' . $konsumen['nama_barang3'] . ', ' . $konsumen['nama_barang4'];
                                                }
                                                ?>
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
                        <div class="kwit">
                            <h1 class="card-title text-center fw-bold">KWITANSI</h1>
                            <div class="row">
                                <div class="col">
                                    <table class="table-sm huruf">
                                        <tr>
                                            <td>Terima Dari</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="nama_konsumen" class="form-aing" value="<?= $konsumen['nama_konsumen']; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Pasangan</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="nama_pasangan" class="form-aing" value="<?= $konsumen['nama_pasangan']; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Angsuran Ke</td>
                                            <td>:&nbsp</td>
                                            <td><input type="text" name="angsuran_ke" class="form-aing" value="01" readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="jdl">Jatuh Tempo Setiap Tanggal</td>
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
                                        <tr>
                                            <td>Jumlah Uang</td>
                                            <td>:&nbsp</td>
                                            <td><?= $konverter->terbilang($akun['dp'] + $akun['angsuran']) . ' Rupiah'; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                                    <tr>
                                        <td></td>
                                        <td>Pembayaran DP</td>
                                        <td style="width: 30%;"><input type="text" class="form-aing" name="pembayaran_dp" value="<?= $konverter->rupiah02($konsumen['dp']); ?>" readonly></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <th>TOTAL</th>
                                        <th><input type="text" name="total_pembayaran" class="form-aing fw-bolder" value="<?= $konverter->rupiah02($konsumen['dp'] + $konsumen['angsuran']); ?>" readonly></th>
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
                <input type="hidden" name="user_print" value="<?= user()->username ?>">
                <div class=" noprint card-footer">
                    <button type="submit" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
echo $this->endSection();
?>