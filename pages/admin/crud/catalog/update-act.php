<?php
    include '../../../../connection/connect.php';

    $id_motor = $_POST['id_motor'];
    $foto_motor = $_POST['foto_motor'];
    $merek_motor = $_POST['merek_motor'];
    $slug_motor = $_POST['slug_motor'];
    $stok_motor = $_POST['stok_motor'];
    $harga_motor = $_POST['harga_motor'];

    if (isset($_POST['ubah'])) {
        $query = mysqli_query($con, "SELECT * FROM katalog WHERE slug_motor='$slug_motor'");
    
        $FF = mysqli_fetch_array($query);
        $deleteFF = "foto_motor/$FF[foto_motor]";
        unlink($deleteFF);

        $extention_diperbolehkan = array('png', 'jpg', 'jpeg');
        $foto_motor = $_FILES['foto_motor']['name'];
        $ex = explode('.', $foto_motor);
        $extention = strtolower(end($ex));
        $size = $_FILES['foto_motor']['size'];
        $file_tmp = $_FILES['foto_motor']['tmp_name'];

        if (in_array($extention, $extention_diperbolehkan) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, 'foto_motor/'.$foto_motor);
                mysqli_query($con, "UPDATE katalog SET
                    foto_motor = '$foto_motor',
                    merek_motor = '$merek_motor',
                    slug_motor = '$slug_motor',
                    stok_motor = '$stok_motor',
                    harga_motor = '$harga_motor'
                    WHERE id_motor = '$id_motor'
                ");
            }
        }
    }

    header('location:index.php?msg=update_success');
?>