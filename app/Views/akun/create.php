<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h2>Form Pembuatan Akun Konsumen</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/konsumen/' . $konsumen['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <!-- FORM BUKA AKUN -->
            <form action="<?= base_url('/akun/save'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="no_akun" class="form-label">No Akun</label>
                    <input type="text" class="form-control" id="no_akun" name="no_akun" value="<?= $konsumen['no_mitra']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="<?= $konsumen['nama_konsumen']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $konsumen['telpon']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="datetime" style="display: none;" class="form-control" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date('Y/m/d H:i:s'); ?>" readonly>
                    <input type="datetime" class="form-control" id="tgl" name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo date('d/m/Y', strtotime(date('Y/m/d'))); ?>" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control angka3" id="os01" name="os01" value="<?= $konverter->rupiah02($konsumen['os']); ?>" readonly>
                    <input type="hidden" class="form-control angka3 <?= ($validation->hasError('sisa_os')) ? 'is-invalid' : ''; ?>" id="sisa_os" name="sisa_os" value="<?= $konsumen['os']; ?>" onkeyup="htgOs()" onkeydown="isiKeterangan()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sisa_os'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
                <input type="hidden" name="konsumen_id" value="<?= $konsumen['id']; ?>">
                <input type="hidden" name="status_akun" value="Akun Sudah Dibuat">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
            </form>
            <!-- END FORM -->
        </div>
    </div>
</div>


<script>
    function hitungAmbil() {
        var rp = "Rp. "
        var simpan = document.getElementById('simpan').value
        var simpan1 = simpan.split('Rp.').join('').split('.').join('')

        var dp = document.getElementById('dp').value
        var dp1 = dp.split('Rp.').join('').split('.').join('')

        var bayar1 = parseInt(simpan1) - parseInt(dp1)

        var angs = document.getElementById('angsuran').value
        var angs1 = angs.split('Rp.').join('').split('.').join('')

        var dpAngsuran = rp + (parseInt(dp1) + parseInt(angs1)) + ',00'
        var dpAngsuran1 = dpAngsuran.split('Rp.').join('').split('.').join('')

        if (simpan1 >= dpAngsuran1) {
            document.getElementById('ambil').value = dpAngsuran
        } else {
            document.getElementById('ambil').value = 0
        }

        var ambil = document.getElementById("ambil").value
        var ambil1 = ambil.split("Rp.").join("").split(".").join("")

        var htgSaldo = (parseInt(simpan1) - parseInt(ambil1))
        document.getElementById('saldo').value = rp + (desimal(htgSaldo)) + (",00")

        var os01 = document.getElementById('os01').value
        var os = os01.split("Rp.").join("").split(".").join("")

        var hitOs = parseInt(os) - parseInt(bayar1)
        var sisaOs = document.getElementById('sisa_os').value = rp + (desimal(hitOs)) + (",00")

        var hasil = document.getElementById('test').value = hitOs

        if (parseInt(os) - parseInt(bayar1) == hitOs) {
            document.getElementById('angsuran_ke').value = '1'
        } else {
            document.getElementById('angsuran_ke').value = ' '
        }

        if (simpan1 > angs1) {
            document.getElementById('keterangan').value = 'DP + Angsuran Ke-1'
        } else if (simpan1 == angs1) {
            document.getElementById('keterangan').value = 'Angsuran Ke-1'
        }
    }
</script>

<?= $this->endSection(); ?>