<?php
    include '../../../../connection/connect.php';

    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $j_kelamin = $_POST['j_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];

    if (isset($_POST['ubah'])) {
        mysqli_query($con, "update user set
            nama_pembeli = '$nama_pembeli',
            password = '$password',
            alamat = '$alamat',
            j_kelamin = '$j_kelamin',
            pekerjaan = '$pekerjaan'
            where id_pembeli = '$id_pembeli'
        ");
    }

    header('location:index.php?msg=update_success');
?>