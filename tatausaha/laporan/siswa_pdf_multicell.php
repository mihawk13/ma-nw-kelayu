<?php
require('../../assets/fpdf/fpdf.php');
require('../../koneksi.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // $this->SetFont('Times', '', 11);
        // $this->SetX(4);
        // $this->SetX(4);
        // $this->SetFont('Arial', 'B', 12);
        // $this->MultiCell(14, 0.5, 'Manatuto Kota', 0, 'C');
        // $this->MultiCell(20, 0.5, 'Laporan Arus Kas', 0, 'C');
        // $this->ln(1);

        $this->SetX(4);
        $this->SetFont('Arial', 'B', 12);
        // $this->Image('../../production/images/lg-big.png', 90, 8, 15, 15);
        $this->Cell(287, 0, 'SD KATOLIK RENTUNG II', 0, 0, 'C');
        $this->ln(10);
        $this->SetX(4);
        $this->Cell(287, 0, 'LAPORAN DATA SISWA', 0, 0, 'C');
        $this->ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-8);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(25, 10, 'NISN', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Siswa', 1, 0, 'C');
$pdf->Cell(25, 10, 'JK', 1, 0, 'C');
$pdf->Cell(25, 10, 'Agama', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Wali', 1, 0, 'C');
$pdf->Cell(30, 10, 'Telp Ortu', 1, 0, 'C');
$pdf->Cell(70, 10, 'Alamat', 1, 0, 'C');
$fontSize = 10;
$tempFontSize = $fontSize;
$modal = mysqli_query($db, "SELECT * FROM tb_siswa");
$pdf->ln(0);
$pdf->SetFont('Arial', '', 10);
while ($r = mysqli_fetch_assoc($modal)) {
    $cellHeight = 10;

    $pdf->ln(10);
    
    // $pdf->MultiCell(50, 10, $r['tempat_lahir'] . ', ' . $r['tgl_lahir'], 1, 'L');
    // $pdf->SetY(10);
    // $pdf->SetX(170);


    if($pdf->GetStringWidth($r['alamat']) < 70){
        // do nothing
        $line = 1;
    }else{
        $textLength = strlen($r['alamat']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = '';

        while($startChar < $textLength){
            // loop until max char reached
            while($pdf->GetStringWidth($tmpString) < (70-$errMargin) && ($startChar + $maxChar) < $textLength){
                $maxChar++;
                $tmpString = substr($r['alamat'], $startChar, $maxChar);
            }
            $startChar += $maxChar;
            array_push($textArray, $tmpString);

            $maxChar = 0;
            $tmpString = '';
        }
        $line = count($textArray);
    }

    $pdf->Cell(25, ($line * $cellHeight), $r['nisn'], 1, 0, 'C');
    $pdf->Cell(50, ($line * $cellHeight), $r['nama_siswa'], 1, 0);
    $pdf->Cell(25, ($line * $cellHeight), $r['jk'], 1, 0, 'C');
    $pdf->Cell(25, ($line * $cellHeight), $r['agama'], 1, 0, 'C');

    $pdf->Cell(50, ($line * $cellHeight), $r['nama_ayah'], 1, 0);

    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    
    $pdf->MultiCell(30, $cellHeight, $r['telp_ayah'], 1);

    
    $pdf->SetXY($xPos + 30, $yPos);

    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();

    $pdf->MultiCell(70, $cellHeight, $r['alamat'], 1);
    $pdf->SetXY($xPos + 70, $yPos);

    // $pdf->SetXY($xPos + 70, $yPos);

    $pdf->ln(($line * $cellHeight) - $cellHeight);

}
$pdf->ln(10);


$pdf->Output();
