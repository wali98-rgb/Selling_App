<?php
    include '../../../../connection/connect.php';

    $slug_motor = $_GET['slug'];
    $query = mysqli_query($con, "select * from katalog where slug_motor='$slug_motor'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "foto_motor/$FF[foto_motor]";
    unlink($deleteFF);

    mysqli_query($con, "delete from katalog where slug_motor='$slug_motor'") or die(mysqli_error());
    header('location:index.php?msg=delete_success');
?>