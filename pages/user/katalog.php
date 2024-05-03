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
    
    <title>Katalog Page</title>
</head>
<body>
    <!-- Check Beli -->
    <?php
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'beli_success') {
                echo "
                    <script>
                        alert('Motor Berhasil di Pesan!');
                    </script>
                ";
            } else if ($_GET['msg'] == 'beli_failed') {
                echo "
                    <script>
                        alert('Pesanan Gagal, silahkan coba kembali.');
                    </script>
                ";
            }
        }
    ?>
    
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
            <a class="btn-nav active-nav" href="katalog.php">Katalog Motor</a>
            <a class="btn-nav" href="transaksi.php">Transaksi</a>
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
            <h1 class="title-main">Katalog <span>Page</span></h1>
            <span class="title-secundare"><i class="bi bi-speedometer"></i> Katalog</span>
        </div>
        <div class="content-list">
            <a href="#all_motor">Semua Motor</a>
            <a href="#under_5">Motor Di Bawah 5 Juta</a>
            <a href="#under_10">Motor Di Bawah 10 Juta</a>
            <a href="#under_15">Motor Di Bawah 15 Juta</a>
            <a href="#under_20">Motor Di Bawah 20 Juta</a>
        </div>
        <div class="content-main">
            <!-- Daftar Motor Baru -->
            <h1>Daftar Motor Baru Ditambahkan</h1>
            <div class="content-container">
                <?php
                    include "../../connection/connect.php";

                    $data = mysqli_query($con, "select * from katalog order by id_motor desc limit 10");

                    $total_motor = mysqli_fetch_assoc($data);
                    if ($total_motor > 0) {
                        foreach ($data as $d) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $d['foto_motor']; ?>" alt="<?php echo $d['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $d['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $d['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $d['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $d['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $d['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($total_motor == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>
            
            <br id="all_motor"><br><br><br><br>
            <!-- Daftar Semua Motor -->
            <h1>Daftar Semua Motor</h1>
            <div class="content-container">
                <?php
                    include "../../connection/connect.php";

                    $data_motor = mysqli_query($con, "select * from katalog order by merek_motor asc");

                    $motor = mysqli_fetch_assoc($data_motor);
                    if ($motor > 0) {
                        foreach ($data_motor as $all_motor) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $all_motor['foto_motor']; ?>" alt="<?php echo $all_motor['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $all_motor['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $all_motor['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $all_motor['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $all_motor['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $all_motor['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($motor == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>

            <br id="under_5"><br><br><br><br>
            <!-- Daftar Motor Dibawah Rp.5.000.000 -->
            <h1>Daftar Motor di Bawah 5 Juta</h1>
            <div class="content-container">
                <?php
                    $min_5 = mysqli_query($con, "select * from katalog where harga_motor<5000000 order by merek_motor asc");

                    $m_five = mysqli_fetch_assoc($min_5);
                    if ($m_five > 0) {
                        foreach ($min_5 as $m5) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $m5['foto_motor']; ?>" alt="<?php echo $m5['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $m5['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $m5['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $m5['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $m5['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $m5['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($m_five == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>
            
            <br id="under_10"><br><br><br><br>
            <!-- Daftar Motor Dibawah Rp.10.000.000 -->
            <h1>Daftar Motor di Bawah 10 Juta</h1>
            <div class="content-container">
                <?php
                    $min_10 = mysqli_query($con, "select * from katalog where harga_motor<10000000 order by merek_motor asc");

                    $m_ten = mysqli_fetch_assoc($min_10);
                    if ($m_ten > 0) {
                        foreach ($min_10 as $m10) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $m10['foto_motor']; ?>" alt="<?php echo $m10['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $m10['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $m10['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $m10['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $m10['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $m10['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($m_ten == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>
            
            <br id="under_15"><br><br><br><br>
            <!-- Daftar Motor Dibawah Rp.15.000.000 -->
            <h1>Daftar Motor di Bawah 15 Juta</h1>
            <div class="content-container">
                <?php
                    $min_15 = mysqli_query($con, "select * from katalog where harga_motor<15000000 order by merek_motor asc");

                    $m_fifteen = mysqli_fetch_assoc($min_15);
                    if ($m_fifteen > 0) {
                        foreach ($min_15 as $m15) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $m15['foto_motor']; ?>" alt="<?php echo $m15['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $m15['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $m15['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $m15['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $m15['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $m15['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($m_fifteen == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>
            
            <br id="under_20"><br><br><br><br>
            <!-- Daftar Motor Dibawah Rp.20.000.000 -->
            <h1>Daftar Motor di Bawah 20 Juta</h1>
            <div class="content-container">
                <?php
                    $min_20 = mysqli_query($con, "select * from katalog where harga_motor<20000000 order by merek_motor asc");

                    $m_twenty = mysqli_fetch_assoc($min_20);
                    if ($m_twenty > 0) {
                        foreach ($min_20 as $m20) {
                ?>
                <div class="content-card">
                    <div class="content-img">
                        <img src="../admin/crud/catalog/foto_motor/<?php echo $m20['foto_motor']; ?>" alt="<?php echo $m20['merek_motor']; ?>">
                    </div>
                    <h3><?php echo $m20['merek_motor']; ?></h3>
                    <span>Stok : <?php echo $m20['stok_motor']; ?></span> <br>
                    <span>Rp.<?php echo $m20['harga_motor']; ?></span>
                    <form action="katalogpop.php?id=<?php echo $m20['id_motor']; ?>" method="post">
                        <input type="hidden" name="id_motor" id="" value="<?php echo $m20['id_motor'] ?>" required>
                        <button type="submit" id="btn-popup" name="buy_motor"><i class="bi bi-coin"></i> Beli</button>
                    </form>
                </div>
                <?php
                        }
                    } else if ($m_twenty == 0) {
                ?>
                <div class="not-data">
                    <img src="../../assets/img/not-data.png" alt="Oops...">
                    <h1>Oopss...</h1>
                    <h1>Motor Belum Tersedia!</h1>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <br><br>
    <!-- Content End -->
    <?php include "../../assets/partials/footer.php"; ?>
    <!-- Footer End -->
</body>
</html>