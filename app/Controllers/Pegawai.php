<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\KonsumenModel;
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

    public function detail($id)
    {
        $data = [
            'title'     => 'Data Konsumen Per Pegawai',
            'pegawai'   => $this->pegawaiModel->getPegawai($id),
            'konsumen'  => $this->konsumenModel->getKonsumen()
        ];
        return view('pegawai/detail', $data);
    }

    public function konsumenpegawaitable()
    {
        date_default_timezone_set('GMT');
        $id_pegawai = $this->request->getVar('id_pegawai');
        $list = $this->pegawaiModel->getKonsumenPegawai($id_pegawai);
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->no_mitra;
            $row[] = $list->nama_konsumen;
            if ($list->tanggal_angsuran2 != 0) {
                $row[] = $list->tanggal_angsuran2[8] . $list->tanggal_angsuran2[9];
            } else {
                $row[] = $list->tanggal_angsuran1[8] . $list->tanggal_angsuran1[9];
            }
            $row[] = $this->konverter->rupiah02($list->angsuran);
            $row[] = $list->surveyor;
            $row[] = date('H:i:s', strtotime($list->tanggal_akun) - strtotime($list->tanggal_input));

            $data[] = $row;
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function surveyor($id)
    {
        $data = [
            'title'         => 'Surveyor || Mitra Bersama ZE',
            'pegawai'       => $this->pegawaiModel->getPegawai($id),
            'konsumen'      => $this->konsumenModel->getKonsumen(),
        ];
        return view('pegawai/surveyor', $data);
    }

    public function tabelSurveyor()
    {
        $id_pegawai = $this->request->getVar('id_pegawai');
        $list = $this->pegawaiModel->getkonsumenSurveyor($id_pegawai);
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d-M-Y', strtotime($list->tanggal_input));
            $row[] = $list->no_mitra;
            $row[] = $list->nama_konsumen;
            $row[] = $list->marketing;
            $row[] = $list->status_approval;

            $data[] = $row;
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function surveyorKonsumen($id_pegawai, $id)
    {
        $data = [
            'title'     => 'Data Konsumen || Surveyor',
            'akun'      => $this->akunModel->getTrx($id),
            'pegawai'   => $this->pegawaiModel->getPegawai($id_pegawai)
        ];
        return view('pegawai/surveyorkonsumen', $data);
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
