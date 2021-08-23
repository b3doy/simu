<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{
    protected $table = 'konsumen';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'no_mitra',
        'nama_konsumen',
        'no_ktp',
        'alamat',
        'telpon',
        'dp',
        'angsuran',
        'tenor',
        'os',
        'total_penjualan',
        'tanggal_datang',
        'tanggal_angsuran1',
        'tanggal_angsuran2',
        'tanggal_jt',
        'skema',
        'marketing',
        'surveyor',
        'jumlah_barang',
        'nama_barang1',
        'merk_barang1',
        'tipe_barang1',
        'warna_barang1',
        'imei1',
        'nama_barang2',
        'merk_barang2',
        'tipe_barang2',
        'warna_barang2',
        'imei2',
        'nama_barang3',
        'merk_barang3',
        'tipe_barang3',
        'warna_barang3',
        'imei3',
        'nama_barang4',
        'deskripsi_barang4',
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
        return $this->db->table('konsumen')->select('*')->get()->getResult();
        // return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->groupBy('no_akun')->get()->getResult();
    }

    public function getKonsumenAkanLunasTable()
    {
        // return $this->db->table('konsumen')->select('*')->get()->getResult();
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->selectMax('tanggal')->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKonsumenDpdTable()
    {
        // return $this->db->table('konsumen')->select('*')->get()->getResult();
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->selectMax('tanggal')->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKonsumenNunggakTable()
    {
        // return $this->db->table('konsumen')->select('*')->get()->getResult();
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->selectMax('tanggal')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getKwitansiTable()
    {
        // $builder = $this->db->table('konsumen');
        // $query = $builder->select('*')->get();
        // return $query->getResult();
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMax('angsuran_ke')->groupBy('no_mitra')->get()->getResult();
    }

    public function getKwitansiPerjanjianTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMax('angsuran_ke')->groupBy('no_akun')->get()->getResult();
    }

    public function getInputDataTable()
    {
        return $this->db->table('konsumen')->select('*')->groupBy('no_mitra')->get()->getResult();
    }

    public function getDataTotalTable()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->groupBy('konsumen_id')->get()->getResult();
    }

    public function getTotalPlafond()
    {
        return $this->db->table('konsumen')->selectSum('os')->get()->getResult();
        // if ($sql->setRow(1)) {
        //     return $sql->getRow()->os;
        // } else {
        //     return 0;
        // }
    }

    public function getTagihanPerBulan()
    {
        return $this->db->table('konsumen')->select('*')->join('akun', 'akun.konsumen_id = konsumen.id')->selectMin('sisa_os')->selectMax('tanggal')->selectMax('angsuran_ke')->groupBy('konsumen_id')->get()->getResult();
    }
}
