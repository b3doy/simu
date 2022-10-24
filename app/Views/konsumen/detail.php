<?php

echo $this->extend('layout/template');

echo $this->section('content');

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
foreach ($akun as $akun) {
}

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-8">
                    <h2>Detail Konsumen</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/konsumen'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>

            <div class="card" style="width: 80%; background-color:beige;">
                <div class="card-body">
                    <h3 class="card-title text-center fw-bolder"><?= $konsumen['nama_konsumen']; ?></h3>
                    <h4 class="card-title text-center fw-bolder"><?= $konsumen['nama_panggilan']; ?></h4>
                    <table class="table table-borderless">
                        <tr>
                            <td>No Mitra</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['no_mitra']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>No KTP</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['no_ktp']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d-M-Y', strtotime($konsumen['tgl_lahir'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama Ibu Kandung</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['ibu_kandung']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['telpon']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['pekerjaan']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>No Kartu Keluarga</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['no_kk']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Alamat Sesuai KTP</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['alamat']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama Pasangan</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['nama_pasangan']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama Panggilan Pasangan</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['nama_panggilan_pasangan']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>No KTP Pasangan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['ktp_pasangan']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Pasangan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d-M-Y', strtotime($konsumen['tgl_lahir_pasangan'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Alamat Sesuai KTP Pasangan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['alamat_ktp_pasangan']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Domisili</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['domisili']; ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Down Payment (DP)</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konverter->rupiah02($konsumen['dp']); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Angsuran</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konverter->rupiah02($konsumen['angsuran']); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Plafond</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konverter->rupiah02($konsumen['os']); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Total Penjualan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konverter->rupiah02($konsumen['total_penjualan']); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Datang Barang</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d M Y', strtotime($konsumen['tanggal_datang'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Angsuran ke-1</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d M Y', strtotime($konsumen['tanggal_angsuran1'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Angsuran ke-2</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d M Y', strtotime($konsumen['tanggal_angsuran2'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Angsuran Setiap Bulan</td>
                            <td> : </td>
                            <th>
                                <p class="card-text">
                                    <?php
                                    if ($konsumen['tanggal_angsuran2'] != 0) {
                                        echo $konsumen['tanggal_angsuran2'][8] . $konsumen['tanggal_angsuran2'][9];
                                    } else {
                                        echo $konsumen['tanggal_angsuran1'][8] . $konsumen['tanggal_angsuran1'][9];
                                    }
                                    ?>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tenor / Jangka Waktu</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['tenor']; ?> Bulan</p>
                            </th>
                        </tr>
                        <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= date('d M Y', strtotime($konsumen['tanggal_jt'])); ?></p>
                            </th>
                        </tr>
                        <tr>
                            <td>Skema Angsuran</td>
                            <td> : </td>
                            <th>
                                <p class="card-text"><?= $konsumen['skema']; ?></p>
                            </th>
                        </tr>
                        <?php if ($konsumen['nama_barang1'] != null) : ?>
                            <tr>
                                <td>Nama Barang 1</td>
                                <td> : </td>
                                <th>
                                    <p class="card-text"><?= $konsumen['nama_barang1']; ?></p>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Merk</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['merk_barang1']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Tipe</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['tipe_barang1']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Warna</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['warna_barang1']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Imei</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['imei1']; ?></p>
                                </td>
                            </tr>
                        <?php endif ?>
                        <?php if ($konsumen['nama_barang2'] != null) : ?>
                            <tr>
                                <td>Nama Barang 2</td>
                                <td> : </td>
                                <th>
                                    <p class="card-text"><?= $konsumen['nama_barang2']; ?></p>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Merk</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['merk_barang2']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Tipe</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['tipe_barang2']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Warna</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['warna_barang2']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Imei</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['imei2']; ?></p>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                            </tr>
                        <?php endif ?>
                        <?php if ($konsumen['nama_barang3'] != null) : ?>
                            <tr>
                                <td>Nama Barang 3</td>
                                <td> : </td>
                                <th>
                                    <p class="card-text"><?= $konsumen['nama_barang3']; ?></p>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Merk</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['merk_barang3']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Tipe</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['tipe_barang3']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Warna</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['warna_barang3']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Imei</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['imei3']; ?></p>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                            </tr>
                        <?php endif ?>
                        <?php if ($konsumen['nama_barang4'] != null) : ?>
                            <tr>
                                <td>Nama Barang Lebih Dari 3</td>
                                <td> : </td>
                                <th>
                                    <p class="card-text"><?= $konsumen['nama_barang4']; ?></p>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px;">Deskripsi Barang</td>
                                <td> : </td>
                                <td>
                                    <p class="card-text"><?= $konsumen['deskripsi_barang4']; ?></p>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                            </tr>
                        <?php endif ?>
                        <tr>
                            <td>Marketing</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['marketing']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Surveyor</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold"><?= $konsumen['surveyor']; ?></h5>
                            </th>
                        </tr>
                        <tr>
                            <td>Status Approval</td>
                            <td> : </td>
                            <th>
                                <h5 class="card-subtitle fw-bold" style="color:red"><?= $konsumen['status_approval']; ?></h5>
                            </th>
                        </tr>
                    </table>
                    <?php if (in_groups('Superuser') || in_groups('Administrator')) : ?>
                        <form action="<?= base_url('/konsumen/' . $konsumen['id']); ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?');"><i class="fa fa-trash"></i> Hapus Konsumen</button>
                        </form>
                        <a href="<?= base_url('/konsumen/' . $konsumen['id'] . '/edit'); ?>" class="btn btn-warning mt-3 mx-3"><i class="fa fa-pencil"></i> Edit</a>
                    <?php endif; ?>
                    <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Admin')) : ?>
                        <a href="<?php if ($akun['no_akun'] != null) {
                                        echo base_url('/akun/kembali');
                                    } else if ($konsumen['status_approval'] != 'Approved') {
                                        echo base_url('/akun/status');
                                    } else {
                                        echo base_url('/akun/create/' . $konsumen['id']);
                                    }
                                    ?>" class="btn btn-outline-primary mt-3 mx-3"><i class="fa fa-book"></i> Buat Akun</a>
                        <a href="<?php if ($akun['no_akun'] != null) {
                                        echo base_url('/akun/' . $konsumen['id']);
                                    } else {
                                        echo base_url('/akun/batal');
                                    } ?>" class="btn btn-outline-success mt-3 mx-3"><i class="fa fa-money"></i> Lihat Transaksi</a>
                    <?php endif ?>
                    <?php if (in_groups('Surveyor')) : ?>
                        <?php if ($konsumen['status_approval'] == 'Sedang Proses') : ?>
                            <a href="<?= base_url('/konsumen/' . $konsumen['id'] . '/survey_edit'); ?>" class="btn btn-warning mt-3 mx-3"><i class="fa fa-pencil"></i> Update Status</a>
                        <?php endif ?>
                    <?php endif ?>
                </div>

                <hr>
                <small style="color: red; font-size:10px">*) Sebelum <b>Hapus Konsumen</b>, Pastikan Sudah <b>Hapus Akun</b> Terlebih Dahulu!</small>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>