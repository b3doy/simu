<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\AkunModel;
use App\Models\KonsumenModel;
use App\Models\PegawaiModel;
use Config\Services;

date_default_timezone_set('Asia/Jakarta');

class Konsumen extends BaseController
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
            'title' => 'Konsumen | Mitra Bersama ZE',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
            'konverter' => $this->konverter,
        ];
        return view('konsumen/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Data Konsumen',
            'akun' => $this->akunModel->getTrx($id),
            'konverter' => $this->konverter,
            'konsumen' => $this->konsumenModel->getKonsumen($id)
        ];

        return view('konsumen/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Konsumen',
            'validation' => Services::validation(),
            'pegawai' => $this->pegawaiModel->getMarketing(),
            'pegawai1' => $this->pegawaiModel->getSurveyor(),
            'konverter' => $this->konverter
        ];

        return view('konsumen/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'nama_konsumen' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'no_ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'angsuran' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tenor' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_datang' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_angsuran1' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_angsuran2' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'marketing' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus dipilih!']
            ],
            'surveyor' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus dipilih!']
            ],
        ])) {
            $validation = Services::validation();
            return redirect()->to(base_url('konsumen/create'))->withInput();

            $data = [
                'title' => 'Buat Akun',
                'validation' => $validation
            ];
            return view('konsumen/create', $data);
        };

        $sql = $this->konsumenModel->save([
            'no_mitra' => $this->request->getPost('no_mitra'),
            'nama_konsumen' => $this->request->getPost('nama_konsumen'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'ibu_kandung' => $this->request->getPost('ibu_kandung'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'telpon' => $this->request->getPost('telpon'),
            'no_kk' => $this->request->getPost('no_kk'),
            'alamat' => $this->request->getPost('alamat'),
            'status_nikah' => $this->request->getPost('status_nikah'),
            'nama_pasangan' => $this->request->getPost('nama_pasangan'),
            'nama_panggilan_pasangan' => $this->request->getPost('nama_panggilan_pasangan'),
            'ktp_pasangan' => $this->request->getPost('ktp_pasangan'),
            'tgl_lahir_pasangan' => $this->request->getPost('tgl_lahir_pasangan'),
            'alamat_ktp_pasangan' => $this->request->getPost('alamat_ktp_pasangan'),
            'domisili' => $this->request->getPost('domisili'),
            'dp' => $this->konverter->des3($this->request->getPost('dp')),
            'angsuran' => $this->konverter->des3($this->request->getPost('angsuran')),
            'tenor' => $this->request->getPost('tenor'),
            'os' => $this->konverter->des3($this->request->getPost('os')),
            'total_penjualan' => $this->konverter->des3($this->request->getPost('total_penjualan')),
            'tanggal_datang' => $this->request->getPost('tanggal_datang'),
            'tanggal_angsuran1' => $this->request->getPost('tanggal_angsuran1'),
            'tanggal_angsuran2' => $this->request->getPost('tanggal_angsuran2'),
            'tanggal_jt' => $this->request->getPost('tanggal_jt'),
            'skema' => $this->request->getPost('skema'),
            'marketing' => $this->request->getPost('marketing'),
            'surveyor' => $this->request->getPost('surveyor'),
            'status_approval' => $this->request->getPost('status_approval'),
            'user_input' => $this->request->getPost('user_input'),
            'jumlah_barang' => $this->request->getPost('jumlah_barang'),
            'nama_barang1' => $this->request->getPost('nama_barang1'),
            'merk_barang1' => $this->request->getPost('merk_barang1'),
            'tipe_barang1' => $this->request->getPost('tipe_barang1'),
            'warna_barang1' => $this->request->getPost('warna_barang1'),
            'imei1' => $this->request->getPost('imei1'),
            'nama_barang2' => $this->request->getPost('nama_barang2'),
            'merk_barang2' => $this->request->getPost('merk_barang2'),
            'tipe_barang2' => $this->request->getPost('tipe_barang2'),
            'warna_barang2' => $this->request->getPost('warna_barang2'),
            'imei2' => $this->request->getPost('imei2'),
            'nama_barang3' => $this->request->getPost('nama_barang3'),
            'merk_barang3' => $this->request->getPost('merk_barang3'),
            'tipe_barang3' => $this->request->getPost('tipe_barang3'),
            'warna_barang3' => $this->request->getPost('warna_barang3'),
            'imei3' => $this->request->getPost('imei3'),
            'nama_barang4' => $this->request->getPost('nama_barang4'),
            'deskripsi_barang4' => $this->request->getPost('deskripsi_barang4')
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Konsumen Baru Berhasil Disimpan.');
            return redirect()->to(base_url('/konsumen'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan Data Konsumen Baru.');
            return redirect()->to(base_url('/konsumen'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Konsumen',
            'validation' => Services::validation(),
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'pegawai' => $this->pegawaiModel->getMarketing(),
            'pegawai1' => $this->pegawaiModel->getSurveyor(),
            'konverter' => $this->konverter,
            'validation' => Services::validation()
        ];

        return view('konsumen/edit', $data);
    }

    public function update($id)
    {
        // Validasi Input
        $konsumen_lama = $this->konsumenModel->getKonsumen($this->request->getVar('id'));
        if ($konsumen_lama['telpon'] == $this->request->getVar('telpon')) {
            $rule_telpon = 'required|is_natural';
        } else {
            $rule_telpon = 'required|is_natural';
        }

        if (!$this->validate([
            'nama_konsumen' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'no_ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'angsuran' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tenor' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_datang' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_angsuran1' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'tanggal_angsuran2' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} harus diisi!']
            ],
            'status_approval' => [
                'rules' => 'required',
                'errors' => ['required' => 'form {field} harus dipilih!']
            ],
            'deskripsi_survey' => [
                'rules' => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'deskripsi_unit' => [
                'rules' => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
        ])) {
            return redirect()->back()->withInput();
        };

        $sql = $this->konsumenModel->save([
            'id' => $id,
            'no_mitra' => $this->request->getPost('no_mitra'),
            'nama_konsumen' => $this->request->getPost('nama_konsumen'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'ibu_kandung' => $this->request->getPost('ibu_kandung'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'telpon' => $this->request->getPost('telpon'),
            'no_kk' => $this->request->getPost('no_kk'),
            'alamat' => $this->request->getPost('alamat'),
            'status_nikah' => $this->request->getPost('status_nikah'),
            'nama_pasangan' => $this->request->getPost('nama_pasangan'),
            'nama_panggilan_pasangan' => $this->request->getPost('nama_panggilan_pasangan'),
            'ktp_pasangan' => $this->request->getPost('ktp_pasangan'),
            'tgl_lahir_pasangan' => $this->request->getPost('tgl_lahir_pasangan'),
            'alamat_ktp_pasangan' => $this->request->getPost('alamat_ktp_pasangan'),
            'domisili' => $this->request->getPost('domisili'),
            'dp' => $this->konverter->des3($this->request->getPost('dp')),
            'angsuran' => $this->konverter->des3($this->request->getPost('angsuran')),
            'tenor' => $this->request->getPost('tenor'),
            'os' => $this->konverter->des3($this->request->getPost('os')),
            'total_penjualan' => $this->konverter->des3($this->request->getPost('total_penjualan')),
            'tanggal_datang' => $this->request->getPost('tanggal_datang'),
            'tanggal_angsuran1' => $this->request->getPost('tanggal_angsuran1'),
            'tanggal_angsuran2' => $this->request->getPost('tanggal_angsuran2'),
            'tanggal_jt' => $this->request->getPost('tanggal_jt'),
            'skema' => $this->request->getPost('skema'),
            'marketing' => $this->request->getPost('marketing'),
            'surveyor' => $this->request->getPost('surveyor'),
            'status_approval' => $this->request->getPost('status_approval'),
            'deskripsi_survey' => $this->request->getPost('deskripsi_survey'),
            'waktu_update_surveyor' => $this->request->getPost('waktu_update_surveyor'),
            'deskripsi_unit' => $this->request->getPost('deskripsi_unit'),
            'user_input' => $this->request->getPost('user_input'),
            'status_akun' => $this->request->getPost('status_akun'),
            'jumlah_barang' => $this->request->getPost('jumlah_barang'),
            'nama_barang1' => $this->request->getPost('nama_barang1'),
            'merk_barang1' => $this->request->getPost('merk_barang1'),
            'tipe_barang1' => $this->request->getPost('tipe_barang1'),
            'warna_barang1' => $this->request->getPost('warna_barang1'),
            'imei1' => $this->request->getPost('imei1'),
            'nama_barang2' => $this->request->getPost('nama_barang2'),
            'merk_barang2' => $this->request->getPost('merk_barang2'),
            'tipe_barang2' => $this->request->getPost('tipe_barang2'),
            'warna_barang2' => $this->request->getPost('warna_barang2'),
            'imei2' => $this->request->getPost('imei2'),
            'nama_barang3' => $this->request->getPost('nama_barang3'),
            'merk_barang3' => $this->request->getPost('merk_barang3'),
            'tipe_barang3' => $this->request->getPost('tipe_barang3'),
            'warna_barang3' => $this->request->getPost('warna_barang3'),
            'imei3' => $this->request->getPost('imei3'),
            'nama_barang4' => $this->request->getPost('nama_barang4'),
            'deskripsi_barang4' => $this->request->getPost('deskripsi_barang4'),
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Konsumen Berhasil Diubah.');
            return redirect()->to(base_url('/konsumen'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Mengubah Data Konsumen.');
            return redirect()->to(base_url('/konsumen'));
        }
    }

    public function surveyEdit($id)
    {
        $data = [
            'title'     => 'Update Status Approval',
            'konsumen' => $this->konsumenModel->getKonsumen($id),
            'pegawai' => $this->pegawaiModel->getMarketing(),
            'pegawai1' => $this->pegawaiModel->getSurveyor(),
            'konverter' => $this->konverter,
            'validation' => Services::validation(),
        ];
        return view('konsumen/survey_edit', $data);
    }

    public function rejected()
    {
        $data = [
            'title'     => "Data Konsumen Ditolak",
            'konsumen'  => $this->konsumenModel->getRejected()
        ];
        return view('konsumen/rejected', $data);
    }

    public function rejectedTable()
    {
        $list = $this->konsumenModel->getRejected();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = date('d-M-Y', strtotime($list->waktu_update_surveyor));
            $row[] = $list->nama_konsumen;
            $row[] = $list->no_ktp;
            $row[] = $list->alamat;
            $row[] = $list->marketing;
            $row[] = '<a class="bg-danger text-light">' . $list->status_approval . '</a>';
            $row[] = $list->surveyor;
            $row[] = $list->deskripsi_survey;

            $data[] = $row;
        }

        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function delete($id)
    {
        $sql = $this->konsumenModel->delete($id);

        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Konsumen Berhasil Dihapus.');
            return redirect()->to(base_url('/konsumen'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menghapus Data Konsumen Baru.');
            return redirect()->to(base_url('/konsumen'));
        }
    }

    public function konsumentable()
    {
        $list = $this->konsumenModel->getKonsumenTable();
        $data = array();
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->no_mitra;
            $row[] = $list->nama_konsumen;
            if ($list->tanggal_angsuran2 != 0) {
                $row[] = $list->tanggal_angsuran2[8] . $list->tanggal_angsuran2[9];
            } else {
                $row[] = $list->tanggal_angsuran1[8] . $list->tanggal_angsuran1[9];
            }
            $row[] = date('d M Y', strtotime($list->tanggal_jt));
            $row[] = $this->konverter->rupiah02($list->angsuran);
            $row[] = $list->marketing;
            if ($list->status_approval == 'Sedang Proses') {
                $row[] = '<p class="bg-warning text-dark">' . $list->status_approval . '</p>';
            } elseif ($list->status_approval == 'Approved') {
                $row[] = '<p class="bg-success text-light">' . $list->status_approval . '</p>';
            } elseif ($list->status_approval == 'Direkomendasikan') {
                $row[] = '<p class="bg-info text-dark">' . $list->status_approval . '</p>';
            } else {
                $row[] = '<p class="bg-danger text-light">' . $list->status_approval . '</p>';
            }
            $row[] = '<a class="badge badge-info" href =' . base_url("/konsumen/" . $list->id) . '><i class="fa fa-book"></i> Detail</a>';

            $data[] = $row;
        }

        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function statusApproval()
    {
        $data = [
            'title'     => 'Status Approval',
            'konsumen'  => $this->konsumenModel->getStatusApproval(),
        ];
        return view('konsumen/status_approval', $data);
    }

    public function statusApprovalTable()
    {
        $list = $this->konsumenModel->getStatusApproval();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if (user()->username == $list->surveyor) {
                if ($list->status_akun == null && $list->status_approval != 'Ditolak') {
                    $no++;
                    $row = [];
                    $row[] = $no;
                    $row[] = $list->no_mitra;
                    $row[] = $list->nama_konsumen;
                    $row[] = $list->alamat;
                    $row[] = $this->konverter->rupiah($list->angsuran);
                    $row[] = $list->tenor;
                    $row[] = $list->nama_barang1;
                    if ($list->status_approval == 'Sedang Proses') {
                        $row[] = '<p class="bg-warning text-dark">' . $list->status_approval . '</p>';
                    } elseif ($list->status_approval == 'Approved') {
                        $row[] = '<p class="bg-success text-light">' . $list->status_approval . '</p>';
                    } elseif ($list->status_approval == 'Direkomendasikan') {
                        $row[] = '<p class="bg-info text-dark">' . $list->status_approval . '</p>';
                    } else {
                        $row[] = '<p class="bg-danger text-light">' . $list->status_approval . '</p>';
                    }
                    $row[] = '<a class="badge badge-info" href =' . base_url("/konsumen/" . $list->id) . '><i class="fa fa-book"></i> Detail</a>';

                    $data[] = $row;
                }
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function akanLunas()
    {
        $data = [
            'title'     => 'Konsumen Akan Lunas',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
            'konverter' => $this->konverter,
        ];
        return view('konsumen/akan_lunas', $data);
    }

    public function konsumenAkanLunasTable()
    {
        $list = $this->konsumenModel->getKonsumenAkanLunasTable();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $jt = strtotime($list->tanggal_jt);
            $tiga_bulan_lagi = $jt - 7776000; // 7776000 = 60 detik x 60 menit x 24 jam x 90 hari 
            $hari_ini = time();
            $tgl_angsuran = date('d/m/Y', strtotime($list->tanggal_angsuran2));
            if ($hari_ini >= $tiga_bulan_lagi && $jt >= $hari_ini && $list->sisa_os != 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $list->no_mitra;
                $row[] = $list->nama_konsumen;
                $row[] = $tgl_angsuran[0] . $tgl_angsuran[1];
                $row[] = date('d-M-Y', strtotime($list->tanggal_jt));
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $this->konverter->rupiah02($list->sisa_os);
                $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/konsumen/" . $list->konsumen_id) . '><i class="fa fa-book"></i> Detail</a>';

                $data[] = $row;
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function sudahLunas()
    {
        $data = [
            'title' => 'Konsumen Sudah Lunas',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
            'konverter' => $this->konverter,
        ];
        return view('konsumen/sudah_lunas', $data);
    }

    public function konsumenSudahLunasTable()
    {
        $list = $this->konsumenModel->getKonsumenAkanLunasTable();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $jt = strtotime($list->tanggal_jt);
            $hari_ini = time();
            if ($hari_ini >= $jt) {
                if ($list->sisa_os == 0) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $list->no_mitra;
                    $row[] = $list->nama_konsumen;
                    $row[] = $this->konverter->rupiah02($list->angsuran);
                    $row[] = $list->sisa_os;
                    $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/konsumen/" . $list->konsumen_id) . '><i class="fa fa-book"></i> Detail</a>';

                    $data[] = $row;
                }
            } else {
                if ($list->sisa_os == 0) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $list->no_mitra;
                    $row[] = $list->nama_konsumen;
                    $row[] = $this->konverter->rupiah02($list->angsuran);
                    $row[] = $list->sisa_os;
                    $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/konsumen/" . $list->konsumen_id) . '><i class="fa fa-book"></i> Detail</a>';

                    $data[] = $row;
                }
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function nunggak()
    {
        $data = [
            'title' => 'Konsumen Menunggak',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
            'konverter' => $this->konverter,
        ];
        return view('konsumen/nunggak', $data);
    }

    public function konsumenNunggakTable()
    {
        $list = $this->konsumenModel->getKonsumenNunggakTable();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $jt = strtotime($list->tanggal_jt);
            $tgl_bayar_terakhir = date('d', strtotime($list->tanggal));
            $tgl_jt = date('d', strtotime($list->tanggal_jt));
            $dpd_hari = $this->konverter->harga($tgl_jt - $tgl_bayar_terakhir);
            $hari_ini = time();
            $dpd = ($hari_ini - strtotime($list->tanggal)) / 86400; // 86400 jumlah detik dalam 1 hari
            if ($hari_ini >= $jt && $list->sisa_os != 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $list->no_mitra;
                $row[] = $list->nama_konsumen;
                $row[] = date('d M Y', strtotime($list->tanggal_jt));
                $row[] = date('d M Y', strtotime($list->tanggal));
                $row[] = intval($dpd) + intval($dpd_hari) . ' hari';
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = $this->konverter->rupiah02($list->sisa_os);

                $data[] = $row;
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }

    public function dpd()
    {
        $data = [
            'title' => 'Konsumen DPD',
            'konsumen'  => $this->konsumenModel->getKonsumen(),
            'akun'      => $this->akunModel->getAkun(),
            'konverter' => $this->konverter,
        ];
        return view('konsumen/dpd', $data);
    }

    public function konsumendpdTable()
    {
        $list = $this->konsumenModel->getKonsumenDpdTable();
        $akun = $this->akunModel->getAkun();
        $data = array();
        $no = 0;
        foreach ($akun as $akun) {
        }
        foreach ($list as $list) {
            $tgl_angsuran = $list->tanggal_angsuran2;
            $angsuran_ke = $list->angsuran_ke;
            $tgl_jt_berikutnya = date('Y/m/d', strtotime((string)'+' . ($angsuran_ke - 1) . ' month', strtotime($tgl_angsuran)));
            $tgl_jt_berikutnya1 = strtotime($tgl_jt_berikutnya);

            $jt = strtotime($list->tanggal_jt);
            $hari_ini = time();
            $dpd = ($hari_ini - $tgl_jt_berikutnya1) / 86400; // 86400 = jumlah detik dalam 1 hari (24 jam)
            if ($hari_ini >= $tgl_jt_berikutnya1 && $hari_ini < $jt && $list->angsuran_ke != 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $list->no_mitra;
                $row[] = $list->nama_konsumen;
                $row[] = date('d', strtotime($list->tanggal_angsuran2));
                $row[] = date('d M Y', strtotime($tgl_jt_berikutnya));
                $row[] = $this->konverter->rupiah02($list->angsuran);
                $row[] = intval($dpd) . ' Hari';
                $row[] = $this->konverter->rupiah02($list->sisa_os);
                $row[] = '<a class="btn btn-outline-info btn-sm noprint" href =' . base_url("/akun/riwayat/" . $list->konsumen_id) . '><i class="fa fa-book"></i> Detail</a>';

                $data[] = $row;
            }
        }
        $output = [
            'data' => $data
        ];
        echo json_encode($output);
    }
}
