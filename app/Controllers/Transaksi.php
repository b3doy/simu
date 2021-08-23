<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use CodeIgniter\HTTP\Request;
use Config\Services;

class Transaksi extends BaseController
{
    protected $akunModel;
    protected $konsumenModel;
    protected $konverter;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->konsumenModel = new KonsumenModel();
        $this->konverter = new Konverter();
    }


    public function create($id)
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'validation' => Services::validation(),
            'akun' => $this->akunModel->getCreateAkun($id),
            'konsumen' => $this->konsumenModel->getKonsumen($id),
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
            'simpan' => $this->konverter->des3($this->request->getVar('simpan')),
            'ambil' => $this->konverter->des3($this->request->getVar('ambil')),
            'saldo' => $this->konverter->des3($this->request->getVar('saldo')),
            'sisa_os' => $this->konverter->des3($this->request->getVar('sisa_os')),
            'angsuran_ke' => $this->request->getVar('angsuran_ke'),
            'keterangan' => $this->request->getVar('keterangan'),
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
}
?>