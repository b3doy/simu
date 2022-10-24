<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\PegawaiModel;

class Surveyor extends BaseController
{
    protected $pegawaiModel;
    protected $akunModel;
    protected $konverter;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->akunModel = new AkunModel();
        $this->konverter = new Konverter;
    }

    public function index()
    {
        $data = [
            'title'     => "Surveyor || SIMU-1.0",
            'surveyor'  => $this->pegawaiModel->getSurveyor(),
            'konverter' => $this->konverter
        ];
        return view('surveyor/index', $data);
    }

    public function sla($id)
    {
        $data = [
            'title'     => "SLA Surveyor",
            'surveyor'   => $this->pegawaiModel->getPegawai($id),
        ];
        return view('surveyor/sla', $data);
    }

    public function slaTable()
    {
        $id_pegawai = $this->request->getVar('id_pegawai');
        $list = $this->pegawaiModel->getSLA($id_pegawai);
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($list->waktu_update_surveyor != null) {
                $sla = date((strtotime($list->waktu_update_surveyor) - strtotime($list->created_at)) / 3600); // 693725
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = date('d-M-Y H:i:s', strtotime($list->created_at));
                $row[] = date('d-M-Y H:i:s', strtotime($list->waktu_update_surveyor));
                $row[] = $list->no_mitra;
                $row[] = $list->nama_konsumen;
                $row[] = $list->marketing;
                $row[] = date(round($sla)) . ' Jam';

                $data[] = $row;
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }


    public function fpd($id)
    {
        $data = [
            'title'     => "FPD Surveyor",
            'surveyor'   => $this->pegawaiModel->getPegawai($id),
        ];
        return view('surveyor/fpd', $data);
    }

    public function fpdTable()
    {
        $id_pegawai = $this->request->getVar('id_pegawai');
        $list = $this->pegawaiModel->getFpd($id_pegawai);
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($list->sisa_os != 0) {
                $konsumen_id = $list->konsumen_id;
                $akun = $this->akunModel->getTrx($konsumen_id);
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->no_mitra;
                $row[] = '<a href="' . base_url("pegawai/surveyorKonsumen/" . $id_pegawai . '/' . $list->konsumen_id) . '">' . $list->nama_konsumen . '</a>';
                if ($list->tanggal_angsuran2 != 0) {
                    $row[] = $list->tanggal_angsuran2[8] . $list->tanggal_angsuran2[9];
                } else {
                    $row[] = $list->tanggal_angsuran1[8] . $list->tanggal_angsuran1[9];
                }
                $row[] = $list->marketing;
                for ($i = 0; $i < count($akun); $i++) {
                    $tgl_angsuran2 = $akun[$i]['tanggal_angsuran2'];
                    $angsuran_ke = $akun[$i]['angsuran_ke'];
                    $tgl_bayar = $akun[$i]['tanggal'];
                    $sisa_os = $akun[$i]['sisa_os'];
                    $tgl_jt_berikutnya = date('Y-m-d', strtotime((string)'+' . ($angsuran_ke - 2) . ' month', strtotime($tgl_angsuran2)));
                    if ($akun[$i]['ambil'] != 0) {
                        if ($angsuran_ke <= 6 && $angsuran_ke != 0 && $sisa_os != 0) {
                            if (date('m-Y', strtotime($tgl_bayar)) > date('m-Y', strtotime($tgl_jt_berikutnya)) or date('Y', strtotime($tgl_bayar)) > date('Y', strtotime($tgl_jt_berikutnya))) {
                                $row[] = 'FPD';
                            }
                        }
                    }
                }

                $data[] = $row;
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }
}
