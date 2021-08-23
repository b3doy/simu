<?php

namespace App\Models;

use CodeIgniter\Model;

class KwitansiModel extends Model
{
    protected $table = 'kwitansi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'tanggal_cetak',
        'skema',
        'nama_konsumen',
        'angsuran_ke',
        'jt',
        'no_mitra',
        'pembayaran_angsuran',
        'pembayaran_dp',
        'total_pembayaran',
    ];

    public function getKwitansi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getkwitansiPrintTable()
    {
        return $this->db->table('kwitansi')->select('*')->get()->getResult();
    }
}
