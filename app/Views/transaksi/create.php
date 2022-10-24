<?php
echo $this->extend('layout/template');

echo $this->section('content');

foreach ($akun as $akun) {
}

?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h2>Tambah Data Transaksi</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/konsumen/' . $konsumen['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/transaksi/save'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="no_akun" class="form-label">No Akun</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_akun')) ? 'is-invalid' : ''; ?>" id="no_akun" name="no_akun" value="<?= $akun['no_akun']; ?>" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('no_akun'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_konsumen')) ? 'is-invalid' : ''; ?>" id="nama_konsumen" name="nama_konsumen" value="<?= $akun['nama_konsumen']; ?>" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama_konsumen'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= $akun['telpon']; ?>" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('telpon'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="datetime" style="display: none;" class="form-control" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date('Y/m/d H:i:s'); ?>" readonly>
                    <input type="datetime" class="form-control" id="tgl" name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo date('d/m/Y', strtotime(date('Y/m/d'))); ?>" readonly>

                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_ba" class="form-label">No Berita Acara</label>
                    <input type="text" class="form-control" id="no_ba" name="no_ba">
                </div>
                <div class="mb-3">
                    <label for="simpan" class="form-label">Simpan</label>
                    <input type="text" class="form-control angka4 <?= ($validation->hasError('simpan')) ? 'is-invalid' : ''; ?>" id="simpan" name="simpan" value="<?= old('simpan'); ?>" onkeyup="hitungAmbil()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('simpan'); ?>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="angsuran" name="angsuran" value="<?= ($konsumen['angsuran']); ?>">
                <input type="hidden" class="form-control" id="os" name="os" value="<?= ($konsumen['os']); ?>">
                <input type="hidden" class="form-control" id="sisa_os0" name="sisa_os0" value="<?= ($akun['sisa_os']); ?>">
                <input type="hidden" class="form-control" id="tenor" name="tenor" value="<?= $konsumen['tenor']; ?>">
                <input type="hidden" class="form-control" id="simpan_sebelumnya" name="simpan_sebelumnya" value="<?= ($akun['simpan']); ?>">
                <input type="hidden" class="form-control" id="ambil_sebelumnya" name="ambil_sebelumnya" value="<?= ($akun['ambil']); ?>">
                <input type="hidden" class="form-control" id="saldo_sebelumnya" name="saldo_sebelumnya" value="<?= ($akun['saldo']); ?>">
                <input type="hidden" class="form-control" id="dp" name="dp" value="<?= ($konsumen['dp']); ?>">
                <input type="hidden" class="form-control" id="angsuran_ke_sebelumnya" name="angsuran_ke_sebelumnya" value="<?= ($akun['angsuran_ke']); ?>">
                <input type="hidden" class="form-control" id="sisa_os" name="sisa_os">
                <input type="hidden" class="form-control" id="test1" name="test1">
                <input type="hidden" class="form-control" id="test2" name="test2">
                <input type="hidden" class="form-control" id="test3" name="test3">
                <input type="hidden" class="form-control" id="total_simpan" name="total_simpan">
                <div class="mb-3">
                    <label for="ambil" class="form-label">Ambil</label>
                    <input type="text" class="form-control angka4 <?= ($validation->hasError('ambil')) ? 'is-invalid' : ''; ?>" id="ambil" name="ambil" value="<?= old('ambil'); ?>" onkeyup="hitungAmbil()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('ambil'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="text" class="form-control angka4 <?= ($validation->hasError('saldo')) ? 'is-invalid' : ''; ?>" id="saldo" name="saldo" value="<?= old('saldo'); ?>" onkeyup="hitungAmbil()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('saldo'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="angsuran_ke" class="form-label">Angsuran Ke - </label>
                    <input type="text" class="form-control <?= ($validation->hasError('angsuran_ke')) ? 'is-invalid' : ''; ?>" id="angsuran_ke" name="angsuran_ke" value="<?= old('angsuran_ke'); ?>" onkeyup="hitungAmbil()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('angsuran_ke'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="collector" class="form-label">Collector</label>
                    <select name="collector" id="collector" class="form-control">
                        <option value="">----- Silahkan Pilih Nama Collector -----</option>
                        <?php foreach ($pegawai as $pegawai) : ?>
                            <option value="<?= $pegawai['nama_pegawai']; ?>"><?= $pegawai['nama_pegawai']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"><?= old('keterangan'); ?></textarea>
                </div>
                <input type="hidden" name="konsumen_id" value="<?= $akun['konsumen_id']; ?>">
                <input type="hidden" name="user_input" value="<?= user()->username; ?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function hitungAmbil() {
        var os = document.getElementById('os').value
        var angsuran = document.getElementById('angsuran').value
        var tenor = document.getElementById('tenor').value
        var sisaOsSebelumnya = document.getElementById('sisa_os0').value
        var simpanSebelumnya = document.getElementById('simpan_sebelumnya').value
        var ambilSebelumnya = document.getElementById('ambil_sebelumnya').value
        var saldoSebelumnya = document.getElementById('saldo_sebelumnya').value
        var dp = document.getElementById('dp').value
        var dpAngsuran = parseInt(dp) + parseInt(angsuran)
        document.getElementById('test1').value = dpAngsuran

        var simpan = document.getElementById('simpan').value
        var simpan1 = simpan.split('.').join('')
        var totalSimpan = parseInt(saldoSebelumnya) + parseInt(simpan1)
        document.getElementById('total_simpan').value = totalSimpan

        // Menghitung Ambil Untuk Angsuran
        if (totalSimpan < angsuran) {
            document.getElementById('ambil').value = 0
        } else if (totalSimpan == angsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0 && dp != 0) {
                document.getElementById('ambil').value = 0
                // document.getElementById('ambil').value = desimal(simpan1)
            } else if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0 && dp == 0) {
                document.getElementById('ambil').value = desimal(totalSimpan)
            } else {
                document.getElementById('ambil').value = desimal(totalSimpan)
            }
        } else if (totalSimpan >= dpAngsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0) {
                document.getElementById('ambil').value = desimal(dpAngsuran)
            } else {
                document.getElementById('ambil').value = desimal(parseInt(angsuran))
            }
        } else if (totalSimpan > angsuran && totalSimpan < dpAngsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0) {
                document.getElementById('ambil').value = 0
            } else {
                document.getElementById('ambil').value = desimal(parseInt(angsuran))
            }
        }

        // Menghitung Saldo
        var ambil = document.getElementById('ambil').value
        var ambil1 = ambil.split('.').join('')

        var saldo = parseInt(totalSimpan) - parseInt(ambil1)
        document.getElementById('saldo').value = desimal(saldo)

        // Menghitung Sisa OS
        if (totalSimpan < angsuran) {
            var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(ambil)
            document.getElementById('sisa_os').value = sisaOs
        } else if (totalSimpan == angsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0) {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(ambil1)
                document.getElementById('sisa_os').value = sisaOs
            } else {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(angsuran)
                document.getElementById('sisa_os').value = sisaOs
            }
        } else if (totalSimpan >= dpAngsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0) {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(angsuran)
                document.getElementById('sisa_os').value = sisaOs
            } else {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(angsuran)
                document.getElementById('sisa_os').value = sisaOs
            }
        } else if (totalSimpan > angsuran && totalSimpan < dpAngsuran) {
            if (simpanSebelumnya == 0 && ambilSebelumnya == 0 && saldoSebelumnya == 0) {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(ambil1)
                document.getElementById('sisa_os').value = sisaOs
            } else {
                var sisaOs = parseInt(sisaOsSebelumnya) - parseInt(angsuran)
                document.getElementById('sisa_os').value = sisaOs
            }
        }

        var angsuranKeSebelumnya0 = document.getElementById('angsuran_ke_sebelumnya').value
        var angsuranKeSebelumnya = parseInt(angsuranKeSebelumnya0)

        // Menentukan Angsuran Keberapa
        var dpAngsuranKe1 = parseInt(os) - parseInt(dpAngsuran)
        var angsuranKe1 = (parseInt(os) - parseInt(angsuran))
        var angsuranKe2 = (parseInt(os) - (2 * parseInt(angsuran)))
        var angsuranKe3 = (parseInt(os) - (3 * parseInt(angsuran)))
        var angsuranKe4 = (parseInt(os) - (4 * parseInt(angsuran)))
        var angsuranKe5 = (parseInt(os) - (5 * parseInt(angsuran)))
        var angsuranKe6 = (parseInt(os) - (6 * parseInt(angsuran)))
        var angsuranKe7 = (parseInt(os) - (7 * parseInt(angsuran)))
        var angsuranKe8 = (parseInt(os) - (8 * parseInt(angsuran)))
        var angsuranKe9 = (parseInt(os) - (9 * parseInt(angsuran)))
        var angsuranKe10 = (parseInt(os) - (10 * parseInt(angsuran)))
        var angsuranKe11 = (parseInt(os) - (11 * parseInt(angsuran)))
        var angsuranKe12 = (parseInt(os) - (12 * parseInt(angsuran)))
        var angsuranKe13 = (parseInt(os) - (13 * parseInt(angsuran)))
        var angsuranKe14 = (parseInt(os) - (14 * parseInt(angsuran)))
        var angsuranKe15 = (parseInt(os) - (15 * parseInt(angsuran)))

        if (sisaOs == angsuranKe1) {
            document.getElementById('angsuran_ke').value = '1'
        } else if (sisaOs == angsuranKe2) {
            document.getElementById('angsuran_ke').value = '2'
        } else if (sisaOs == angsuranKe3) {
            document.getElementById('angsuran_ke').value = '3'
        } else if (sisaOs == angsuranKe4) {
            document.getElementById('angsuran_ke').value = '4'
        } else if (sisaOs == angsuranKe5) {
            document.getElementById('angsuran_ke').value = '5'
        } else if (sisaOs == angsuranKe6) {
            document.getElementById('angsuran_ke').value = '6'
        } else if (sisaOs == angsuranKe7) {
            document.getElementById('angsuran_ke').value = '7'
        } else if (sisaOs == angsuranKe8) {
            document.getElementById('angsuran_ke').value = '8'
        } else if (sisaOs == angsuranKe9) {
            document.getElementById('angsuran_ke').value = '9'
        } else if (sisaOs == angsuranKe10) {
            document.getElementById('angsuran_ke').value = '10'
        } else if (sisaOs == angsuranKe11) {
            document.getElementById('angsuran_ke').value = '11'
        } else if (sisaOs == angsuranKe12) {
            document.getElementById('angsuran_ke').value = '12'
        } else if (sisaOs == angsuranKe13) {
            document.getElementById('angsuran_ke').value = '13'
        } else if (sisaOs == angsuranKe14) {
            document.getElementById('angsuran_ke').value = '14'
        } else if (sisaOs == angsuranKe15) {
            document.getElementById('angsuran_ke').value = '15'
        } else {
            document.getElementById('angsuran_ke').value = ' '
        }

    }
</script>

<?= $this->endSection(); ?>