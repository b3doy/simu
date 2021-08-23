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
                                                                                                                            echo date('Y/m/d'); ?>" readonly>
                    <input type="datetime" class="form-control" id="tgl" name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo date('d/m/Y', strtotime(date('Y/m/d'))); ?>" readonly>

                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_ba" class="form-label">No Berita Acara</label>
                    <input type="number" class="form-control" id="no_ba" name="no_ba">
                </div>
                <div class="mb-3">
                    <label for="simpan" class="form-label">Simpan</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('simpan')) ? 'is-invalid' : ''; ?>" id="simpan" name="simpan" value="<?= old('simpan'); ?>" onkeyup="hitungAmbil()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('simpan'); ?>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="angsuran" name="angsuran" value="<?= $konverter->rupiah02($konsumen['angsuran']); ?>">
                <input type="hidden" class="form-control" id="os" name="os" value="<?= $konverter->rupiah02($konsumen['os']); ?>">
                <input type="hidden" class="form-control" id="sisa_os0" name="sisa_os0" value="<?= $konverter->rupiah02($akun['sisa_os']); ?>">
                <input type="hidden" class="form-control" id="tenor" name="tenor" value="<?= $konsumen['tenor']; ?>">
                <input type="hidden" class="form-control" id="simpan_sebelumnya" name="simpan_sebelumnya" value="<?= $konverter->rupiah02($akun['simpan']); ?>">
                <input type="hidden" class="form-control" id="ambil_sebelumnya" name="ambil_sebelumnya" value="<?= $konverter->rupiah02($akun['ambil']); ?>">
                <input type="hidden" class="form-control" id="saldo_sebelumnya" name="saldo_sebelumnya" value="<?= $konverter->rupiah02($akun['saldo']); ?>">
                <input type="hidden" class="form-control" id="dp" name="dp" value="<?= $konverter->rupiah02($konsumen['dp']); ?>">
                <input type="hidden" class="form-control" id="sisa_os" name="sisa_os">
                <input type="hidden" class="form-control" id="test1" name="test1">
                <input type="hidden" class="form-control" id="test2" name="test2">
                <input type="hidden" class="form-control" id="test3" name="test3">
                <div class="mb-3">
                    <label for="ambil" class="form-label">Ambil</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('ambil')) ? 'is-invalid' : ''; ?>" id="ambil" name="ambil" value="<?= old('ambil'); ?>" onkeyup="hitungAmbil()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('ambil'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('saldo')) ? 'is-invalid' : ''; ?>" id="saldo" name="saldo" value="<?= old('saldo'); ?>" onkeyup="hitungAmbil()" readonly>
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
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"><?= old('keterangan'); ?></textarea>
                </div>
                <input type="hidden" name="konsumen_id" value="<?= $akun['konsumen_id']; ?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function hitungAmbil() {
        var rp = "Rp. "

        var simp = document.getElementById('simpan').value
        var simp1 = simp.split('Rp.').join('').split('.').join('')

        var angs = document.getElementById('angsuran').value
        var angs1 = angs.split('Rp.').join('').split('.').join('')

        var dp = document.getElementById('dp').value
        var dp1 = dp.split('Rp.').join('').split('.').join('')

        var dpAngs = rp + (parseInt(angs1) + parseInt(dp1)) + ',00'
        var dpAngs1 = dpAngs.split('Rp.').join('').split('.').join('')

        var simpanSebelumnya = document.getElementById('simpan_sebelumnya').value
        var simpanSebelumnya1 = simpanSebelumnya.split('Rp.').join('').split('.').join('')

        var ambilSebelumnya = document.getElementById('ambil_sebelumnya').value
        var ambilSebelumnya1 = ambilSebelumnya.split('Rp.').join('').split('.').join('')

        var saldoSebelumnya = document.getElementById('saldo_sebelumnya').value
        var saldoSebelumnya1 = saldoSebelumnya.split('Rp.').join('').split('.').join('')

        var jmlSimp = (parseInt(simp1) + parseInt(saldoSebelumnya1))
        var jmlSimp01 = rp + desimal(jmlSimp) + ',00'
        var jmlSimpanan = jmlSimp01.split('Rp.').join('').split('.').join('')

        // Menghitung jumlah yang di ambil (debet) dari tabungan untuk angsuran
        if (jmlSimpanan > angs1 && jmlSimpanan < dpAngs1) {
            if (simpanSebelumnya1 == " 0,00" && ambilSebelumnya1 == " 0,00" && saldoSebelumnya1 == " 0,00") {
                document.getElementById('ambil').value = rp + desimal(simp1)
            } else {
                document.getElementById('ambil').value = rp + desimal(angs1)
            }
        } else if (jmlSimpanan >= dpAngs1) {
            if (simpanSebelumnya1 == " 0,00" && ambilSebelumnya1 == " 0,00" && saldoSebelumnya1 == " 0,00") {
                document.getElementById('ambil').value = rp + desimal(dpAngs1)
            } else {
                document.getElementById('ambil').value = rp + desimal(angs1)
            }
        } else if (jmlSimpanan == angs1) {
            document.getElementById('ambil').value = jmlSimp01
        } else if (jmlSimpanan < angs1) {
            document.getElementById('ambil').value = 0
        }

        var ambil = document.getElementById("ambil").value
        var ambil1 = ambil.split("Rp.").join("").split(".").join("")

        // Menghitung Saldo
        var htgSaldo = parseInt(jmlSimpanan) - parseInt(ambil1)
        document.getElementById('saldo').value = rp + (desimal(htgSaldo)) + ",00"

        var tenor = document.getElementById('tenor').value

        var os0 = document.getElementById('os').value
        var os = os0.split('Rp.').join('').split('.').join('')

        var sisaOs0 = document.getElementById('sisa_os0').value
        var sisaOs1 = sisaOs0.split('Rp.').join('').split('.').join('')

        // Menghitung Sisa OS untuk menentukan Angsuran Keberapa
        if (ambil1 == angs1) {
            var sisaOs2 = parseInt(sisaOs1) - parseInt(ambil1) // KONDISI REAL SEHINGGA MASIH ADA SALDO APABILA NANTI ADA KEKURANGAN ANGSURAN 
            var sisaOs = rp + desimal(sisaOs2) + ',00'
            var sisaOsNya = sisaOs.split('Rp.').join('').split('.').join('')
            document.getElementById('sisa_os').value = sisaOsNya
        } else {
            var sisaOs2 = parseInt(sisaOs1) - parseInt(angs1)
            var sisaOs = rp + desimal(sisaOs2) + ',00'
            var sisaOsNya = sisaOs.split('Rp.').join('').split('.').join('')
            document.getElementById('sisa_os').value = sisaOsNya
        }

        // var sisaOs = rp + desimal(sisaOs2) + ',00'
        // var sisaOsNya = sisaOs.split('Rp.').join('').split('.').join('')
        // document.getElementById('sisa_os').value = sisaOsNya

        // Menentukan Angsuran Keberapa
        var dpAngsuranKe1 = rp + (parseInt(os) - parseInt(dpAngs1)) + ',00'
        var dpAngsuranKe01 = dpAngsuranKe1.split('Rp.').join('').split('.').join('')

        var angsuranKe1 = rp + (parseInt(os) - parseInt(angs1)) + ',00'
        var angsuranKe01 = angsuranKe1.split('Rp.').join('').split('.').join('')

        var angsuranKe2 = rp + (parseInt(os) - (2 * parseInt(angs1))) + ',00'
        var angsuranKe02 = angsuranKe2.split('Rp.').join('').split('.').join('')

        var angsuranKe3 = rp + (parseInt(os) - (3 * parseInt(angs1))) + ',00'
        var angsuranKe03 = angsuranKe3.split('Rp.').join('').split('.').join('')

        var angsuranKe4 = rp + (parseInt(os) - (4 * parseInt(angs1))) + ',00'
        var angsuranKe04 = angsuranKe4.split('Rp.').join('').split('.').join('')

        var angsuranKe5 = rp + (parseInt(os) - (5 * parseInt(angs1))) + ',00'
        var angsuranKe05 = angsuranKe5.split('Rp.').join('').split('.').join('')

        var angsuranKe6 = rp + (parseInt(os) - (6 * parseInt(angs1))) + ',00'
        var angsuranKe06 = angsuranKe6.split('Rp.').join('').split('.').join('')

        var angsuranKe7 = rp + (parseInt(os) - (7 * parseInt(angs1))) + ',00'
        var angsuranKe07 = angsuranKe7.split('Rp.').join('').split('.').join('')

        var angsuranKe8 = rp + (parseInt(os) - (8 * parseInt(angs1))) + ',00'
        var angsuranKe08 = angsuranKe8.split('Rp.').join('').split('.').join('')

        var angsuranKe9 = rp + (parseInt(os) - (9 * parseInt(angs1))) + ',00'
        var angsuranKe09 = angsuranKe9.split('Rp.').join('').split('.').join('')

        var angsuranKe10 = rp + (parseInt(os) - (10 * parseInt(angs1))) + ',00'
        var angsuranKe010 = angsuranKe10.split('Rp.').join('').split('.').join('')

        var angsuranKe11 = rp + (parseInt(os) - (11 * parseInt(angs1))) + ',00'
        var angsuranKe011 = angsuranKe11.split('Rp.').join('').split('.').join('')

        var angsuranKe12 = rp + (parseInt(os) - (12 * parseInt(angs1))) + ',00'
        var angsuranKe012 = angsuranKe12.split('Rp.').join('').split('.').join('')

        var angsuranKe13 = rp + (parseInt(os) - (13 * parseInt(angs1))) + ',00'
        var angsuranKe013 = angsuranKe13.split('Rp.').join('').split('.').join('')

        var angsuranKe14 = rp + (parseInt(os) - (14 * parseInt(angs1))) + ',00'
        var angsuranKe014 = angsuranKe14.split('Rp.').join('').split('.').join('')

        var angsuranKe15 = rp + (parseInt(os) - (15 * parseInt(angs1))) + ',00'
        var angsuranKe015 = angsuranKe15.split('Rp.').join('').split('.').join('')

        if (sisaOsNya == dpAngsuranKe01) {
            document.getElementById('angsuran_ke').value = '1'
        } else if (sisaOsNya == angsuranKe01) {
            document.getElementById('angsuran_ke').value = '1'
        } else if (sisaOsNya == angsuranKe02) {
            document.getElementById('angsuran_ke').value = '2'
        } else if (sisaOsNya == angsuranKe03) {
            document.getElementById('angsuran_ke').value = '3'
        } else if (sisaOsNya == angsuranKe04) {
            document.getElementById('angsuran_ke').value = '4'
        } else if (sisaOsNya == angsuranKe05) {
            document.getElementById('angsuran_ke').value = '5'
        } else if (sisaOsNya == angsuranKe06) {
            document.getElementById('angsuran_ke').value = '6'
        } else if (sisaOsNya == angsuranKe07) {
            document.getElementById('angsuran_ke').value = '7'
        } else if (sisaOsNya == angsuranKe08) {
            document.getElementById('angsuran_ke').value = '8'
        } else if (sisaOsNya == angsuranKe09) {
            document.getElementById('angsuran_ke').value = '9'
        } else if (sisaOsNya == angsuranKe010) {
            document.getElementById('angsuran_ke').value = '10'
        } else if (sisaOsNya == angsuranKe011) {
            document.getElementById('angsuran_ke').value = '11'
        } else if (sisaOsNya == angsuranKe012) {
            document.getElementById('angsuran_ke').value = '12'
        } else if (sisaOsNya == angsuranKe013) {
            document.getElementById('angsuran_ke').value = '13'
        } else if (sisaOsNya == angsuranKe014) {
            document.getElementById('angsuran_ke').value = '14'
        } else if (sisaOsNya == angsuranKe015) {
            document.getElementById('angsuran_ke').value = '15'
        } else {
            document.getElementById('angsuran_ke').value = ' '
        }
    }
</script>

<?= $this->endSection(); ?>