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
            <table class="table table-hover mt-4" id="konsumenTable">
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
                            <td><?= $pegawai['nip']; ?></td>
                            <td><?= $pegawai['nama_pegawai']; ?></td>
                            <td><?= $pegawai['jabatan']; ?></td>
                            <td><?= $pegawai['telpon']; ?></td>
                            <td><?= $pegawai['alamat']; ?></td>
                            <td>
                                <button class="badge badge-warning"><a href="<?= base_url('/pegawai/edit/' . $pegawai['id']); ?>"><i class="fa fa-pencil"></i> Edit</a></button> |
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