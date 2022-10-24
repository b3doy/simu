<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{
    protected $table = 'konsumen';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'no_mitra', 'nama_konsumen', 'nama_panggilan', 'no_ktp', 'tgl_lahir', 'ibu_kandung', 'pekerjaan', 'telpon', 'no_kk', 'alamat', 'status_nikah',
        'nama_pasangan', 'nama_panggilan_pasangan', 'ktp_pasangan', 'tgl_lahir_pasangan', 'alamat_ktp_pasangan', 'domisili', 'dp', 'angsuran',
        'tenor', 'os', 'total_penjualan', 'tanggal_datang', 'tanggal_angsuran1', 'tanggal_angsuran2',
        'tanggal_jt', 'skema', 'marketing', 'surveyor', 'status_approval', 'deskripsi_survey', 'waktu_update_surveyor',
        'deskripsi_unit', 'user_input', 'status_akun', 'jumlah_barang', 'nama_barang1', 'merk_barang1', 'tipe_barang1', 'warna_barang1',
        'imei1', 'nama_barang2', 'merk_barang2', 'tipe_barang2', 'warna_barang2', 'imei2', 'nama_barang3',
        'merk_barang3', 'tipe_barang3', 'warna_barang3', 'imei3', 'nama_barang4', 'deskripsi_barang4'
    ];

    public function getKonsumen($id = false)
    {
        if ($id == false) {
            return $this->orderBy('id', 'DESC')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function setCode()
    {
        return $this->db->table('konsumen')->selectMax('no_mitra')->get()->getRowArray()['no_mitra'];
    }


    public function search($cari)
    {
        return $this->table('konsumen')->like('nama_konsumen', $cari)->orLike('alamat', $cari)->orLike('tanggal', $cari);
    }

    public function getKonsumenTable()
    {
        return $this->db->table('konsumen')->select('*')->orderBy('id', 'DESC')->get()->getResult();
    }

    public function getStatusApproval()
    {
        return $this->db->table('konsumen')->select('*')->where('status_approval', 'Sedang Proses')->orderBy('status_approval', 'DESC')->get()->getResult();
    }

    public function getKonsumenAkanLunasTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->selectMin('sisa_os')->selectMax('tanggal')->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKonsumenDpdTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->selectMin('sisa_os')->selectMax('tanggal')->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKonsumenNunggakTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->selectMin('sisa_os')->selectMax('tanggal')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKwitansiTable()
    {
        return $this->db->table('konsumen')->select('konsumen.id, konsumen.nama_konsumen as nama, no_mitra, tanggal_angsuran2, angsuran, angsuran_ke, sisa_os')
            ->join('akun', 'akun.konsumen_id = konsumen.id')->selectMax('angsuran_ke')->selectMin('sisa_os')
            ->groupBy('no_mitra')->get()->getResult();
    }

    public function getKwitansiPerjanjianTable()
    {
        return $this->db->table('konsumen')->select('konsumen.id, konsumen.nama_konsumen as nama, no_mitra, tanggal_angsuran1, angsuran, angsuran_ke, sisa_os, konsumen_id')
            ->join('akun', 'akun.konsumen_id = konsumen.id')->selectMax('angsuran_ke')->groupBy('no_akun')->get()->getResult();
    }

    public function getKwitansiPelunasanTable()
    {
        return $this->db->table('konsumen')->select('konsumen.id, konsumen.nama_konsumen as nama, no_mitra, tenor, angsuran, angsuran_ke, sisa_os')
            ->join('akun', 'akun.konsumen_id = konsumen.id')->selectMax('angsuran_ke')->selectMin('sisa_os')
            ->groupBy('no_mitra')->get()->getResult();
    }

    public function getInputDataTable()
    {
        return $this->db->table('konsumen')->select('*')->groupBy('no_mitra')->get()->getResult();
    }

    public function getDataTotalTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->selectMin('sisa_os')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getDataAktifTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->selectMin('sisa_os')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getTotalPlafond()
    {
        return $this->db->table('konsumen')->selectSum('os')->get()->getResult();
    }

    public function getTagihanPerBulan()
    {
        return $this->db->table('konsumen')->select('konsumen.*, angsuran_ke, saldo, sisa_os')
            ->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->selectMax('tanggal')
            ->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getRejected()
    {
        return $this->db->table('konsumen')->select('*')->where('status_approval', 'Ditolak')->get()->getResult();
    }
}
