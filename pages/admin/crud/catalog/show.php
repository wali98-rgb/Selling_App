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
    
    <title>Admin Page</title>

    <style>
        :root {
            --primary: #13005A;
            --secondary: #00337C;
            --thirdy: #03C988;
            --bg: #8DCBE6;
            --text: #FFFFFF;
        }
        
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg);
            color: var(--primary);
            font-family: 'Roboto Slab', serif;
        }
        
        .navbar {
            padding: .5rem 7%;
            position: fixed;
            display: flex;
            top: 0;
            left: 0;
            right: 0;
            font-size: 1.2rem;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(19, 0, 90, .85);
            color: var(--text);
            z-index: 9999;
        }

        .navbar a {
            text-decoration: none;
            font-size: 1.2rem;
        }

        .navbar a h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text);
        }

        .navbar a h1 span {
            color: var(--thirdy);
        }

        .navbar .navbar-nav, .navbar .navbar-ex {
            display: flex;
            justify-content: space-around;
        }

        .navbar .navbar-nav a {
            margin: 0 .5rem;
            text-align: center;
            display: grid;
            font-size: 1.8rem;
            color: var(--text);
        }

        .navbar .navbar-nav a span {
            margin: 0;
            font-size: 1rem;
        }

        .navbar .navbar-ex button {
            margin: 0 .5rem;
            font-size: 1.8rem;
            color: var(--text);
            background: none;
            border: none;
        }

        .navbar .navbar-nav a:hover, .navbar .navbar-ex button:hover {
            color: var(--thirdy);
        }

        .navbar .navbar-ex .form-search {
            margin: 0 .5rem 0 0;
            transition: .3s;
        }

        .navbar .navbar-ex .form-search .inp-search {
            padding: .5rem 1rem;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            color: var(--primary);
        }

        .navbar .navbar-ex #list-id {
            display: none;
        }

        .disable_form {
            transform: scaleX(0);
        }
        
        .active_form {
            transform: scaleX(1);
        }

        /* Hero Start */
        .hero {
            padding: 6rem 7% 0;
        }

        .hero .hero-title {
            margin: 0 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--primary);
        }

        .hero .hero-title .hero-main-title {
            font-size: 1.8rem;
            font-weight: 800;
        }

        .hero .hero-title .hero-main-title span {
            color: var(--secondary);
        }

        .hero .hero-main {
            display: flex;
            justify-content: space-around;
        }

        .hero .hero-main .main {
            padding: 0 1rem;
            width: 20rem;
            height: auto;
            background-color: var(--thirdy);
        }

        .hero .hero-main .main .hero-main-title {
            padding: 0 .2rem .5rem;
            font-size: 1.4rem;
            border-bottom: 3px solid var(--primary);
        }

        .hero .hero-main .main h4 {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: 600;
        }

        /* Content Katalog */
        .content {
            padding: 0 7%;
        }

        .content .content-motor {
            padding: 2rem 0;
        }

        .content .content-motor .motor-table {
            width: 100%;
            text-align: center;
        }

        .content .content-motor .motor-table thead, tfoot {
            font-size: 1.5rem;
        }

        .content .content-motor .motor-table tbody {
            font-size: 1.2rem;
        }

        .content .content-motor form {
            padding: 1rem;
            background-color: var(--secondary);
            border-radius: 1rem;
        }

        .content .content-motor form .form-input input {
            margin: .5rem 0;
            padding: 1rem;
            max-width: 77.5rem;
            width: 100%;
            color: var(--primary);
            border-radius: .5rem;
            border: none;
            font-size: 1rem;
        }

        .content .content-motor form .form-submit {
            margin: 1.5rem 0 0;
        }

        /* Footer */
        .footer {
            padding: .5rem 0;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: var(--secondary);
            display: flex;
            justify-content: center;
            color: var(--text);
        }

        .footer .footer-copy {
            margin: 0;
            font-size: 1rem;
            font-weight: 300;
        }

        /* Tools */
        .btn-plus {
            padding: .8rem 1rem;
            background-color: var(--thirdy);
            color: var(--text);
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .btn-view {
            margin: 0 .2rem;
            padding: .5rem 1rem;
            background-color: var(--secondary);
            color: var(--text);
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .btn-edit {
            margin: 0 .2rem;
            padding: .5rem 1rem;
            background-color: yellow;
            color: black;
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .btn-delete {
            margin: 0 .2rem;
            padding: .5rem 1rem;
            background-color: red;
            color: var(--text);
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .btn-back {
            padding: .8rem 1rem;
            background-color: orange;
            color: var(--text);
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }
        
        .btn-reset {
            padding: .8rem 1rem;
            background-color: yellow;
            color: black;
            border-radius: .5rem;
            border: none;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .btn-plus:hover {
            background-color: green;
        }
        
        .btn-view:hover {
            background-color: var(--primary);
        }
        
        .btn-edit:hover {
            background-color: rgb(210, 210, 0);
        }
        
        .btn-delete:hover {
            background-color: darkred;
        }

        .btn-back:hover {
            background-color: darkorange;
        }
        
        .btn-reset:hover {
            background-color: rgb(210, 210, 0);
        }

        #active {
            color: var(--thirdy);
        }
    </style>

    <script>
        // Toggle Class Active
        function active() {
            const search = document.querySelector('.form-search')
            
            // Saat hamburger di klik
            document.querySelector('#search-id').onclick = () => {
                search.classList.toggle('active_form')
            }

            // Saat diklik diluar navbar, sidebarnya ilang
            const search_id = document.querySelector('#search-id')
            
            document.addEventListener('click', function(event) {
                if (!search_id.contains(event.target) && !search.contains(event.target)) {
                    search.classList.remove('active_form')
                }
            })
        }
    </script>
</head>
<body>
    <nav class="navbar">
        <a href="index.php"><h1><span>R.M</span> Motor Bandung</h1></a>
        <div class="navbar-nav">
            <a href="../../index.php">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
            <a href="index.php" id="active">
                <i class="bi bi-speedometer"></i>
                <span>Katalog</span>
            </a>
            <a href="../data/index.php">
                <i class="bi bi-box-arrow-in-down"></i>
                <span>Data Pembelian</span>
            </a>
            <a href="../buyer/index.php">
                <i class="bi bi-person-circle"></i>
                <span>Data Pembeli</span>
            </a>
        </div>
        <div class="navbar-ex">
            <form action="#" name="search_moto" class="form-search disable_form">
                <input class="inp-search" type="text" name="moto" id="moto" placeholder="Search Motocycle...">
            </form>
            <button type="button" id="search-id" onclick="active()"><i class="bi bi-search"></i></button>
            <button type="button" id="list-id" onclick="active()"><i class="bi bi-list"></i></button>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-title">
            <h1 class="hero-main-title">View Katalog <span>Page</span></h1>
            <p class="hero-main-date">
                <?php echo date('D, d M Y'); ?>
            </p>
        </div>
    </section>
    <section class="content">
        <a href="index.php" class="btn-back">
            <i class="bi bi-arrow-left-circle"></i>
            <span>Kembali ke Katalog</span>
        </a>
        <div class="content-motor">
        </div>
    </section>
    
    <?php
        include('../../partials/footer.php');
    ?>
</body>
</html>