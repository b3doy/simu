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
        if (in_groups('Superuser') || in_groups('Administrator')) {
            return $this->db->table('pegawai')->select('*')->like('jabatan', 'surveyor')->get()->getResultArray();
        } else {
            return $this->db->table('pegawai')->select('*')->like('nama_pegawai', user()->username)
                ->get()->getResultArray();
        }
    }

    public function getCollector()
    {
        return $this->db->table('pegawai')->select('*')->like('jabatan', 'collector')->get()->getResultArray();
    }

    public function getkonsumenPegawai($id)
    {
        return $this->db->table('pegawai')->select('konsumen.*, konsumen.created_at as tanggal_input, pegawai.*, tanggal as tanggal_akun')
            ->join('konsumen', 'konsumen.marketing = pegawai.nama_pegawai', 'konsumen.surveyor = pegawai.nama_pegawai')
            ->join('akun', 'akun.konsumen_id = konsumen.id')->where('pegawai.id', $id)->groupBy('no_mitra')
            ->get()->getResult();
    }

    public function getkonsumenSurveyor($id)
    {

        return $this->db->table('pegawai')->select('konsumen.*, konsumen.created_at as tanggal_input, pegawai.*')
            ->join('konsumen', 'konsumen.surveyor = pegawai.nama_pegawai')
            ->where('pegawai.id', $id)->groupBy('no_mitra')->get()->getResult();
    }

    public function getSLA($id)
    {
        return $this->db->table('pegawai')->select('*')->join('konsumen', 'konsumen.surveyor = pegawai.nama_pegawai')
            ->where('pegawai.id', $id)->groupBy('no_mitra')->get()->getResult();
    }

    public function getFpd($id)
    {
        return $this->db->table('pegawai')->select('konsumen.*, konsumen.created_at as tanggal_input, pegawai.*, akun.*, akun.id as akun_id')
            ->join('konsumen', 'konsumen.surveyor = pegawai.nama_pegawai')->join('akun', 'akun.konsumen_id = konsumen.id')
            ->where('pegawai.id', $id)->groupBy('no_mitra')->selectMax('angsuran_ke')->selectMin('sisa_os')->selectMax('tanggal')
            ->get()->getResult();
    }

    public function getKomisi($id)
    {
        return $this->db->table('pegawai')->select('*')->join('konsumen', 'konsumen.marketing = pegawai.nama_pegawai')
            ->where('pegawai.id', $id)->get()->getResultArray();
    }

    public function getSurveyorAsep()
    {
        return $this->db->table('pegawai')->select('*')->where('nama_pegawai', 'ASEP BADAR')->get()->getRowArray();
    }
}
