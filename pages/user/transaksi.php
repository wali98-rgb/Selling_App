<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;800&display=swap" rel="stylesheet">

    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../plugin/css/style.css">
    <link rel="stylesheet" href="../../plugin/css/nav.css">
    <link rel="stylesheet" href="../../plugin/css/to.css">
    <link rel="stylesheet" href="../../plugin/css/jb.css">
    <link rel="stylesheet" href="../../plugin/css/content.css">
    <link rel="stylesheet" href="../../plugin/css/foot.css">

    <!-- My JavaScript -->
    <script src="../../plugin/js/sc.js"></script>

    <style>
        .navbar .navbar-nav .active-nav {
            color: orange;
        }
    </style>
    
    <title>Transaksi Page</title>
</head>
<body>    
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="navbar-logo">
            <h1>R.M <span>Motor</span></h1>
        </div>
        <div class="navbar-nav">
            <form action="#" name="search_moto" class="form-search disable_form">
                <input class="inp-search" type="text" name="moto" id="moto" placeholder="Search Motocycle...">
            </form>
            <a class="btn-nav" href="../../index.php">Home</a>
            <a class="btn-nav" href="katalog.php">Katalog Motor</a>
            <a class="btn-nav active-nav" href="transaksi.php">Transaksi</a>
            <div class="navbar-ex">
                <button class="btn-ex" type="button" id="search-id" onclick="active()"><i class="bi bi-search"></i></button>
                <?php
                session_start();
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == "login") {
                ?>
                    <button class="btn-ex" type="button">
                        <a class="btn-ex btn-person" href="profile.php">
                            <i class="bi bi-person-circle"></i>
                            <label for="">
                                <?php
                                    $jumlah = 1;
                                    echo implode(" ", array_slice(explode(" ", $_SESSION['nama_pembeli']), 0, $jumlah));
                                ?>
                            </label>
                        </a>
                    </button>
                    <button class="btn-ex" type="button"><a class="btn-ex" href="../../auth/logout.php"><i class="bi bi-box-arrow-left"></i></a></button>
                <?php
                    }
                } else {
                ?>
                    <button class="btn-ex" type="button"><a class="btn-ex" href="../../auth/login/login.php"><i class="bi bi-box-arrow-right"></i></a></button>
                <?php
                }
                ?>
                <button class="btn-ex" type="button" id="list-id" onclick="active()"><i class="bi bi-list"></i></button>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <br><br><br><br>
    <!-- Content Start -->
    <section class="content">
        <div class="content-title">
            <h1 class="title-main">Transaksi <span>Page</span></h1>
            <span class="title-secundare"><i class="bi bi-receipt"></i> Transaksi</span>
        </div>
        <div class="content-list">
            <a href="katalog.php#all_motor">Semua Motor</a>
            <a href="katalog.php#under_5">Motor Di Bawah 5 Juta</a>
            <a href="katalog.php#under_10">Motor Di Bawah 10 Juta</a>
            <a href="katalog.php#under_15">Motor Di Bawah 15 Juta</a>
            <a href="katalog.php#under_20">Motor Di Bawah 20 Juta</a>
        </div>

        <h1>Daftar Transaksi</h1>
        <div class="content-transaction">
            <table cellpadding="10">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th width="40%">Merek Motor</th>
                        <th width="40%">Harga Motor</th>
                        <th width="10%">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../../connection/connect.php";

                        if (isset($_SESSION['status'])) {
                            if ($_SESSION['status'] == 'login') {
                                $pembeli = $_SESSION['id_pembeli'];
                                $n = 1;
                                $trans = mysqli_query($con, "select
                                    transaksi.id_transaksi, transaksi.tanggal_transaksi, transaksi.status, transaksi.id_pembeli, transaksi.id_motor,
                                    katalog.id_motor, katalog.merek_motor, katalog.harga_motor
                                    from transaksi, katalog
                                    where transaksi.id_motor=katalog.id_motor
                                    and transaksi.id_pembeli='$pembeli'
                                    order by transaksi.tanggal_transaksi asc
                                ");
                                
                                $transaksi_awal = mysqli_fetch_assoc($trans);
                                foreach ($trans as $t) {
                    ?>
                    <tr>
                        <td><?php echo $n++ ?></td>
                        <td><?php echo $t['merek_motor']; ?></td>
                        <td>Rp.<?php echo $t['harga_motor']; ?></td>
                                <?php
                                    if ($t['status'] == 0) {
                                ?>
                                    <td><span class="not-confirm"><i class="bi bi-check-circle"></i></span></td>
                                <?php
                                    } else if ($t['status'] == 1) {
                                ?>
                                    <td><span class="confirm"><i class="bi bi-check-circle-fill"></i></span></td>
                                <?php
                                    }
                                }
                            }
                        ?>
                    </tr>
                    <?php } else {
                        echo "<td colspan='4'>Silahkan Login Terlebih Dahulu!</td>";
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Merek Motor</th>
                        <th>Harga Motor</th>
                        <th>Konfirmasi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <br><br>
    <!-- Content End -->
    <?php include "../../assets/partials/footer.php"; ?>
    <!-- Footer End -->
</body>
</html>