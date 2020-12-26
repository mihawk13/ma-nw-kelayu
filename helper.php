<?php

function getPendidikanTerakhir()
{
    return ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3', 'Tidak Sekolah'];
}

function getHari()
{
    return ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
}

function getPredikat($nilai)
{
    $prdkt = '';
    if ($nilai > 90) {
        $prdkt = 'A';
    } elseif ($nilai > 80) {
        $prdkt = 'B';
    } elseif ($nilai > 70) {
        $prdkt = 'C';
    } elseif ($nilai > 60) {
        $prdkt = 'D';
    } else {
        $prdkt = 'E';
    }
    return $prdkt;
}

function getBulan($bln)
{
    $bulan = '';
    switch ($bln) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
        default:
            break;
    }
    return $bulan;
}

function getTanggal()
{
    return date('d') . ' ' . getBulan(date('m')) . ' ' . date('Y');
}

function getSemester($smt)
{
  if($smt == 1){
    return 'Ganjil';
  }else{
    return 'Genap';
  }
}