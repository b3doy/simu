<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>Slip Gaji <?= $pegawai['nama_pegawai']; ?></h2>
            <h5>NIP: <?= $pegawai['nip']; ?></h5>
            <h5>Jabatan: <?= $pegawai['jabatan']; ?></h5>
            <!-- Menampilkan Notifikasi Alert -->
            <?php if (session()->getFlashData('pesanBerhasil')) : ?>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashData('pesanBerhasil'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif (session()->getFlashData('pesanGagal')) : ?>
                <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashData('pesanGagal'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Menampilkan Notifikasi Alert -->
            <div class="row">
                <div class="col mb-5">
                    <?php if ($pegawai['jabatan'] != 'MARKETING') : ?>
                        <a href="<?= base_url('/slipGaji/create/' . $pegawai['id']); ?>" class="btn btn-success mt-3"><i class="fa fa-plus-circle"></i> Tambah Data Slip Gaji</a>
                    <?php else : ?>
                        <a href="<?= base_url('/slipGaji/komisi/' . $pegawai['id']); ?>" class="btn btn-success mt-3"><i class="fa fa-plus-circle"></i> Tambah Data Slip Gaji</a>
                    <?php endif ?>
                </div>
            </div>
            <table class="table table-hover hurufKecil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($slip as $slip) : ?>
                        <?php $no++; ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= date('F', strtotime($slip['tgl_gajian'])); ?></td>
                            <td>
                                <a href="<?= base_url('slipGaji/edit/' . $slip['id']); ?>" class="btn btn-warning btn-sm">Edit</a> ||
                                <a href="<?= base_url('slipGaji/cetak/' . $slip['id']); ?>" class="btn btn-info btn-sm">Cetak Slip Gaji</a> ||
                                <form action="<?= base_url('/slipgaji/' . $slip['id']); ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="pegawai_id" value="<?= $slip['pegawai_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini???')"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>