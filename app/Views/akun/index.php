<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>Data Akun Konsumen</h2>
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
                <!-- <div class="col">
                    <a href="<?= base_url(''); ?>" class="btn btn-primary mt-3"><i class="fa fa-plus-circle"></i> Tambah Data Konsumen</a>
                </div> -->
                <form action="" method="POST" class="d-inline col-md-4">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Cari Nama / No Akun Disini..." name="cari" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Tanggal Buka Akun</th>
                        <th scope="col">Lihat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 + (5 * ($current_page - 1)); ?>
                    <?php foreach ($akun as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['no_akun']; ?></td>
                            <td><?= $akun['nama_konsumen']; ?></td>
                            <td><?= $akun['telpon']; ?></td>
                            <td><?= date('d/m/Y ; H:i', strtotime($akun['tanggal'])); ?></td>
                            <td>
                                <a href="<?= base_url(); ?>/akun/<?= $akun['konsumen_id'] . '/' . $akun['id']; ?>" class="btn btn-outline-info">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('akun', 'custom_pagination'); ?>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>