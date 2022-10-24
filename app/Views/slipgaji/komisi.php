<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>Tambah Data Penjualan Marketing <?= $pegawai['nama_pegawai']; ?></h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/slipGaji/index/' . $pegawai['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <table class="table table-hover hurufKecil">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">No</th>
                        <th rowspan="2" class="align-middle">Nama Konsumen</th>
                        <th rowspan="2" class="align-middle">Nama Barang</th>
                        <th rowspan="2" class="align-middle">Angsuran</th>
                        <th rowspan="2" class="align-middle">Tenor</th>
                        <th rowspan="2" class="align-middle">Penjualan</th>
                        <th colspan="3" class="text-center">Komisi</th>
                    </tr>
                    <tr>
                        <th>8%</th>
                        <th>7%</th>
                        <th>1%</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($komisi as $komisi) {
                        $no++;
                        $hari_ini = date('d-m-Y');
                        $periode1 = date('d-m-Y', strtotime('+15 days', strtotime($hari_ini)));
                    ?>
                        <tr>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="<?= base_url(''); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip']; ?>" readonly>
                <input type="hidden" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" readonly>
                <input type="hidden" class="form-control" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>" readonly>

                <div class="mb-3 mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="periode" class="form-label">Periode</label>
                            <input type="number" class="form-control" id="periode" name="periode" value="<?= old('periode'); ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="tgl_laporan" class="form-label">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tgl_laporan" name="tgl_laporan" value="<?= old('tgl_laporan'); ?>" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>