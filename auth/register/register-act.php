<?php
    include '../../connection/connect.php';

    $nama_pembeli = $_POST['nama_pembeli'];
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $j_kelamin = $_POST['j_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];

    if (isset($_POST['regis'])) {
        $data = mysqli_query($con, "insert into user set
            nama_pembeli = '$nama_pembeli',
            password = '$password',
            alamat = '$alamat',
            j_kelamin = '$j_kelamin',
            pekerjaan = '$pekerjaan',
            role = 'pembeli'
        ");

        if ($data) {
            header('location:../login/login.php?msg=regis_success');
        } else {
            header('location:../login/login.php?msg=regis_failed');
        }

    }
?>