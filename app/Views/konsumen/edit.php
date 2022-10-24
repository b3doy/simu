<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>Form Edit Data Konsumen</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/konsumen/' . $konsumen['id']); ?>" class="btn btn-secondary" role="button"><i class="fa fa-undo"></i> Batal</a>
                </div>
            </div>
            <form action="<?= base_url('/konsumen/update/' . $konsumen['id']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $konsumen['id']; ?>">
                <div class="mb-3">
                    <label for="no_mitra" class="form-label">No Mitra</label>
                    <input type="text" class="form-control" id="no_mitra" name="no_mitra" value="<?= $konsumen['no_mitra']; ?>">
                </div>
                <div class="row backKonsumen">
                    <label class="form-label font-weight-bold">Konsumen</label>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_konsumen')) ? 'is-invalid' : ''; ?>" id="nama_konsumen" name="nama_konsumen" value="<?= (old('nama_konsumen')) ? old('nama_konsumen') : $konsumen['nama_konsumen']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_konsumen'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_panggilan')) ? 'is-invalid' : ''; ?>" id="nama_panggilan" name="nama_panggilan" value="<?= (old('nama_panggilan')) ? old('nama_panggilan') : $konsumen['nama_panggilan']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_panggilan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">No KTP</label>
                            <input type="number" class="form-control <?= ($validation->hasError('no_ktp')) ? 'is-invalid' : ''; ?>" id="no_ktp" name="no_ktp" value="<?= (old('no_ktp')) ? old('no_ktp') : $konsumen['no_ktp']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('no_ktp'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : $konsumen['tgl_lahir']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tgl_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= $konsumen['pekerjaan']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('pekerjaan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">No Kartu Keluarga</label>
                            <input type="number" class="form-control <?= ($validation->hasError('no_kk')) ? 'is-invalid' : ''; ?>" id="no_kk" name="no_kk" value="<?= (old('no_kk')) ? old('no_kk') : $konsumen['no_kk']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('no_kk'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="ibu_kandung" class="form-label">Nama Ibu Kandung</label>
                            <input type="text" class="form-control <?= ($validation->hasError('ibu_kandung')) ? 'is-invalid' : ''; ?>" id="ibu_kandung" name="ibu_kandung" value="<?= (old('ibu_kandung')) ? old('ibu_kandung') : $konsumen['ibu_kandung']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('ibu_kandung'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="telpon" class="form-label">No Telpon</label>
                            <input type="text" class="form-control <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= (old('telpon')) ? old('telpon') : $konsumen['telpon']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('telpon'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Sesuai KTP</label>
                            <textarea name="alamat" id="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"><?= (old('alamat')) ? old('alamat') : $konsumen['alamat']; ?></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="status_nikah" class="form-label">Status Pernikahan</label>
                            <select name="status_nikah" id="status_nikah" class="form-control" onchange="if(this.selectedIndex==1){
                                document.getElementById('backPasangan').style.display = 'block'
                                } else if(this.selectedIndex==2){
                                    document.getElementById('backPasangan').style.display = 'none'
                                }">
                                <option value="">----- Pilih Status Pernikahan -----</option>
                                <option value="<?= $konsumen['status_nikah']; ?>" selected><?= $konsumen['status_nikah']; ?></option>
                                <option value=" Menikah">Menikah</option>
                                <option value="Belum Menikah">Lajang</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('status_nikah'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row backPasangan">
                    <label class="form-label font-weight-bold">Pasangan</label>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nama_pasangan" class="form-label">Nama Pasangan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_pasangan')) ? 'is-invalid' : ''; ?>" id="nama_pasangan" name="nama_pasangan" value="<?= (old('nama_pasangan')) ? old('nama_pasangan') : $konsumen['nama_pasangan']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_pasangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="ktp_pasangan" class="form-label">No KTP Pasangan</label>
                            <input type="number" class="form-control <?= ($validation->hasError('ktp_pasangan')) ? 'is-invalid' : ''; ?>" id="ktp_pasangan" name="ktp_pasangan" value="<?= (old('ktp_pasangan')) ? old('ktp_pasangan') : $konsumen['ktp_pasangan']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('ktp_pasangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tgl_lahir_pasangan" class="form-label">Tanggal Lahir Pasangan</label>
                            <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir_pasangan')) ? 'is-invalid' : ''; ?>" id="tgl_lahir_pasangan" name="tgl_lahir_pasangan" value="<?= (old('tgl_lahir_pasangan')) ? old('tgl_lahir_pasangan') : $konsumen['tgl_lahir_pasangan']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tgl_lahir_pasangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="alamat_ktp_pasangan" class="form-label">Alamat Sesuai KTP Pasangan</label>
                            <textarea name="alamat_ktp_pasangan" id="alamat_ktp_pasangan" class="form-control <?= ($validation->hasError('alamat_ktp_pasangan')) ? 'is-invalid' : ''; ?>"><?= (old('alamat_ktp_pasangan')) ? old('alamat_ktp_pasangan') : $konsumen['alamat_ktp_pasangan']; ?></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat_ktp_pasangan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="domisili" class="form-label">Alamat Domisili</label>
                    <textarea name="domisili" id="domisili" class="form-control <?= ($validation->hasError('domisili')) ? 'is-invalid' : ''; ?>"><?= $konsumen['domisili']; ?></textarea>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('domisili'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dp" class="form-label">Down Payment (DP)</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('dp')) ? 'is-invalid' : ''; ?>" id="dp" name="dp" value="<?= old('dp') ? old('dp') : $konverter->rupiah02($konsumen['dp']); ?>" onkeyup="hitungOs()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('dp'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="angsuran" class="form-label">Angsuran</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('angsuran')) ? 'is-invalid' : ''; ?>" id="angsuran" name="angsuran" value="<?= old('angsuran') ? old('angsuran') : $konverter->rupiah02($konsumen['angsuran']); ?>" onkeyup="hitungOs()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('angsuran'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tenor" class="form-label">Tenor / Jangka Waktu</label>
                    <div class="row">
                        <div class="col-4">
                            <input type="number" class="form-control <?= ($validation->hasError('tenor')) ? 'is-invalid' : ''; ?>" id="tenor" name="tenor" value="<?= old('tenor') ? old('tenor') : $konsumen['tenor']; ?>" onkeyup="hitungOs()" onkeydown="jatuhTempo()">
                        </div>
                        <div class="col-2" style="margin-left: -30px;">
                            <input type="text" class="form-control" value="Bulan" disabled>
                        </div>
                    </div>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tenor'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="os" class="form-label">Outstanding / OS</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('os')) ? 'is-invalid' : ''; ?>" id="os" name="os" value="<?= old('os') ? old('os') : $konverter->rupiah02($konsumen['os']); ?>" onkeyup="hitungOs()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('os'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="total_penjualan" class="form-label">Total Penjualan</label>
                    <input type="text" class="form-control angka3 <?= ($validation->hasError('total_penjualan')) ? 'is-invalid' : ''; ?>" id="total_penjualan" name="total_penjualan" value="<?= old('total_penjualan') ? old('total_penjualan') : $konverter->rupiah02($konsumen['total_penjualan']); ?>" onkeyup="hitungtotal_penjualan()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('total_penjualan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_datang" class="form-label">Tanggal Datang Barang</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_datang')) ? 'is-invalid' : ''; ?>" id="tanggal_datang" name="tanggal_datang" value="<?= old('tanggal_datang') ? old('tanggal_datang') : $konsumen['tanggal_datang']; ?>" onkeyup="skemaPembayaran()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal_datang'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_angsuran1" class="form-label">Tanggal Angsuran Pertama</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_angsuran1')) ? 'is-invalid' : ''; ?>" id="tanggal_angsuran1" name="tanggal_angsuran1" value="<?= old('tanggal_angsuran1') ? old('tanggal_angsuran1') : $konsumen['tanggal_angsuran1']; ?>" onkeyup="jatuhTempo()" onkeydown="skemaPembayaran()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal_angsuran1'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_angsuran2" class="form-label">Tanggal Angsuran Berikutnya</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_angsuran2')) ? 'is-invalid' : ''; ?>" id="tanggal_angsuran2" name="tanggal_angsuran2" value="<?= old('tanggal_angsuran2') ? old('tanggal_angsuran2') : $konsumen['tanggal_angsuran2']; ?>" onkeyup="jatuhTempo()" onkeydown="skemaPembayaran()">
                    <small style="color: red; font-size:11px">Diisi dengan tanggal angsuran ke-2 </small>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal_angsuran2'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_jt" class="form-label">Tanggal Jatuh Tempo</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_jt')) ? 'is-invalid' : ''; ?>" id="tanggal_jt" name="tanggal_jt" value="<?= old('tanggal_jt') ? old('tanggal_jt') : $konsumen['tanggal_jt']; ?>" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal_jt'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="skema" class="form-label">Skema Pembayaran</label>
                    <input type="text" class="form-control" name="skema" id="skema" on="skema()" value="<?= $konsumen['skema']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="marketing" class="form-label">Marketing</label>
                    <select name="marketing" id="marketing" class="form-control">
                        <option value="<?= old('marketing') ? old('marketing') : $konsumen['marketing']; ?>" selected><?= old('marketing') ? old('marketing') : $konsumen['marketing']; ?></option>
                        <option value="">----- Pilih Nama Marketing -----</option>
                        <?php foreach ($pegawai as $pegawai) : ?>
                            <option value="<?= $pegawai['nama_pegawai']; ?>"><?= $pegawai['nama_pegawai']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="surveyor" class="form-label">Surveyor</label>
                    <select name="surveyor" id="surveyor" class="form-control">
                        <option value="<?= old('surveyor') ? old('surveyor') : $konsumen['surveyor']; ?>" selected><?= old('surveyor') ? old('surveyor') : $konsumen['surveyor']; ?></option>
                        <option value="">----- Pilih Nama Surveyor -----</option>
                        <?php foreach ($pegawai1 as $pegawai1) : ?>
                            <option value="<?= $pegawai1['nama_pegawai']; ?>"><?= $pegawai1['nama_pegawai']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_approval" class="form-label">Status Approval</label>
                    <select name="status_approval" id="status_approval" class="form-control" style="background-color: aquamarine;">
                        <option value="<?= old('status_approval') ? old('status_approval') : $konsumen['status_approval']; ?>" selected><?= old('status_approval') ? old('status_approval') : $konsumen['status_approval']; ?></option>
                        <option value="">----- Pilih Status Approval -----</option>
                        <option value="Sedang Proses">Sedang Proses</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Approved">Approved</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_survey" class="form-label">Deskripsi Surveyor</label>
                    <textarea name="deskripsi_survey" id="deskripsi_survey" class="form-control <?= ($validation->hasError('deskripsi_survey')) ? 'is-invalid' : ''; ?>" readonly><?= $konsumen['deskripsi_survey']; ?></textarea>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('deskripsi_survey'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_unit" class="form-label">Deskripsi Kepala Unit</label>
                    <textarea name="deskripsi_unit" id="deskripsi_unit" class="form-control <?= ($validation->hasError('deskripsi_unit')) ? 'is-invalid' : ''; ?>"><?= $konsumen['deskripsi_unit']; ?></textarea>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('deskripsi_unit'); ?>
                    </div>
                </div>
                <input type="hidden" name="waktu_update_surveyor" value="<?= $konsumen['waktu_update_surveyor'] ?>">
                <input type="hidden" name="user_input" value="<?= user()->username; ?>">
                <hr>
                <h5 class="fw-bold"><u>BARANG</u></h5>
                <div class="mb-3">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <select name="jumlah_barang" id="jumlah_barang" class="form-control" onchange="if(this.selectedIndex==1){
                       document.getElementById('tampil_barang1').style.display = 'block'
                        document.getElementById('tampil_barang2').style.display = 'none'
                        document.getElementById('tampil_barang3').style.display = 'none'                        
                        document.getElementById('lebih_dari_3').style.display = 'none'                        
                        } else if (this.selectedIndex==2){
                            document.getElementById('tampil_barang1').style.display = 'block'
                            document.getElementById('tampil_barang2').style.display = 'block'
                            document.getElementById('tampil_barang3').style.display = 'none'
                            document.getElementById('lebih_dari_3').style.display = 'none'
                        } else if (this.selectedIndex==3){
                            document.getElementById('tampil_barang1').style.display = 'block'
                            document.getElementById('tampil_barang2').style.display = 'block'
                            document.getElementById('tampil_barang3').style.display = 'block'
                            document.getElementById('lebih_dari_3').style.display = 'none'
                        } else {
                            document.getElementById('tampil_barang1').style.display = 'none'
                            document.getElementById('tampil_barang2').style.display = 'none'
                            document.getElementById('tampil_barang3').style.display = 'none' 
                            document.getElementById('lebih_dari_3').style.display = 'block'
                        }">
                        <option value="">--- Pilih Jumlah Barang ---</option>
                        <option value="<?= $konsumen['jumlah_barang']; ?>" selected><?= $konsumen['jumlah_barang']; ?></option>
                        <option value="1">1 (Satu)</option>
                        <option value="1">2 (Dua)</option>
                        <option value="1">3 (Tiga)</option>
                        <option value="lebih_dari_3">Lebih Dari 3</option>
                    </select>
                </div>
                <div id="tampil_barang1" style="display:none; border:solid grey 1px; padding:10px" class="mb-3">
                    <div class="mb-3">
                        <label for="nama_barang1" class="form-label">Nama Barang 1</label>
                        <input type="text" id="nama_barang1" name="nama_barang1" class="form-control" value="<?= $konsumen['nama_barang1']; ?>">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="merk_barang1">Merk</label>
                                <input type="text" id="merk_barang1" name="merk_barang1" class="form-control" value="<?= $konsumen['merk_barang1']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="tipe_barang1">Tipe</label>
                                <input type="text" id="tipe_barang1" name="tipe_barang1" class="form-control" value="<?= $konsumen['tipe_barang1']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="warna_barang1">Warna</label>
                                <input type="text" id="warna_barang1" name="warna_barang1" class="form-control" value="<?= $konsumen['warna_barang1']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="imei1">No Rangka / IMEI</label>
                                <input type="text" id="imei1" name="imei1" class="form-control" value="<?= $konsumen['imei1']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- barang2 -->
                <div id="tampil_barang2" style="display:none; border:solid grey 1px; padding:10px" class="mb-3">
                    <div class=" mb-3">
                        <label for="nama_barang2" class="form-label">Nama Barang 2</label>
                        <input type="text" id="nama_barang2" name="nama_barang2" class="form-control" value="<?= $konsumen['nama_barang2']; ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="merk_barang2">Merk</label>
                            <input type="text" id="merk_barang2" name="merk_barang2" class="form-control" value="<?= $konsumen['merk_barang2']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="tipe_barang2">Tipe</label>
                            <input type="text" id="tipe_barang2" name="tipe_barang2" class="form-control" value="<?= $konsumen['tipe_barang2']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="warna_barang2">Warna</label>
                            <input type="text" id="warna_barang2" name="warna_barang2" class="form-control" value="<?= $konsumen['warna_barang2']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="imei2">No Rangka / IMEI</label>
                            <input type="text" id="imei2" name="imei2" class="form-control" value="<?= $konsumen['imei2']; ?>">
                        </div>
                    </div>
                </div>
                <!-- barang 3 -->
                <div id="tampil_barang3" style="display:none; border:solid grey 1px; padding:10px" class="mb-3">
                    <div class="mb-3">
                        <label for="nama_barang3" class="form-label">Nama Barang 3</label>
                        <input type="text" id="nama_barang3" name="nama_barang3" class="form-control" value="<?= $konsumen['nama_barang3']; ?>">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="merk_barang3">Merk</label>
                                    <input type="text" id="merk_barang3" name="merk_barang3" class="form-control" value="<?= $konsumen['merk_barang3']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipe_barang3">Tipe</label>
                                    <input type="text" id="tipe_barang3" name="tipe_barang3" class="form-control" value="<?= $konsumen['tipe_barang3']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="warna_barang3">Warna</label>
                                    <input type="text" id="warna_barang3" name="warna_barang3" class="form-control" value="<?= $konsumen['warna_barang3']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="imei3">No Rangka / IMEI</label>
                                    <input type="text" id="imei3" name="imei3" class="form-control" value="<?= $konsumen['imei3']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- barang lebih banyak dari 3 -->
                <div id="lebih_dari_3" style="display:none; border:solid grey 1px; padding:10px" class="mb-3">
                    <div class="mb-3">
                        <label for="nama_barang4">Nama Barang</label>
                        <input type="text" id="nama_barang4" name="nama_barang4" class="form-control" value="<?= $konsumen['nama_barang4']; ?>">
                        <div class="mb-3">
                            <label for="deskripsi_barang4">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang4" id="deskripsi_barang4" class="form-control"><?= $konsumen['deskripsi_barang4']; ?></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    function hitungOs() {
        var rp = "Rp. "
        var angsuran = document.getElementById('angsuran').value
        var angsuran1 = angsuran.split("Rp.").join("").split(".").join("")

        var dp00 = document.getElementById('dp').value
        var dp = dp00.split("Rp.").join("").split(".").join("")

        var tenor = document.getElementById('tenor').value

        var os = parseInt(angsuran1) * parseInt(tenor)

        document.getElementById('os').value = rp.concat(desimal(os)).concat(",00")

        var totalPenjualan = parseInt(os) + parseInt(dp)
        document.getElementById('total_penjualan').value = rp + (desimal(totalPenjualan)) + ",00"
    }

    function skemaPembayaran() {
        var tglDatang = document.getElementById('tanggal_datang').value
        var tglDtg = tglDatang.split('-').join('').split('T').join('').split(':').join('')
        var tglDtg1 = tglDtg[4].concat(tglDtg[5])

        var tglAngsuran1 = document.getElementById('tanggal_angsuran1').value
        var tglAngs = tglAngsuran1.split('-').join('').split('T').join('').split(':').join('')
        var tglAngs1 = tglAngs[4].concat(tglAngs[5])

        if (tglDtg1 == tglAngs1) {
            document.getElementById('skema').value = 'Skema 1'
        } else {
            document.getElementById('skema').value = 'Skema 2'
        }
    }

    function jatuhTempo() {
        var jangkaWaktu = document.getElementById('tenor').value
        var jw2 = jangkaWaktu - 2
        var tglAngsuran2 = document.getElementById('tanggal_angsuran2').value
        tglAngsur = new Date($('#tanggal_angsuran2').val())
        tglJt = new Date(tglAngsur.setMonth(tglAngsur.getMonth() + parseFloat(jw2))).toISOString().split('.')
        tglJt1 = tglJt[0].split('T')
        $('#tanggal_jt').val(tglJt1[0])
    }
</script>

<?= $this->endSection(); ?>