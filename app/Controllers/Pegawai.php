<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\KonsumenModel;
use Config\Services;
use App\Libraries\Konverter;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    protected $akunModel;
    protected $konsumenModel;
    protected $konverter;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->akunModel = new AkunModel();
        $this->konsumenModel = new KonsumenModel();
        $this->konverter = new Konverter();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pegawai || mitra bersama Ze',
            'pegawai' => $this->pegawaiModel->getPegawai(),
        ];
        return view('pegawai/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pegawai',
            'pegawai' => $this->pegawaiModel->getPegawai()
        ];
        return view('pegawai/create', $data);
    }

    public function save()
    {
        $sql = $this->pegawaiModel->save([
            'nip' => $this->request->getVar('nip'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jabatan' => $this->request->getVar('jabatan'),
            'telpon' => $this->request->getVar('telpon'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        if ($sql) {
?>
            <script>
                alert('Data Pegawai Baru Berhasil Ditambahkan')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data Pegawai Baru!')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
        <?php
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pegawai',
            'pegawai' => $this->pegawaiModel->getPegawai($id)
        ];
        return view('pegawai/edit', $data);
    }

    public function update($id)
    {
        $sql = $this->pegawaiModel->save([
            'id' => $id,
            'nip' => $this->request->getVar('nip'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jabatan' => $this->request->getVar('jabatan'),
            'telpon' => $this->request->getVar('telpon'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        if ($sql) {
        ?>
            <script>
                alert('Data Pegawai Berhasil Diupdate')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Update Data Pegawai!')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
        <?php
        }
    }

    public function delete($id)
    {
        $sql = $this->pegawaiModel->delete($id);
        if ($sql) {
        ?>
            <script>
                alert('Data Pegawai Berhasil Dihapus')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menghapus Data Pegawai!')
                window.location.href = "<?= base_url('/pegawai'); ?>"
            </script>
<?php
        }
    }
}
