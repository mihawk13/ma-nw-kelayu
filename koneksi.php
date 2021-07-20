<?php
$db = mysqli_connect("localhost", "root", "", "ma-nw-kelayu");
$thnAjaran = date('Y') . '/' . (date('Y') + 1);

// function tglIndo($date)
// {
//     $array_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
//     $date = strtotime($date);
//     $tanggal = date('j', $date);
//     $bulan = $array_bulan[date('n', $date)];
//     $tahun = date('Y', $date);
//     $result = $tanggal . " " . $bulan . " " . $tahun;
//     return ($result);
// }
