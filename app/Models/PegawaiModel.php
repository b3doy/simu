<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nip',
        'nama_pegawai',
        'jabatan',
        'telpon',
        'alamat',
    ];

    public function getPegawai($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getMarketing()
    {
        return $this->db->table('pegawai')->select('*')->like('jabatan', 'marketing')->get()->getResultArray();
    }
    public function getSurveyor()
    {
        return $this->db->table('pegawai')->select('*')->like('jabatan', 'surveyor')->get()->getResultArray();
    }
}
