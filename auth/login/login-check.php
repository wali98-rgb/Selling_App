<?php
    session_start();
    include '../../connection/connect.php';

    $nama_pembeli = $_POST['nama_pembeli'];
    $password = md5($_POST['password']);

    $data = mysqli_query($con, "select * from user where nama_pembeli='$nama_pembeli' and password='$password'");

    $check = mysqli_num_rows($data);

    if ($check > 0) {
        $d = mysqli_fetch_assoc($data);

        if ($d['role'] == 'admin') {
            $_SESSION['nama_pembeli'] = $nama_pembeli;
            $_SESSION['id_pembeli'] = $d['id_pembeli'];
            $_SESSION['role'] = 'admin';
            $_SESSION['status'] = 'login';

            header('location:../../pages/admin/index.php');
        } else if ($d['role'] == 'pembeli') {
            $_SESSION['nama_pembeli'] = $nama_pembeli;
            $_SESSION['id_pembeli'] = $d['id_pembeli'];
            $_SESSION['role'] = 'pembeli';
            $_SESSION['status'] = 'login';

            header('location:../../index.php');
        }
    } else {
        header('location:login.php?msg=login_failed');
    }
?>