<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\KwitansiModel;

date_default_timezone_set('Asia/Jakarta');


class Tagihan extends BaseController
{
    protected $konsumenModel;
    protected $akunModel;
    protected $konverter;
    protected $kwitansiModel;

    public function __construct()
    {
        $this->konsumenModel = new KonsumenModel();
        $this->akunModel = new AkunModel();
        $this->kwitansiModel = new KwitansiModel();
        $this->konverter = new Konverter();
    }

    public function index()
    {
        $data = [
            'title' => 'Tagihan Perbulan',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
        ];

        return view('tagihan/index', $data);
    }

    public function tagihanPerBulanTable()
    {
        $list = $this->konsumenModel->getTagihanPerBulan();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $tgl_angsuran = $list->tanggal_angsuran2;
            $tgl_bayar_terakhir = $list->tanggal;
            $angsuran_ke = $list->angsuran_ke;
            $tgl_bayar_terakhir = date('Y/m/d', strtotime($list->tanggal));
            $tgl_jt_berikutnya = date('Y/m/d', strtotime((string)'+' . ($angsuran_ke - 1) . ' month', strtotime($tgl_angsuran)));
            $tgl_jt_berikutnya1 = strtotime($tgl_jt_berikutnya);
            $bln_jt_berikutnya = $tgl_jt_berikutnya[5] . $tgl_jt_berikutnya[6] . '/' . $tgl_jt_berikutnya[0] . $tgl_jt_berikutnya[1] . $tgl_jt_berikutnya[2] . $tgl_jt_berikutnya[3];

            $bulan_ini = date('m/Y');
            $hari_ini = time();
            $dpd = ($hari_ini - $tgl_jt_berikutnya1) / 86400; // 86400 = jumlah detik dalam 1 hari (24 jam)
            if ($hari_ini >= $tgl_jt_berikutnya1 && $list->angsuran_ke != 0 || $bulan_ini == $bln_jt_berikutnya) {
                if ($list->sisa_os != 0) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = date('d-M-Y', strtotime($tgl_jt_berikutnya));
                    $row[] = date('d-M-Y', strtotime($tgl_bayar_terakhir));
                    $row[] = $list->no_mitra;
                    $row[] = $list->nama_konsumen;
                    if ($list->tanggal_angsuran2 != 0) {
                        $row[] = $list->tanggal_angsuran2[8] . $list->tanggal_angsuran2[9];
                    } else {
                        $row[] = $list->tanggal_angsuran1[8] . $list->tanggal_angsuran1[9];
                    }
                    $row[] = $this->konverter->angka1($list->angsuran);
                    $row[] = $angsuran_ke;
                    $row[] = intval($dpd) . ' Hari';
                    $row[] = $this->konverter->angka1($list->saldo);
                    $row[] = $this->konverter->angka1($list->sisa_os);

                    $data[] = $row;
                }
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }
}
