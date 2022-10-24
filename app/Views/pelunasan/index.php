<?php
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($akun as $akun) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h1>Pelunasan Dipercepat</h1>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/akun/' . $akun['konsumen_id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/pelunasan/save'); ?>" method="POST">
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
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="datetime" style="display: none;" class="form-control" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date('Y-m-d H:i:s'); ?>" readonly>
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
                    <label for="sisa_os0" class="form-label">Sisa OS</label>
                    <input type="text" class="form-control <?= ($validation->hasError('sisa_os0')) ? 'is-invalid' : ''; ?>" id="sisa_os0" name="sisa_os0" value="<?= $konverter->rupiah($akun['sisa_os']); ?>" onkeyup="pelunasan()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sisa_os0'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="saldo_akun" class="form-label">Saldo Akun</label>
                    <input type="text" class="form-control" name="saldo_akun" id="saldo_akun" value="<?= $konverter->rupiah($akun['saldo']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control angka1 <?= ($validation->hasError('diskon')) ? 'is-invalid' : ''; ?>" id="diskon" name="diskon" value="<?= old('diskon'); ?>" onkeyup="pelunasan()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('diskon'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jml_pelunasan" class="form-label">Total Yang Harus Dilunasi</label>
                    <input type="text" class="form-control angka4 <?= ($validation->hasError('jml_pelunasan')) ? 'is-invalid' : ''; ?>" id="jml_pelunasan" name="jml_pelunasan" value="<?= old('jml_pelunasan'); ?>" onkeyup="pelunasan()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jml_pelunasan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="simpan" class="form-label">Simpan</label>
                    <input type="text" class="form-control angka1 <?= ($validation->hasError('simpan')) ? 'is-invalid' : ''; ?>" id="simpan" name="simpan" value="<?= old('simpan'); ?>" onkeyup="pelunasan()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('simpan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ambil" class="form-label">Ambil</label>
                    <input type="text" class="form-control" name="ambil" id="ambil" readonly>
                </div>
                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="text" class="form-control" name="saldo" id="saldo" readonly>
                </div>
                <div class="mb-3">
                    <label for="sisa_os" class="form-label">OS Setelah Pelunasan</label>
                    <input type="text" class="form-control angka4 <?= ($validation->hasError('sisa_os')) ? 'is-invalid' : ''; ?>" id="sisa_os" name="sisa_os" value="<?= old('sisa_os'); ?>" onkeyup="pelunasan()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sisa_os'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="collector" class="form-label">Collector</label>
                    <select name="collector" id="collector" class="form-control" required>
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
    function pelunasan() {
        var rp = 'Rp. '

        var sisa_os0 = document.getElementById('sisa_os0').value
        var sisa_os1 = sisa_os0.split('Rp.').join('').split('.').join('')

        var saldoAkun = document.getElementById('saldo_akun').value
        var saldoAkun1 = saldoAkun.split('Rp.').join('').split('.').join('')

        var diskon = document.getElementById('diskon').value
        var diskon1 = diskon.split('Rp.').join('').split('.').join('')

        var jml_pelunasan = parseInt(sisa_os1) - parseInt(diskon1) - parseInt(saldoAkun1)
        document.getElementById('jml_pelunasan').value = rp + desimal(jml_pelunasan)

        var simpan = document.getElementById('simpan').value
        var simpan1 = simpan.split('Rp.').join('').split('.').join('')

        var total_bayar = parseInt(simpan1) + parseInt(diskon1) + parseInt(saldoAkun1)
        var sisa_os_akhir = parseInt(jml_pelunasan) - parseInt(simpan1)

        if (total_bayar == sisa_os1) {
            document.getElementById('sisa_os').value = 0
        } else {
            document.getElementById('sisa_os').value = sisa_os0
        }

        var yangDiambil = parseInt(simpan1) + parseInt(saldoAkun1)

        if (sisa_os_akhir == 0) {
            document.getElementById('ambil').value = rp + desimal(yangDiambil)
        } else {
            document.getElementById('ambil').value = 0
        }

        var ambil = document.getElementById('ambil').value
        var ambil1 = ambil.split('Rp.').join('').split('.').join('')
        var saldo = parseInt(simpan1) - parseInt(ambil1) + parseInt(saldoAkun1)
        document.getElementById('saldo').value = rp + desimal(saldo)
    }
</script>

<?= $this->endSection(); ?>