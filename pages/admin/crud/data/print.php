<?php
    require('../..//../../report-pdf/fpdf.php');
    include "../../../../connection/connect.php";

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Times', 'B', 13);
    $pdf-> Cell(200, 10, 'DATA TRANSAKSI', 0, 0, 'C');

    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'NO',1,0,'C');
    $pdf->Cell(40,7,'MEREK MOTOR' ,1,0,'C');
    $pdf->Cell(35,7,'HARGA MOTOR',1,0,'C');
    $pdf->Cell(40,7,'NAMA PEMBELI',1,0,'C');
    $pdf->Cell(40,7,'TANGGAL PEMBELIAN',1,0,'C');
    $pdf->Cell(25,7,'STATUS',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);

    if (isset($_GET['id'])) {
        $id_transaksi = $_GET['id'];
        $no=1;
        $data = mysqli_query($con,"SELECT
            katalog.id_motor, katalog.merek_motor, katalog.harga_motor,
            transaksi.id_transaksi, transaksi.tanggal_transaksi, transaksi.status, transaksi.id_pembeli, transaksi.id_motor,
            user.id_pembeli, user.nama_pembeli
            FROM katalog, transaksi, user
            WHERE katalog.id_motor=transaksi.id_motor
            AND user.id_pembeli=transaksi.id_pembeli
            AND transaksi.id_transaksi='$id_transaksi'
        ");
        while($d = mysqli_fetch_array($data)){
            $pdf->Cell(10,6, $no++,1,0,'C');
            $pdf->Cell(40,6, $d['merek_motor'],1,0,'C');
            $pdf->Cell(35,6, $d['harga_motor'],1,0,'C');  
            $pdf->Cell(40,6, $d['nama_pembeli'],1,0,'C');
            $pdf->Cell(40,6, $d['tanggal_transaksi'],1,0,'C');
            $pdf->Cell(25,6, 'Terkonfirmasi',1,0,'C');
        }
    }
    
    $pdf->Output();

?>