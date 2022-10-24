<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Users / Pengguna</h1>
            <div class="row">
                <div class="col mb-5">
                    <a href="<?= base_url('register') ?>" class="btn btn-success mt-3"><i class="fa fa-plus-circle"></i> Tambah User</a>
                </div>
            </div>
            <table class="table table-hover mt-4" id="konsumenTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($users as $user) : ?>
                        <?php if ($user->name != 'Administrator') : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><a href="<?= base_url('/users/' . $user->userid); ?>"><?= $user->name; ?></a></td>

                                <td>
                                    <form action="<?= base_url('/users/' . $user->userid); ?>" method="POST" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-circle btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus User" onclick="return confirm('Anda Yakin Akan Menghapus User Ini?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>