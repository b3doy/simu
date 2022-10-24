<?php
echo $this->extend('layout/template');

echo $this->section('content');

foreach ($konsumen as $konsumen) {
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h2>Edit Data Transaksi</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/transaksi/index/' . $akun['konsumen_id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/transaksi/update/' . $akun['id']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name='id' value="<?= $akun['id']; ?>">
                <div class="mb-3">
                    <label for="no_akun" class="form-label">No Akun</label>
                    <input type="text" class="form-control" id="no_akun" name="no_akun" value="<?= $akun['no_akun']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="<?= $akun['nama_konsumen']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $akun['telpon']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="datetime" class="form-control" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                    echo date('Y/m/d'); ?>">
                    <input type="datetime" style="display: none;" class="form-control" id="tgl" name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                    echo date('d/m/Y', strtotime(date('Y/m/d'))); ?>" readonly>

                </div>
                <div class="mb-3">
                    <label for="no_ba" class="form-label">No Berita Acara</label>
                    <input type="number" class="form-control" id="no_ba" name="no_ba" value="<?= $akun['no_ba']; ?>">
                </div>
                <div class="mb-3">
                    <label for="simpan" class="form-label">Simpan</label>
                    <input type="text" class="form-control angka4" id="simpan" name="simpan" value="<?= intval($akun['simpan']); ?>">
                </div>

                <div class="mb-3">
                    <label for="ambil" class="form-label">Ambil</label>
                    <input type="text" class="form-control angka4" id="ambil" name="ambil" value="<?= intval($akun['ambil']); ?>">
                </div>
                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="text" class="form-control angka4" id="saldo" name="saldo" value="<?= intval($akun['saldo']); ?>">
                </div>
                <div class="mb-3">
                    <label for="sisa_os" class="form-label">Sisa Os</label>
                    <input type="text" class="form-control angka4" id="sisa_os" name="sisa_os" value="<?= intval($akun['sisa_os']); ?>">
                </div>
                <div class="mb-3">
                    <label for="angsuran_ke" class="form-label">Angsuran Ke - </label>
                    <input type="text" class="form-control" id="angsuran_ke" name="angsuran_ke" value="<?= intval($akun['angsuran_ke']); ?>">
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
                    <textarea name="keterangan" id="keterangan" class="form-control"><?= $akun['keterangan']; ?></textarea>
                </div>
                <input type="hidden" name="konsumen_id" value="<?= $akun['konsumen_id']; ?>">
                <input type="hidden" name="user_input" value="<?= user()->username; ?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>