<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>Tambah Data Slip Gaji <?= $pegawai['nama_pegawai']; ?></h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/slipGaji/index/' . $pegawai['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/slipGaji/save'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip']; ?>" readonly>
                <input type="hidden" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" readonly>
                <input type="hidden" class="form-control" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>" readonly>

                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="tgl_gabung" class="form-label">Tanggal Gabung</label>
                            <input type="date" class="form-control" id="tgl_gabung" name="tgl_gabung" value="<?= old('tgl_gabung'); ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="tgl_gajian" class="form-label">Tanggal Gajian</label>
                            <input type="date" class="form-control" id="tgl_gajian" name="tgl_gajian" value="<?= old('tgl_gajian'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                            <input type="text" class="form-control angka1" id="gaji_pokok" name="gaji_pokok" value="<?= old('gaji_pokok'); ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="tunjangan_jabatan" class="form-label">Tunjangan Jabatan</label>
                            <input type="text" class="form-control angka1" id="tunjangan_jabatan" name="tunjangan_jabatan" value="<?= old('tunjangan_jabatan'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="jml_kunjungan" class="form-label">Jumlah Kunjungan</label>
                            <input type="number" class="form-control" id="jml_kunjungan" name="jml_kunjungan" value="<?= old('jml_kunjungan'); ?>" onkeyup="hitungBensin()" required>
                        </div>
                        <div class="col-md-4">
                            <label for="uang_bensin" class="form-label">Uang Bensin</label>
                            <input type="text" class="form-control angka1" id="uang_bensin" name="uang_bensin" value="<?= old('uang_bensin'); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="ganti_oli" class="form-label">Ganti Oli</label>
                            <input type="text" class="form-control angka1" id="ganti_oli" name="ganti_oli" value="<?= old('ganti_oli'); ?>" onkeyup="hitungTotalDiterima()" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="total_diterima" class="form-label">Total Diterima</label>
                            <input type="text" class="form-control angka1" id="total_diterima" name="total_diterima" value="<?= old('total_diterima'); ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="kasbon" class="form-label">Kasbon</label>
                            <input type="text" class="form-control angka1" id="kasbon" name="kasbon" value="<?= old('kasbon'); ?>" onkeyup="hitungTHP()" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="total_dibawa_pulang" class="form-label">Take Home Pay</label>
                            <input type="text" class="form-control angka1" id="total_dibawa_pulang" name="total_dibawa_pulang" value="<?= old('total_dibawa_pulang'); ?>" required>
                            <input type="hidden" name="pegawai_id" value="<?= $pegawai['id']; ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>

        </div>
    </div>
</div>

<script>
    function hitungBensin() {
        var rp = 'Rp. '
        var kunjungan = document.getElementById('jml_kunjungan').value
        var uangBensin = kunjungan * 10000
        document.getElementById('uang_bensin').value = rp + uangBensin
    }

    function hitungTotalDiterima() {
        var rp = 'Rp. '
        var gajiPokok = document.getElementById('gaji_pokok').value.split('Rp.').join('').split('.').join('')
        var tunjanganJabatan = document.getElementById('tunjangan_jabatan').value.split('Rp.').join('').split('.').join('')
        var uangBensin = document.getElementById('uang_bensin').value.split('Rp.').join('').split('.').join('')
        var gantiOli = document.getElementById('ganti_oli').value.split('Rp.').join('').split('.').join('')
        var totalDiterima = parseInt(gajiPokok) + parseInt(tunjanganJabatan) + parseInt(uangBensin) + parseInt(gantiOli)
        document.getElementById('total_diterima').value = rp + totalDiterima
    }

    function hitungTHP() {
        var rp = 'Rp. '
        var totalDiterima = document.getElementById('total_diterima').value.split('Rp.').join('').split('.').join('')
        var kasbon = document.getElementById('kasbon').value.split('Rp.').join('').split('.').join('')
        var thp = parseInt(totalDiterima) - parseInt(kasbon)
        document.getElementById('total_dibawa_pulang').value = rp + thp
    }
</script>

<?= $this->endSection(); ?>