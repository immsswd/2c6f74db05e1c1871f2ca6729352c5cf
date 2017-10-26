<?php
session_start();
include "../config/DB.php";
include('../vendor/setasign/fpdf/fpdf.php');
include ('../fctn/tglid.php');

//Menampilkan data dari tabel di database
$result=$dbase->query("SELECT * FROM anggota WHERE date(tanggal) >= '$_SESSION[tanggal1]' AND date(tanggal) <= '$_SESSION[tanggal2]' ORDER BY nama ASC");
$no = 1;
//Inisiasi untuk membuat header kolom
$column_na = "";
$column_nama = "";
$column_jk = "";
$column_ja = "";
$column_statuske = "";
$column_kontak = "";
$column_alamat = "";
$column_ttl = "";
$column_noid = "";
$column_peker = "";

$date1 = TanggalIndo($_SESSION['tanggal1']);
$date2 = TanggalIndo($_SESSION['tanggal2']);
//For each row, add the field to the corresponding column
while($row = $result->fetch(PDO::FETCH_OBJ))
{
    $na = $row->kodeanggota;
    $nama = $row->nama;
    $jk = $row->jeniskelamin;
    $ja = $row->jenisanggota;
    $status_k = $row->status_keanggotaan;
    $kontak = $row->kontak;
    $alamat = $row->alamat;
    $tempat = $row->tempatlahir;
    $tgllahir = $row->tgllahir;
    $noident = $row->nomoridentitas;
    $jiednt = $row->jenisidentitas;
    $statuspek = $row->statuspekerjaan;

    $column_na = $column_na.$na."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_jk = $column_jk.$jk."\n";
    $column_ja = $column_ja.$ja."\n";
    $column_statuske = $column_statuske.$status_k."\n";
    $column_kontak = $column_kontak.$kontak."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_ttl = $column_ttl.$tempat."/".$tgllahir."\n";
    $column_noid = $column_noid.$noident. $jiednt."\n";
    $column_peker = $column_peker.$statuspek."\n";
//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();
//Menambahkan Gambar
$pdf->Image('../public/images/pku-logo.gif',15,10,10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(130);
$pdf->Cell(30,6,'Laporan Registrasi Anggota',0,0,'C');
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(30,6,'Perpustakaan Soeman HS',0,0,'C');
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(30,5,$date1.'-'.$date2,0,0,'C');
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 30;
//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name

$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(30,8,'No Anggota',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(30,8,'Jenis Kelamin',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(35,8,'Jenis Keanggotaan',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(20,8,'Status',1,0,'C',1);
$pdf->SetX(240);
$pdf->Cell(40,8,'Tempat tgl lahir',1,0,'C',1);
$pdf->SetX(200);
$pdf->Cell(40,8,'Kontak',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(40,8,'Pekerjaan',1,10,'C',1);
$pdf->Ln();
//Table position, under Fields Name
$Y_Table_Position = 38;
//Now show the columns
$pdf->SetFont('Arial','',10);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(30,6,$column_na,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(40,6,$column_nama,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(30,6,$column_jk,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(35,6,$column_ja,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(20,6,$column_statuske,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(40,6,$column_peker,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(40,6,$column_ttl,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(210);
$pdf->MultiCell(30,6,$column_kontak,1,'L');
// $pdf->MultiCell(40,6,$column_status,1,'C');
$pdf->Output();
?>