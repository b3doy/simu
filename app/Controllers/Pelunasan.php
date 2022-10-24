<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\PegawaiModel;
use Config\Services;

class Pelunasan extends BaseController
{
    protected $akunModel, $konsumenModel, $pegawaiModel,
        $konverter;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->konsumenModel = new KonsumenModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->konverter = new Konverter;
    }

    public function index($id)
    {
        $data = [
            'title'     => 'Pelunasan Dipercepat',
            'validation' => Services::validation(),
            'akun' => $this->akunModel->getCreateAkun($id),
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'pegawai' => $this->pegawaiModel->getCollector(),
            'konverter' => $this->konverter
        ];
        return view('pelunasan/index', $data);
    }

    public function save()
    {
        $sql = $this->akunModel->save([
            'no_akun' => $this->request->getVar('no_akun'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'tanggal' => $this->request->getVar('tanggal'),
            'no_ba' => $this->request->getVar('no_ba'),
            'diskon' => $this->konverter->des($this->request->getVar('diskon')),
            'simpan' => $this->konverter->des($this->request->getVar('simpan')),
            'ambil' => $this->konverter->des($this->request->getVar('ambil')),
            'saldo' => $this->konverter->des($this->request->getVar('saldo')),
            'sisa_os' => $this->konverter->des($this->request->getVar('sisa_os')),
            'collector' => $this->request->getVar('collector'),
            'keterangan' => $this->request->getVar('keterangan'),
            'user_input' => $this->request->getVar('user_input'),
            'konsumen_id' => $this->request->getVar('konsumen_id')
        ]);

        if ($sql) {
?>
            <script>
                alert('Data Pelunasan Berhasil Disimpan');
                window.location.href = "<?= base_url('/konsumen') ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menyimpan Data Pelunasan!.');
                window.location.href = "<?= base_url('/pelunasan') ?>";
            </script>
<?php
        }
    }
}
