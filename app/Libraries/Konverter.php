<?php

namespace App\Libraries;

use App\Models\KonsumenModel;


class Konverter
{
    protected $konsumenModel;

    public function __construct()
    {
        $this->konsumenModel = new KonsumenModel();
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    function rupiah02($angka)
    {
        $format_angka = "Rp. " . number_format($angka, 2, ',', '.');
        return $format_angka;
    }

    function angka($angka)
    {
        $format_angka = number_format($angka, 0, ',', '.');
        return $format_angka;
    }

    function angka1($angka)
    {
        $format_angka = number_format($angka, 0, ',', ',');
        return $format_angka;
    }

    function desimal($angka)
    {
        $format_angka = number_format($angka, 2, ',', ',');
        return $format_angka;
    }


    function harga($harga)
    {
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga_int = (int)$harga_str;
        return $harga_int;
    }

    function des($des)
    {
        $nilai_str = preg_replace("/[^\d-]+/", "", $des);
        $nilai_des = ((int)$nilai_str);
        return $nilai_des;
    }

    function des1($des1)
    {
        $nilai_str = preg_replace("/[^0-9]/", "", $des1);
        $nilai_des1 = ((float)$nilai_str) / 100000;
        return $nilai_des1;
    }

    function des2($des2)
    {
        $nilai_str = preg_replace("/[^0-9]/", "", $des2);
        $nilai_des2 = ((float)$nilai_str) / 100;
        return $nilai_des2;
    }

    function des3($des3)
    {
        $nilai_str = preg_replace("/[^\d-]+/", "", $des3);
        $nilai_des3 = ((float)$nilai_str) / 100;
        return $nilai_des3;
    }

    function des4($des4)
    {
        $nilai_str = preg_replace("/[^\d-]+/", "", $des4);
        $nilai_des4 = ((int)$nilai_str) / 100;
        return $nilai_des4;
    }

    function randcode($length)
    {
        $konsumen = $this->konsumenModel->getKonsumen();
        foreach ($konsumen as $konsumen) {
            $hurufDepan = $konsumen['nama_konsumen'][0];
            $num = '0123456789';
            $hrf = $hurufDepan;

            for ($i = 0; $i < $length; $i++) {
                $rNum = rand(0, strlen($num) - 1);
                $hrf .= $num[$rNum];
            }
        }
        return $hrf;
    }

    function kodeMitra()
    {
        $kode = $this->konsumenModel->setCode();
        $urutan = (int) substr($kode, -4, 4);
        $urutan++;
        $angkaTetap = '18071304-';
        $kode = $angkaTetap . sprintf("%04s", $urutan);
        return $kode;
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " Puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " Milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
}
