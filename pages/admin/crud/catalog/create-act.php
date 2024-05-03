<?php
    include '../../../../connection/connect.php';

    if (isset($_POST['simpan'])) {
        $extention_diperbolehkan = array('png', 'jpg', 'jpeg');
        $foto_motor = $_FILES['foto_motor']['name'];
        $ex = explode('.', $foto_motor);
        $extention = strtolower(end($ex));
        $size = $_FILES['foto_motor']['size'];
        $file_tmp = $_FILES['foto_motor']['tmp_name'];

        if (in_array($extention, $extention_diperbolehkan) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, 'foto_motor/'.$foto_motor);
                mysqli_query($con, "INSERT into katalog set
                    foto_motor = '$foto_motor',
                    merek_motor = '$_POST[merek_motor]',
                    slug_motor = '$_POST[slug_motor]',
                    stok_motor = '$_POST[stok_motor]',
                    harga_motor = '$_POST[harga_motor]'
                ");
            }
        }
    }

    header('location:index.php?msg=success');
?>