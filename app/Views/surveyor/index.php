<?php
echo $this->extend('layout/template');
echo $this->section('content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Surveyor</h1>
            <table class="table table-hover hurufKecil" id="konsumenTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($surveyor as $surveyor) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $surveyor['nip']; ?></td>
                            <td>
                                <a href="<?= base_url('pegawai/surveyor/' . $surveyor['id']); ?>" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Data Konsumen yang di Survey"><?= $surveyor['nama_pegawai']; ?></a>
                            </td>
                            <td><?= $surveyor['telpon']; ?></td>
                            <td><?= $surveyor['alamat']; ?></td>
                            <td>
                                <a class="badge badge-info text-dark" href="<?= base_url('/surveyor/sla/' . $surveyor['id']); ?>"><i class="fa fa-pencil text-dark"></i> SLA</a> |
                                <a class="badge badge-primary" href="<?= base_url('/surveyor/fpd/' . $surveyor['id']); ?>"><i class="fa fa-pencil"></i> FPD</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>