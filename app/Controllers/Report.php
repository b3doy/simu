<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\KwitansiModel;

date_default_timezone_set('Asia/Jakarta');


class Report extends BaseController
{
    protected $konsumenModel, $akunModel, $kwitansiModel, $konverter;

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
            if ($list->created_at != $list->updated_at) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($list->updated_at));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $this->konverter->rupiah02($list->os);
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $list->tenor . ' Bulan';
                $row[] = $list->marketing;
                $row[] = $list->user_input;

                $data[] = $row;
            } else {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($list->created_at));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $this->konverter->rupiah02($list->os);
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $list->tenor . ' Bulan';
                $row[] = $list->marketing;
                $row[] = $list->user_input;

                $data[] = $row;
            }
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function inputTransaksi()
    {
        $data = [
            'akun' => $this->akunModel->getAkun(),
            'title' => 'Report Input Transaksi',
        ];
        return view('report/input_transaksi', $data);
    }


    public function inputTransaksiTable()
    {
        $list = $this->akunModel->inputTransaksiTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {

            if ($list->created_at != $list->updated_at) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y H:i:s', strtotime($list->tanggal));
                $row[] = date('Y-M-d H:i:s', strtotime($list->updated_at));
                $row[] = $list->nama;
                $row[] = $list->no_akun;
                $row[] = $list->no_ba;
                $row[] = $list->angsuran_ke;
                $row[] = $this->konverter->rupiah02($list->simpan);
                $row[] = $this->konverter->rupiah02($list->ambil);
                $row[] = $this->konverter->rupiah02($list->saldo);
                $row[] = $list->user_input;

                $data[] = $row;
            } else {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y H:i:s', strtotime($list->tanggal));
                $row[] = date('Y-M-d H:i:s', strtotime($list->updated_at));
                $row[] = $list->nama;
                $row[] = $list->no_akun;
                $row[] = $list->no_ba;
                $row[] = $list->angsuran_ke;
                $row[] = $this->konverter->rupiah02($list->simpan);
                $row[] = $this->konverter->rupiah02($list->ambil);
                $row[] = $this->konverter->rupiah02($list->saldo);
                $row[] = $list->user_input;

                $data[] = $row;
            }
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

            $data[] = $row;
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function dataAktif()
    {
        $data = [
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'title' => 'Report Data Aktif',
        ];
        return view('report/data_aktif', $data);
    }

    public function dataAktifTable()
    {
        $list = $this->konsumenModel->getDataAktifTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            if ($list->sisa_os != 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($list->tanggal));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $this->konverter->rupiah02($list->os);
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $list->tenor . ' Bulan';
                $row[] = $this->konverter->rupiah02($list->sisa_os);
                $row[] = $list->marketing;
                $row[] = $list->surveyor;

                $data[] = $row;
            }
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function uangMasuk()
    {
        $data = [
            'title'     => 'Laporan Uang Masuk',
        ];
        return view('report/uang_masuk', $data);
    }

    public function UangMasukTable()
    {
        $list = $this->akunModel->UangMasukTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            if ($list->simpan > 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($list->tanggal));
                $row[] = $list->no_akun;
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_ba;
                $row[] = $list->angsuran_ke;
                if ($list->simpan == ($list->angsuran + $list->dp)) {
                    $uangMasuk = $list->simpan - $list->dp;
                    $row[] = $this->konverter->rupiah02($uangMasuk);
                } else {
                    $row[] = $this->konverter->rupiah02($list->simpan);
                }
                $data[] = $row;
            }
        }
        $output = ['data' => $data];
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
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d-M-Y', strtotime($list->tanggal_cetak));
            $row[] = $list->nama_konsumen;
            $row[] = $list->no_mitra;
            $row[] = $list->angsuran_ke;
            $row[] = $this->konverter->rupiah02($list->pembayaran_angsuran);
            $row[] = $this->konverter->rupiah02($list->pembayaran_dp);
            $row[] = $this->konverter->rupiah02($list->total_pembayaran);
            $row[] = $list->skema;
            $row[] = $list->user_print;

            $data[] = $row;
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function sisaKwitansi()
    {
        $data = [
            'title'     => 'Laporan Sisa Kwitansi',
        ];
        return view('report/sisa_kwitansi', $data);
    }

    public function sisaKwitansiTable()
    {
        $list = $this->kwitansiModel->getSisaKwitansiTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $tgl_trx = date('Y-m-d', strtotime($list->tanggal));
            $bulan_ini = date('m-Y');
            $bulan_cetak = date('m-Y', strtotime($list->tanggal_cetak));
            if ($list->tanggal_cetak > $tgl_trx) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($list->tanggal_cetak));
                $row[] = date('d-M-Y', strtotime($list->tanggal));
                $row[] = $list->nama_konsumen;
                $row[] = $list->no_mitra;
                $row[] = $list->angsuran_ke;
                $row[] = $this->konverter->rupiah02($list->pembayaran_angsuran);
                $row[] = $list->skema;

                $data[] = $row;
            }
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }
}
