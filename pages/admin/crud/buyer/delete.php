<?php
    include '../../../../connection/connect.php';

    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM user WHERE id_pembeli='$id'") or die(mysqli_error($con));

    header('location:index.php?msg=delete_success');
?>