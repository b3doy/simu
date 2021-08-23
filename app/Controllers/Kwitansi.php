<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\KwitansiModel;
use Config\Services;
use PhpParser\Node\Stmt\Echo_;

class Kwitansi extends BaseController
{
    protected $konsumenModel;
    protected $akunModel;
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
            'title' => 'Kwitansi',
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'akun' => $this->akunModel->getAkun()
        ];
        // dd($data);
        // if (user()->username != 'owner') {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // } else {
        //     return view('kwitansi/index', $data);
        // }
        return view('kwitansi/index', $data);
    }

    public function kwitansitable()
    {
        $listing = $this->konsumenModel->getKwitansiTable();
        $akun = $this->akunModel->getJT();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        };
        foreach ($listing as $listing) {
            $no++;
            $row = array();
            $row[] = $no;
            if ($listing->angsuran_ke == '1') {
                $row[] = date('d M Y', strtotime($listing->tanggal_angsuran2));
            } elseif ($listing->angsuran_ke == '2') {
                $row[] = date('d M Y', strtotime('+1 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '3') {
                $row[] = date('d M Y', strtotime('+2 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '4') {
                $row[] = date('d M Y', strtotime('+3 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '5') {
                $row[] = date('d M Y', strtotime('+4 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '6') {
                $row[] = date('d M Y', strtotime('+5 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '7') {
                $row[] = date('d M Y', strtotime('+6 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '8') {
                $row[] = date('d M Y', strtotime('+7 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '9') {
                $row[] = date('d M Y', strtotime('+8 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '10') {
                $row[] = date('d M Y', strtotime('+9 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '11') {
                $row[] = date('d M Y', strtotime('+10 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '12') {
                $row[] = date('d M Y', strtotime('+11 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '13') {
                $row[] = date('d M Y', strtotime('+12 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '14') {
                $row[] = date('d M Y', strtotime('+13 month', strtotime($listing->tanggal_angsuran2)));
            } elseif ($listing->angsuran_ke == '15') {
                $row[] = date('d M Y', strtotime('+14 month', strtotime($listing->tanggal_angsuran2)));
            } else {
                $row[] = 'Angsuran Sebelumnya Belum Bayar!';
            }
            $row[] = (($listing->angsuran_ke) + 1);
            // $row[] = date('d M Y');
            $row[] = $listing->nama_konsumen;
            $row[] = '<a class="btn btn-success btn-sm" href =' . base_url("/kwitansi/" . $listing->konsumen_id) . '>Cetak Kwitansi</a>';

            $data[] = $row;
        }
        // }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function cetak($id)
    {
        $jt = $this->akunModel->setJT($id);
        // dd($jt);
        $noUrutAngsuran = (int) substr($jt, -2, 2);
        $noUrutAngsuran++;
        $jt = sprintf("%02s", $noUrutAngsuran);

        $data = [
            'title' => 'Cetak Kwitansi',
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'akun' => $this->akunModel->getTrx($id),
            'konverter' => $this->konverter,
            'jt' => $jt
        ];
        // dd($data);
        return view('kwitansi/cetak', $data);
    }

    public function kwitansiPerjanjian()
    {
        $data = [
            'title' => 'Kwitansi Angsuran 1',
            'konsumen' => $this->konsumenModel->getKonsumen(),
            'akun' => $this->akunModel->getAkun()
        ];

        // if (user()->username != 'owner') {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // } else {
        //     return view('kwitansi/kwitansiperjanjian', $data);
        // }
        return view('kwitansi/kwitansiperjanjian', $data);
    }

    public function kwitansiPerjanjianTable()
    {
        $listing = $this->konsumenModel->getKwitansiPerjanjianTable();
        $akun = $this->akunModel->getJT();
        foreach ($akun as $akun) {
        };
        $data = array();
        $no = 0;
        foreach ($listing as $listing) {
            if ($listing->angsuran_ke < '1') {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = date('d M Y', strtotime($listing->tanggal_angsuran1));
                $row[] = ($listing->angsuran_ke) + 1;
                $row[] = $listing->nama_konsumen;
                $row[] = "<a class='btn btn-success btn-sm' href=" . base_url('/kwitansi/cetak_kwitansi/' . $listing->konsumen_id) . ">Cetak Kwitansi</a>";

                $data[] = $row;
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function cetakKwitansi($id)
    {
        $data = [
            'title' => 'Cetak Kwitansi Angsuran 1',
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'akun' => $this->akunModel->getTrx($id),
            'konverter' => $this->konverter,
        ];
        // dd($data);
        return view('kwitansi/cetak_kwitansi', $data);
    }

    public function print()
    {
        $this->kwitansiModel->save([
            'tanggal_cetak' => date('Y-m-d', strtotime($this->request->getVar('tanggal_cetak'))),
            'skema' => $this->request->getVar('skema'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'angsuran_ke' => $this->request->getVar('angsuran_ke'),
            'jt' => $this->request->getVar('jt'),
            'no_mitra' => $this->request->getVar('no_mitra'),
            'pembayaran_angsuran' => $this->konverter->des3($this->request->getVar('pembayaran_angsuran')),
            'pembayaran_dp' => $this->konverter->des3($this->request->getVar('pembayaran_dp')),
            'total_pembayaran' => $this->konverter->des3($this->request->getVar('total_pembayaran')),
        ]);

        return redirect()->to(base_url('/kwitansi/kwitansiperjanjian'));
    }
}
