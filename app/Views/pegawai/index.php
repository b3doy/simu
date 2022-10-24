<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Pegawai</h1>
            <div class="row">
                <div class="col mb-5">
                    <a href="<?= base_url('/pegawai/create'); ?>" class="btn btn-success mt-3"><i class="fa fa-plus-circle"></i> Tambah Data Pegawai</a>
                </div>
            </div>
            <table class="table table-hover hurufKecil" id="konsumenTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($pegawai as $pegawai) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><a href="<?= base_url('slipGaji/index/' . $pegawai['id']); ?>" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Slip Gaji"><?= $pegawai['nip']; ?></a></td>
                            <td>
                                <a href="<?= base_url('pegawai/detail/' . $pegawai['id']); ?>" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Data Konsumen Berdasarkan Marketing"><?= $pegawai['nama_pegawai']; ?></a>
                            </td>
                            <td>
                                <?php if (($pegawai['jabatan'] == 'OWNER / SURVEYOR / MARKETING / COLLECTOR') || ($pegawai['jabatan'] == 'MARKETING / SURVEYOR')) : ?>
                                    <a href=" <?= base_url('pegawai/surveyor/' . $pegawai['id']); ?>" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Data Konsumen Berdasarkan Surveyor"><?= $pegawai['jabatan']; ?></a>
                                <?php else : ?>
                                    <?= $pegawai['jabatan']; ?>
                                <?php endif ?>
                            </td>
                            <td><?= $pegawai['telpon']; ?></td>
                            <td><?= $pegawai['alamat']; ?></td>
                            <td>
                                <button class="badge badge-warning">
                                    <a class="badge badge-warning" href="<?= base_url('/pegawai/edit/' . $pegawai['id']); ?>" style="color:black"><i class="fa fa-pencil" style="color:black"></i> Edit</a>
                                </button> |
                                <form action="<?= base_url('/pegawai/' . $pegawai['id']); ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="badge badge-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini???')"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>