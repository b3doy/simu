<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row mb-5">
                <div class="col-10">
                    <h1>Data Konsumen di Survey oleh <?= $pegawai['nama_pegawai']; ?></h1>
                </div>
                <div class="col">
                    <div class="col-2">
                        <a href="<?= base_url('/surveyor/fpd/' . $pegawai['id']); ?>" class="btn btn-secondary btn-sm mt-2" role="button"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id_pegawai" value="<?= $pegawai['id']; ?>">
            <table class="table table-hover mt-5 hurufKecil" id="surveyorTable">
                <thead>
                    <tr>
                        <th scope="col">No Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Angsuran Ke</th>
                        <th scope="col">Tgl Angsuran</th>
                        <th scope="col">Tgl Bayar</th>
                        <th scope="col">Marketing</th>
                        <th scope="col">FPD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    ini_set('memory_limit', '-1');
                    for ($i = 0; $i < count($akun); $i++) {
                        $tgl_angsuran1 = $akun[$i]['tanggal_angsuran1'];
                        $tgl_angsuran2 = $akun[$i]['tanggal_angsuran2'];
                        $angsuran_ke = $akun[$i]['angsuran_ke'];
                        $tgl_bayar = $akun[$i]['tanggal'];
                        $sisa_os = $akun[$i]['sisa_os'];

                        if ($tgl_angsuran2 != $tgl_angsuran1) {
                            $tgl_angsuran = $tgl_angsuran2;
                            $tgl_jt_berikutnya = date('Y-m-d', strtotime((string)'+' . ($angsuran_ke - 2) . ' month', strtotime($tgl_angsuran)));

                            if ($angsuran_ke <= 6 && $angsuran_ke != 0 && $sisa_os != 0) {
                                if ($akun[$i]['ambil'] != 0) {
                    ?>
                                    <tr>
                                        <td><?= $akun[$i]['no_mitra']; ?></td>
                                        <td><?= $akun[$i]['nama_konsumen']; ?></td>
                                        <td><?= $angsuran_ke ?></td>
                                        <td><?= date('d-M-Y', strtotime($tgl_jt_berikutnya)); ?></td>
                                        <td><?= date('d-M-Y', strtotime($tgl_bayar)); ?></td>
                                        <td><?= $akun[$i]['marketing']; ?></td>
                                        <td id="status_fpd">
                                            <?php
                                            if (date('m-Y', strtotime($tgl_bayar)) > date('m-Y', strtotime($tgl_jt_berikutnya)) or date('Y', strtotime($tgl_bayar)) > date('Y', strtotime($tgl_jt_berikutnya))) {
                                                echo 'FPD';
                                            } else
                                                echo 'Tidak';
                                            ?>
                                        </td>
                                    </tr>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>