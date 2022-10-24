<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\PegawaiModel;
use App\Models\SlipgajiModel;

class SlipGaji extends BaseController
{
    protected $pegawaiModel;
    protected $slipgajiModel;
    protected $konverter;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->slipgajiModel = new SlipgajiModel();
        $this->konverter = new Konverter;
    }

    public function index($id)
    {
        $data = [
            'title'     => 'Slip Gaji Pegawai',
            'slip'      => $this->slipgajiModel->getSlipgaji($id),
            'pegawai'   => $this->pegawaiModel->getPegawai($id)
        ];
        return view('slipgaji/index', $data);
    }

    public function create($id)
    {
        $data = [
            'title'     => 'Creata Data Slip Gaji',
            'slip'      => $this->slipgajiModel->getSlipgaji($id),
            'pegawai'   => $this->pegawaiModel->getPegawai($id)
        ];
        return view('slipgaji/create', $data);
    }

    public function save()
    {
        $sql = $this->slipgajiModel->save([
            'nip'                   => $this->request->getVar('nip'),
            'nama_pegawai'          => $this->request->getVar('nama_pegawai'),
            'jabatan'               => $this->request->getVar('jabatan'),
            'tgl_gabung'            => $this->request->getVar('tgl_gabung'),
            'tgl_gajian'            => $this->request->getVar('tgl_gajian'),
            'gaji_pokok'            => $this->konverter->des($this->request->getVar('gaji_pokok')),
            'tunjangan_jabatan'     => $this->konverter->des($this->request->getVar('tunjangan_jabatan')),
            'jml_kunjungan'         => $this->request->getVar('jml_kunjungan'),
            'uang_bensin'           => $this->konverter->des($this->request->getVar('uang_bensin')),
            'ganti_oli'             => $this->konverter->des($this->request->getVar('ganti_oli')),
            'total_diterima'        => $this->konverter->des($this->request->getVar('total_diterima')),
            'kasbon'                => $this->konverter->des($this->request->getVar('kasbon')),
            'total_dibawa_pulang'   => $this->konverter->des($this->request->getVar('total_dibawa_pulang')),
            'pegawai_id'            => $this->request->getVar('pegawai_id')
        ]);

        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Slip Gaji Berhasil Disimpan.');
            return redirect()->to(base_url('/slipGaji/index/' . $this->request->getVar('pegawai_id')));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan Data Slip Gaji!');
            return redirect()->to(base_url('/slipGaji/index/' . $this->request->getVar('pegawai_id')));
        }
    }

    public function cetak($id)
    {
        $data = [
            'title'     => 'Cetak Slip Gaji',
            'slip'      => $this->slipgajiModel->getSlip($id),
            'konverter' => $this->konverter
        ];
        return view('slipgaji/cetak', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Slip Gaji',
            'slip'      => $this->slipgajiModel->getSlip($id),
            'konverter' => $this->konverter
        ];
        return view('slipgaji/edit', $data);
    }

    public function update($id)
    {
        $sql = $this->slipgajiModel->save([
            'id'                    => $id,
            'nip'                   => $this->request->getVar('nip'),
            'nama_pegawai'          => $this->request->getVar('nama_pegawai'),
            'jabatan'               => $this->request->getVar('jabatan'),
            'tgl_gabung'            => $this->request->getVar('tgl_gabung'),
            'tgl_gajian'            => $this->request->getVar('tgl_gajian'),
            'gaji_pokok'            => $this->konverter->des($this->request->getVar('gaji_pokok')),
            'tunjangan_jabatan'     => $this->konverter->des($this->request->getVar('tunjangan_jabatan')),
            'jml_kunjungan'         => $this->request->getVar('jml_kunjungan'),
            'uang_bensin'           => $this->konverter->des($this->request->getVar('uang_bensin')),
            'ganti_oli'             => $this->konverter->des($this->request->getVar('ganti_oli')),
            'total_diterima'        => $this->konverter->des($this->request->getVar('total_diterima')),
            'kasbon'                => $this->konverter->des($this->request->getVar('kasbon')),
            'total_dibawa_pulang'   => $this->konverter->des($this->request->getVar('total_dibawa_pulang')),
            'pegawai_id'            => $this->request->getVar('pegawai_id')
        ]);

        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Slip Gaji Berhasil Diubah.');
            return redirect()->to(base_url('/slipGaji/index/' . $this->request->getVar('pegawai_id')));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Mengubah Data Slip Gaji!');
            return redirect()->to(base_url('/slipGaji/index/' . $this->request->getVar('pegawai_id')));
        }
    }

    public function delete($id)
    {
        $pegawai_id = $this->request->getVar('pegawai_id');
        $sql = $this->slipgajiModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Slip Gaji Berhasil Dihapus.');
            return redirect()->to(base_url('/slipGaji/index/' . $pegawai_id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menghapus Data Slip Gaji!');
            return redirect()->to(base_url('/slipGaji/index/' . $pegawai_id));
        }
    }

    public function komisi($id)
    {
        $data = [
            'title'     => 'Komisi Marketing',
            'slip'      => $this->slipgajiModel->getSlipgaji($id),
            'pegawai'   => $this->pegawaiModel->getPegawai($id),
            'komisi'   => $this->pegawaiModel->getKomisi($id)
        ];
        return view('slipgaji/komisi', $data);
    }
}
