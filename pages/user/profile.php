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

    <style>
        .navbar .navbar-nav .navbar-ex button .active-nav {
            color: orange;
        }

        .content .content-transaction .btn-contact {
            padding: 0;
        }
        
        .content .content-transaction .btn-contact a {
            margin: 0 43%;
            display: grid;
            justify-content: center;
            color: green;
            text-align: center;
            font-size: 2rem;
        }

        .content .content-transaction .btn-contact a:hover, .content .content-transaction .btn-contact a span:hover {
            color: var(--secondary);
        }
        
        .content .content-transaction .btn-contact a span {
            color: var(--primary);
            font-size: 1.2rem;
        }
    </style>
    
    <!-- My JavaScript -->
    <script src="../../plugin/js/sc.js"></script>
    
    <title>Profil Page</title>
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
            <a class="btn-nav" href="transaksi.php">Transaksi</a>
            <div class="navbar-ex">
                <button class="btn-ex" type="button" id="search-id" onclick="active()"><i class="bi bi-search"></i></button>
                <?php
                session_start();
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == "login") {
                ?>
                    <button class="btn-ex" type="button">
                        <a class="btn-ex btn-person  active-nav" href="profile.php">
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
            <h1 class="title-main">Profil <span>Page</span></h1>
            <span class="title-secundare"><i class="bi bi-person-circle"></i> Profil</span>
        </div>
        <div class="content-list">
            <a href="#all_motor">Semua Motor</a>
            <a href="#under_5">Motor Di Bawah 5 Juta</a>
            <a href="#under_10">Motor Di Bawah 10 Juta</a>
            <a href="#under_15">Motor Di Bawah 15 Juta</a>
            <a href="#under_20">Motor Di Bawah 20 Juta</a>
        </div>

        <h1>Data Profil</h1>
        <div class="content-transaction">
            <table cellpadding="10">
                <thead>
                    <tr>
                        <th width="40%">Profil</th>
                        <th width="40%">Data</th>
                    </tr>
                </thead>
                <?php
                    include "../../connection/connect.php";

                    $pembeli = $_SESSION['id_pembeli'];
                    $user = mysqli_query($con, "select * from user where id_pembeli='$pembeli'");
                    
                    $data_user = mysqli_fetch_assoc($user);
                    foreach ($user as $u) {
                ?>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $u['nama_pembeli']; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><?php echo $u['password']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $u['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $u['j_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><?php echo $u['pekerjaan']; ?></td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>Profil</th>
                        <th>Data</th>
                    </tr>
                </tfoot>
            </table>
            <p class="margin: 0;" align="center">Ada Kendala?</p>
            <div class="btn-contact">
                <a href="https://wa.me/628882169159" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    <span>Hubungi Admin</span>
                </a>
            </div>
        </div>
    </section>

    <br><br>
    <!-- Content End -->
    <?php include "../../assets/partials/footer.php"; ?>
    <!-- Footer End -->
</body>
</html>