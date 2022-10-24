<?php
echo $this->extend('layout/template');
echo $this->section('content');
foreach ($konsumen as $konsumen) {
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Data Transaksi</h1>
            <table class="table table-sm table-hover table-bordered mt-4" id="transaksiTable">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akun / Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Simpan</th>
                        <th scope="col">Ambil</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Sisa Os</th>
                        <th scope="col">Ke - </th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php $no = 1;
                    foreach ($akun as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['no_akun']; ?></td>
                            <td><?= $akun['nama_konsumen']; ?></td>
                            <td><?= date('d-M-Y', strtotime($akun['tanggal'])); ?></td>
                            <td><?= $konverter->rupiah02($akun['simpan']); ?></td>
                            <td><?= $konverter->rupiah02($akun['ambil']); ?></td>
                            <td><?= $konverter->rupiah02($akun['saldo']); ?></td>
                            <td><?= $konverter->rupiah02($akun['sisa_os']); ?></td>
                            <td><?= $akun['angsuran_ke']; ?></td>
                            <td><?= $akun['keterangan']; ?></td>
                            <td><button class="badge badge-warning"><a href="<?= base_url('/transaksi/edit/' . $akun['id']); ?>"><i class="fa fa-pencil"></i> Edit</a></button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>