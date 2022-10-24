<?php
date_default_timezone_set('Asia/Jakarta');
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row noprint">
                <div class="col-10">
                    <h2>Cetak Slip Gaji</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/slipGaji/index/' . $slip['pegawai_id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="kwit">
                        <h3 class="card-title text-center fw-bolder">MITRA BERSAMA ZE</h3>
                        <p class="text-center">memberikan solusi kebutuhan rumah tangga anda</p>
                    </div>
                    <div class="kwit">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>BULAN</td>
                                        <td>:</td>
                                        <td><?= date('d-M-Y', strtotime($slip['tgl_gajian'])); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>MULAI GABUNG</td>
                                        <td>:</td>
                                        <td><?= date('d-M-Y', strtotime($slip['tgl_gabung'])); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>NAMA</td>
                                        <td>:</td>
                                        <td><?= $slip['nama_pegawai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NOMOR</td>
                                        <td>:</td>
                                        <td><?= $slip['nip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>JABATAN</td>
                                        <td>:</td>
                                        <td><?= $slip['jabatan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <table class="table table-borderless">
                                    <tr>
                                        <td colspan="6"></td>

                                    </tr>
                                    <tr>
                                        <td>GAJI POKOK</td>
                                        <td>:</td>
                                        <td colspan="4"></td>
                                        <td class="text-right"><?= $konverter->rupiah($slip['gaji_pokok']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>TUNJANGAN JABATAN</td>
                                        <td>:</td>
                                        <td colspan="4"></td>
                                        <td class="text-right"><?= $slip['tunjangan_jabatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>UANG BENSIN</td>
                                        <td>:</td>
                                        <td><?= $slip['jml_kunjungan']; ?></td>
                                        <td>X</td>
                                        <td>Rp. 10.000</td>
                                        <td>=</td>
                                        <td class="text-right"><?= $konverter->rupiah($slip['uang_bensin']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>GANTI OLI</td>
                                        <td>:</td>
                                        <td colspan="4"></td>
                                        <td class="text-right" style="border-bottom: solid black 1px ;">
                                            <?= $konverter->rupiah($slip['ganti_oli']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bolder">TOTAL YANG DITERIMA</td>
                                        <td>:</td>
                                        <td colspan="4"></td>
                                        <td class="text-right font-weight-bolder"><?= $konverter->rupiah($slip['total_diterima']); ?></td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>POTONGAN</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>KASBON</td>
                                        <td>:</td>
                                        <td colspan="5"></td>
                                        <td class="text-right" style="border-bottom: solid black 1px ;">
                                            <?= $konverter->rupiah($slip['kasbon']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bolder">TOTAL YANG DIBAWA PULANG</td>
                                        <td>:</td>
                                        <td colspan="4"></td>
                                        <td class="text-right font-weight-bolder"><?= $konverter->rupiah($slip['total_dibawa_pulang']); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <input type="hidden" name="user_print" value="<?= user()->username ?>">
            <div class=" noprint card-footer">
                <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->endSection();
?>