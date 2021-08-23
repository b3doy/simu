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
                    <a href="<?= base_url(); ?>/register" class="btn btn-success mt-3"><i class="fa fa-plus-circle"></i> Tambah User</a>
                </div>
            </div>
            <table class="table table-hover mt-4" id="konsumenTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($users as $user) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->password; ?></td>

                            <td>
                                <button class="badge badge-warning"><a href="<?= base_url('/register/' . $user->id); ?>"><i class="fa fa-pencil"></i> Edit</a></button> |

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