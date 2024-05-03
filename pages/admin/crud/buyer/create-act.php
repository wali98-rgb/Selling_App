<?php
    include '../../../../connection/connect.php';

    $pass = md5($_POST['password']);
    
    if (isset($_POST['simpan'])) {
        mysqli_query($con, "insert into user set
            nama_pembeli = '$_POST[nama_pembeli]',
            password = '$pass',
            alamat = '$_POST[alamat]',
            j_kelamin = '$_POST[j_kelamin]',
            pekerjaan = '$_POST[pekerjaan]',
            role = 'pembeli'
        ");
    }

    header('location:index.php?msg=success');
?>