<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\PegawaiModel;

class Beritaacara extends BaseController
{
    protected $konsumenModel;
    protected $akunModel;
    protected $pegawaiModel;
    protected $konverter;

    public function __construct()
    {
        $this->konsumenModel = new KonsumenModel();
        $this->akunModel = new AkunModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->konverter = new Konverter();
    }

    public function index()
    {
        $data = [
            'title' => 'Berita Acara Tagihan',
        ];
        return view('berita_acara/index', $data);
    }

    public function batable()
    {
        $listing = $this->akunModel->getBaTable();
        $pegawai = $this->pegawaiModel->getCollector();
        $data = array();
        $no = 0;
        foreach ($pegawai as $pegawai) {
        }
        foreach ($listing as $listing) {
            if ($listing->no_ba != null) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d-M-Y', strtotime($listing->tanggal));
                $row[] = $listing->no_ba;
                $row[] = $listing->collector;
                $row[] = '<a class="btn btn-info btn-sm" href =' . base_url("/berita_acara/" . $listing->no_ba) . '>Detail</a>';

                $data[] = $row;
            }
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function detail($no_ba)
    {
        $data = [
            'title' => 'Detail Berita Acara',
            'akun' => $this->akunModel->getBa($no_ba),
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'konverter' => $this->konverter,
        ];
        return view('berita_acara/detail', $data);
    }
}
