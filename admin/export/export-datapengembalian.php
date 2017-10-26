<?php
include "../config/DB.php";
include('../vendor/setasign/fpdf/fpdf.php');
include ('../fctn/tglid.php');

//Menampilkan data dari tabel di database
$result=$dbase->query("SELECT * FROM peminjaman WHERE date(tglpengembalian) >= '$_SESSION[tanggal1]' AND date(tglpengembalian) <= '$_SESSION[tanggal2]' AND status_peminjaman = 'Belum Kembali' ORDER BY namaanggota ASC");
//Inisiasi untuk membuat header kolom
$column_na = "";
$column_nama = "";
$column_buku = "";
$column_buku2 = "";
$column_kontak = "";
$column_status = "";
//For each row, add the field to the corresponding column
while($row = $result->fetch(PDO::FETCH_OBJ))
{
    $na = $row->kodeanggota;
    $nama = $row->namaanggota;
    $buku = $row->tglpeminjaman;
    $buku2 = $row->buku2;
    $kontak = $row->buku1;
    $status = $row->status_peminjaman;
    $column_na = $column_na.$na."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_buku = $column_buku.$buku."\n";
    $column_buku2 = $column_buku2.$buku2."\n";
    $column_kontak = $column_kontak.$kontak."\n";
    $column_status = $column_status.$status."\n";
//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();
//Menambahkan Gambar
$pdf->Image('../public/images/pku-logo.gif',15,10,10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(130);
$pdf->Cell(30,10,'DATA Pengembalian koleksi buku',0,0,'C');
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(30,4,'Perpustakaan Soeman HS',0,0,'C');
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
$pdf->Cell(30,8,'Tgl Peminjaman',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(60,8,'Buku 1',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(65,8,'Buku 2',1,0,'C',1);
$pdf->SetX(240);
$pdf->Cell(40,8,'Status',1,10,'C',1);
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
$pdf->MultiCell(30,6,$column_buku,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(60,6,$column_buku2,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(175);
$pdf->MultiCell(65,6,$column_kontak,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(40,6,$column_status,1,'C');
// $pdf->MultiCell(40,6,$column_status,1,'C');
$pdf->Output();
?>