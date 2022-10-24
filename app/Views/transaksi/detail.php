<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>Detail Akun</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/akun'); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <table class="table-sm">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <th><?= $konsumen['nama_konsumen']; ?></th>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td>:</td>
                            <th><?= $konsumen['telpon']; ?></th>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>No Akun</th>
                                <th>Tanggal</th>
                                <th>Setoran</th>
                                <th>Tarikan</th>
                                <th>Saldo</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($akun); $i++) : ?>
                                <tr>
                                    <td><?= $akun[$i]['no_akun']; ?></td>
                                    <td><?= date('d/m/Y ; H:i', strtotime($akun[$i]['tanggal'])); ?></td>
                                    <td><?= $konverter->rupiah02($akun[$i]['setoran']); ?></td>
                                    <td><?= $konverter->rupiah02($akun[$i]['tarikan']); ?></td>
                                    <?php if ($akun[$i != 0]) : ?>
                                        <td>
                                            <?php
                                            $akun[$i]['saldo'] = ($akun[$i - 1]['saldo']) + ($akun[$i]['setoran']) - ($akun[$i]['tarikan']);
                                            $saldoT = $konverter->rupiah02($akun[$i]['saldo']);
                                            echo $saldoT;
                                            ?>
                                        </td>
                                    <?php elseif ($akun[$i == 0]) : ?>
                                        <td>
                                            <?php $saldoA = $konverter->des4($akun[0]['saldo']);
                                            $saldoNya = $konverter->rupiah02($saldoA);
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                    <td><?= $akun[$i]['keterangan']; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php foreach ($akun as $akun) {
            } ?>
            <a href="<?= base_url('/akun/' . $akun['id'] . '/edit'); ?>" class="btn btn-warning mt-3 mx-3"><i class="fa fa-pencil"></i> Edit</a>
            <form action="<?= base_url('/akun/' . $akun['id']); ?>" method="POST" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?');"><i class="fa fa-trash"></i> Hapus</button>
            </form>
            <a href="<?= base_url('/transaksi/create/' . $akun['id']); ?>" class="btn btn-outline-success mt-3 mx-3"><i class="fa fa-money"></i> Tambah Transaksi</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>