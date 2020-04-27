<?php
require_once('fpdf/fpdf.php');
include_once "../library/inc.koneksi.php";

$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B","16");
$pdf->Cell(0,5,"Surat Rekomendasi",0,1,"C");
$pdf->Ln(1);

$pdf->SetFont("Arial","i","8");
$pdf->Cell(0,5,'Alamat : Jl. Kapten Tendean, Kav. 12 - 14 A Jakarta 12790. Telephone : 021-79175599. Fax : 021-79193900 ',0,1,"C");
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont("Arial","B",8);
$pdf->Cell(50,5,"Laporan Data Surat",0,1,"L",false);
$pdf->Ln(3);

$pdf->SetFont("Arial","",6);
$pdf->Cell(5,5,'No',1,0,'L');
$pdf->Cell(20,5,'No. Surat',1,0,'L');
$pdf->Cell(9,5,'No. MD',1,0,'L');
$pdf->Cell(20,5,'Tanggal MD',1,0,'L');
$pdf->Cell(20,5,'Lampiran',1,0,'L');
$pdf->Cell(20,5,'Cabang',1,0,'L');
$pdf->Cell(20,5,'Alamat',1,0,'L');
$pdf->Cell(10,5,'PIC',1,0,'L');
$pdf->Cell(30,5,'Permasalahan',1,0,'L');
$pdf->Cell(30,5,'Rekomendasi',1,0,'L');
$pdf->Cell(10,5,'Status',1,0,'L');
$pdf->Ln(2);


$mySql = "SELECT * FROM surat ORDER BY id ASC";
    $myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
    $nomor = 0; 
    while ($myData = mysql_fetch_array($myQry)) {
        $nomor++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(5,5,$myData['id'],1,0,'L');
    $pdf->Cell(20,5,$myData['no_surat'],1,0,'L');
    $pdf->Cell(9,5,$myData['no_md'],1,0,'L');
    $pdf->Cell(20,5,$myData['tgl_surat'],1,0,'L');
    $pdf->Cell(20,5,$myData['lampiran'],1,0,'L');
    $pdf->Cell(20,5,$myData['cabang'],1,0,'L');
    $pdf->Cell(20,5,$myData['alamat'],1,0,'L');
    $pdf->Cell(10,5,$myData['pic'],1,0,'L');
    $pdf->Cell(30,5,$myData['permasalahan'],1,0,'L');
    $pdf->Cell(30,5,$myData['keterangan'],1,0,'L');
    $pdf->Cell(10,5,$myData['status'],1,0,'L');
}
$pdf->output();
