<?php
    session_start();
    include "../../connection/connect.php";

    $idP = $_SESSION['id_pembeli'];
    $idM = $_POST['id_motor'];
    $stok_akhir = $_POST['stok_motor'];
    $date = date('Y/m/d');

    if (isset($_POST['beli_motor'])) {
        mysqli_query($con, "INSERT INTO transaksi SET
            tanggal_transaksi = '$date',
            status = '0',
            id_pembeli = '$idP',
            id_motor = '$_POST[id_motor]'
        ");

        mysqli_query($con, "update katalog set stok_motor='$stok_akhir' where id_motor='$idM'");

        header('location:katalog.php?msg=beli_success');
    } else {
        header('location:katalog.php?msg=beli_failed');
    }

?>