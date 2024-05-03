<?php
    include "../../../../connection/connect.php";

    if (isset($_POST['status'])) {
        $id_transaksi = $_POST['id_transaksi'];
        mysqli_query($con, "update transaksi set status='1' where id_transaksi='$id_transaksi'");
    }

    header('location:index.php?msg=data_success');
?>