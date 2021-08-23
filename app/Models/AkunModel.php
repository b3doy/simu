<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'no_akun',
        'nama_konsumen',
        'telpon',
        'tanggal',
        'no_ba',
        'simpan',
        'ambil',
        'saldo',
        'sisa_os',
        'angsuran_ke',
        'keterangan',
        'konsumen_id'
    ];

    public function getAkun($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function sortBy()
    {
        return $this->db->table('akun')->orderBy('tanggal', 'DESC')->groupBy('no_ba')->get()->getResultArray();
    }

    public function getTrx($id)
    {
        return $this->db->table('akun')->join('konsumen', 'konsumen.id = akun.konsumen_id')->where('konsumen.id', $id)->get()->getResultArray();
    }

    public function getBa($no_ba)
    {
        return $this->db->table('akun')->join('konsumen', 'konsumen.id = akun.konsumen_id')->where('no_ba', $no_ba)->get()->getResultArray();
    }

    public function search($cari)
    {
        return $this->table('akun')->like('nama_konsumen', $cari)->orLike('no_akun', $cari)->orLike('tanggal', $cari)->orLike('no_ba', $cari);
    }

    public function getBaTable()
    {
        $builder = $this->db->table('akun');
        $query = $builder->select('*')->groupBy('no_ba')->get();
        return $query->getResult();
    }

    public function getCreateAkun($id)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['konsumen_id' => $id])->get()->getResultArray();
    }

    public function setDeleteAkun($id)
    {
        return $this->db->table('akun')->where('konsumen_id', $id)->delete();
    }


    public function setJT($id)
    {
        return $this->db->table('akun')->join('konsumen', 'konsumen.id = akun.konsumen_id')->where('konsumen_id', $id)->selectMax('angsuran_ke')->get()->getRowArray()['angsuran_ke'];
        // return $this->db->table('akun')->selectMax('angsuran_ke')->get()->getRowArray()['angsuran_ke'];
    }

    public function getJT()
    {
        return $this->db->table('akun')->select('angsuran_ke')->get()->getResult();
    }
}
