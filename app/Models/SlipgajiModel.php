<?php

namespace App\Models;

use App\Controllers\SlipGaji;
use CodeIgniter\Model;

class SlipgajiModel extends Model
{
    protected $table = 'slipgaji';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nip', 'nama_pegawai', 'jabatan', 'tgl_gabung', 'tgl_gajian', 'gaji_pokok', 'tunjangan_jabatan', 'jml_kunjungan',
        'uang_bensin', 'ganti_oli', 'total_diterima', 'kasbon', 'total_dibawa_pulang', 'pegawai_id'
    ];

    public function getSlip($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getSlipgaji($id)
    {
        return $this->db->table('slipgaji')->select('slipgaji.*, pegawai.id as pegawai_id')->join('pegawai', 'pegawai.id = slipgaji.pegawai_id')
            ->where('pegawai.id', $id)->get()->getResultArray();
    }
}
