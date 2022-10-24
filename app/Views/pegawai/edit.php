<?php
echo $this->extend('layout/template');

echo $this->section('content');


?>

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h2>Tambah Data Pegawai</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/pegawai'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/pegawai/update/' . $pegawai['id']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $pegawai['id']; ?>">
                <div class="mb-3 mt-5">
                    <label for="nip" class="form-label">Nomor Induk Pegawai</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">Telpon</label>
                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $pegawai['telpon']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required><?= $pegawai['alamat']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>