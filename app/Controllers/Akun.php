<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\KonsumenModel;
use Config\Services;
use App\Libraries\Konverter;

class Akun extends BaseController
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

    public function index()
    {
        $data = [
            'title' => "Data Akun",
            'akun' => $this->akunModel->getAkun(),
        ];

        return view('akun/index', $data);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Buat Akun',
            'validation' => Services::validation(),
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'konverter' => $this->konverter,
        ];

        return view('akun/create', $data);
    }

    public function save()
    {
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
            session()->setFlashData('pesanBerhasil', 'Akun Baru Berhasil Dibuat.');
            return redirect()->to(base_url('/konsumen'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Membuat Akun Baru!');
            return redirect()->to(base_url('/konsumen'));
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Akun',
            'akun' => $this->akunModel->getTrx($id),
            'konverter' => $this->konverter,
            'konsumen' => $this->konsumenModel->getKonsumen($id)
        ];
        return view('akun/detail', $data);
    }

    public function kembali()
    {
?>
        <script>
            alert('Data Akun Sudah Ada!');
            window.location.href = "<?= base_url('/konsumen'); ?>"
        </script>
    <?php
    }

    public function batal()
    {
    ?>
        <script>
            alert('Data Akun Tersebut Belum Ada, Silahkan Buat Akun Terlebih Dahulu!');
            window.location.href = "<?= base_url('/konsumen'); ?>"
        </script>
<?php
    }

    public function delete($id)
    {
        $sql = $this->akunModel->setDeleteAkun($id);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Akun Konsumen Berhasil Dihapus.');
            return redirect()->to(base_url('/konsumen'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menghapus Akun Konsumen Baru.');
            return redirect()->to(base_url('/konsumen'));
        }
    }

    public function show($id)
    {
        $data = [
            'title' => 'Riwayat Pembayaran',
            'akun' => $this->akunModel->getTrx($id),
            'konverter' => $this->konverter,
            'konsumen' => $this->konsumenModel->getKonsumen($id)
        ];
        return view('akun/riwayat', $data);
    }
}
