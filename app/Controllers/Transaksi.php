<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\PegawaiModel;
use Config\Services;

class Transaksi extends BaseController
{
    protected $akunModel;
    protected $konsumenModel;
    protected $konverter;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->konsumenModel = new KonsumenModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->konverter = new Konverter();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Data Transaksi',
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'akun' => $this->akunModel->getIndexAkun($id),
            'konverter' => $this->konverter
        ];
        return view('transaksi/index', $data);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'validation' => Services::validation(),
            'akun' => $this->akunModel->getCreateAkun($id),
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'pegawai' => $this->pegawaiModel->getCollector(),
            'konverter' => $this->konverter
        ];

        return view('transaksi/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'simpan' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],

        ])) {
            $validation = Services::validation();
            return redirect()->to(base_url('transaksi/create'))->withInput()->with('validation', $validation);
        }


        $sql = $this->akunModel->save([
            'no_akun' => $this->request->getVar('no_akun'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'telpon' => $this->request->getVar('telpon'),
            'tanggal' => $this->request->getVar('tanggal'),
            'no_ba' => $this->request->getVar('no_ba'),
            'simpan' => $this->konverter->des($this->request->getVar('simpan')),
            'ambil' => $this->konverter->des($this->request->getVar('ambil')),
            'saldo' => $this->konverter->des($this->request->getVar('saldo')),
            'sisa_os' => $this->konverter->des($this->request->getVar('sisa_os')),
            'angsuran_ke' => $this->request->getVar('angsuran_ke'),
            'collector' => $this->request->getVar('collector'),
            'keterangan' => $this->request->getVar('keterangan'),
            'user_input' => $this->request->getVar('user_input'),
            'konsumen_id' => $this->request->getVar('konsumen_id')
        ]);

        if ($sql) {
?>
            <script>
                alert('Data Berhasil Ditambahkan.');
                window.location.href = "<?= base_url('/konsumen') ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data!.');
                window.location.href = "<?= base_url('/transaksi') ?>";
            </script>
        <?php
        }
    }

    public function kembali()
    {
        ?>
        <script>
            alert('Data Akun Tersebut Belum Ada, Silahkan Buat Akun Terlebih Dahulu!');
            window.location.href = "<?= base_url('/konsumen'); ?>"
        </script>
        <?php
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Transaksi',
            'akun' => $this->akunModel->getAkun($id),
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'pegawai' => $this->pegawaiModel->getCollector(),
            'konverter' => $this->konverter
        ];
        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $akun = $this->akunModel->getAkun($id);
        $sql = $this->akunModel->save([
            'id' => $id,
            'no_akun' => $this->request->getVar('no_akun'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'telpon' => $this->request->getVar('telpon'),
            'tanggal' => $this->request->getVar('tanggal'),
            'no_ba' => $this->request->getVar('no_ba'),
            'simpan' => $this->konverter->des($this->request->getVar('simpan')),
            'ambil' => $this->konverter->des($this->request->getVar('ambil')),
            'saldo' => $this->konverter->des($this->request->getVar('saldo')),
            'sisa_os' => $this->konverter->des($this->request->getVar('sisa_os')),
            'angsuran_ke' => $this->request->getVar('angsuran_ke'),
            'collector' => $this->request->getVar('collector'),
            'keterangan' => $this->request->getVar('keterangan'),
            'user_input' => $this->request->getVar('user_input'),
            'konsumen_id' => $this->request->getVar('konsumen_id')
        ]);

        if ($sql) {
        ?>
            <script>
                alert('Data Berhasil Diubah.');
                window.location.href = "<?= base_url('/transaksi/index/' . $akun['konsumen_id']) ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Mengubah Data!.');
                window.location.href = "<?= base_url('/transaksi/index/' . $akun['konsumen_id']) ?>";
            </script>
<?php
        }
    }
}
?>