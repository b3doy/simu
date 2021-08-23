<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\KwitansiModel;
use Config\Services;
use PhpParser\Node\Stmt\Echo_;

date_default_timezone_set('Asia/Jakarta');


class Report extends BaseController
{
    protected $konsumenModel;
    protected $akunModel;

    public function __construct()
    {
        $this->konsumenModel = new KonsumenModel();
        $this->akunModel = new AkunModel();
        $this->kwitansiModel = new KwitansiModel();
        $this->konverter = new Konverter();
    }

    public function inputData()
    {
        $data = [
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'title' => 'Report Input Data Harian',
        ];
        return view('report/input_data', $data);
    }

    public function inputDataTable()
    {
        $list = $this->konsumenModel->getInputDataTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $hari_ini = date('d/m/Y');
            $tgl_input1 = date('d/m/Y', strtotime($list->created_at));
            $tgl_input2 = date('d/m/Y', strtotime($list->updated_at));
            // if ($list->created_at != $list->updated_at) {
            //     if ($hari_ini == $tgl_input2) {
            //         $no++;
            //         $row = array();
            //         $row[] = $no;
            //         $row[] = date('d M Y', strtotime($list->updated_at));
            //         $row[] = $list->nama_konsumen;
            //         $row[] = $list->no_mitra;
            //         $row[] = $this->konverter->rupiah02($list->os);
            //         $row[] = $this->konverter->rupiah02($list->angsuran);
            //         $row[] = $list->tenor;
            //         $row[] = user()->username;

            //         $data[] = $row;
            //     }
            // } else {
            //     if ($hari_ini == $tgl_input1) {
            //         $no++;
            //         $row = array();
            //         $row[] = $no;
            //         $row[] = date('d M Y', strtotime($list->created_at));
            //         $row[] = $list->nama_konsumen;
            //         $row[] = $list->no_mitra;
            //         $row[] = $this->konverter->rupiah02($list->os);
            //         $row[] = $this->konverter->rupiah02($list->angsuran);
            //         $row[] = $list->tenor . ' Bulan';
            //         $row[] = user()->username;

            //         $data[] = $row;
            //     }
            if ($list->created_at != $list->updated_at) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d M Y', strtotime($list->updated_at));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $this->konverter->rupiah02($list->os);
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $list->tenor;
                $row[] = user()->username;

                $data[] = $row;
            } else {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d M Y', strtotime($list->created_at));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $this->konverter->rupiah02($list->os);
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $list->tenor . ' Bulan';
                $row[] = user()->username;

                $data[] = $row;
            }
            // }
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function dataTotal()
    {
        $data = [
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'title' => 'Report Data Total',
        ];
        return view('report/data_total', $data);
    }

    public function dataTotalTable()
    {
        $list = $this->konsumenModel->getDataTotalTable();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_konsumen;
            $row[] = $list->no_mitra;
            $row[] = $this->konverter->rupiah02($list->os);
            $row[] = $this->konverter->rupiah02($list->angsuran);
            $row[] = $list->tenor . ' Bulan';
            $row[] = $this->konverter->rupiah02($list->sisa_os);
            // $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/konsumen/" . $list->id) . '><i class="fa fa-book"></i> Detail</a>';

            $data[] = $row;
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function kwitansiPrint()
    {
        $data = [
            'title' => 'Laporan Print Kwitansi',
            'kwitansi' => $this->kwitansiModel->getKwitansi()
        ];
        return view('report/kwitansi_print', $data);
    }

    public function kwitansiPrintTable()
    {
        $list = $this->kwitansiModel->getkwitansiPrintTable();
        // $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        // foreach ($akun as $akun) {
        // }
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d M Y', strtotime($list->tanggal_cetak));
            $row[] = $list->nama_konsumen;
            $row[] = $list->no_mitra;
            $row[] = $list->angsuran_ke;
            $row[] = $this->konverter->rupiah02($list->pembayaran_angsuran);
            $row[] = $this->konverter->rupiah02($list->pembayaran_dp);
            $row[] = $this->konverter->rupiah02($list->total_pembayaran);
            $row[] = $list->skema;
            $row[] = user()->username;
            // $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/konsumen/" . $list->id) . '><i class="fa fa-book"></i> Detail</a>';

            $data[] = $row;
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }
}
