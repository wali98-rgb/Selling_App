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
    
    <title>Login Page</title>

    <style>
        :root {
            --primary: #FF1E1E;
            --secondary: #FFFF00;
            --thirdy: #31C6D4;
            --bg: #00FFD1;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg);
            font-family: 'Roboto Slab', serif;
        }

        /* Login */
        .login {
            margin: 12rem 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login .login-page {
            text-align: center;
        }

        .login .login-page .login-title {
            margin: 0;
            padding: 0 0 1rem;
            font-size: 2.5rem;
            font-weight: 800;
        }

        .login .login-page .login-title span {
            color: var(--primary);
        }

        .login .login-page .login-form {
            padding: 1rem 1.5rem;
            background-color: var(--thirdy);
            border-radius: .5rem;
        }

        .login .login-page .login-form form {
            width: 25rem;
        }
        
        .login .login-page .login-form form .form-input input {
            margin: .5rem 0;
            padding: 1rem 1.5rem;
            max-width: 22rem;
            border-radius: .5rem;
            font-family: 'Roboto Slab', serif;
            text-align: center;
            font-size: 1rem;
            border: none;
            color: black;
            width: 100%;
        }

        .login .login-page .login-form form p {
            font-size: 1rem;
        }

        .login .login-page .login-form form p a {
            text-decoration: none;
            color: blue;
        }

        .login .login-page .login-form form .form-submit input {
            padding: .5rem 1rem;
            width: 100%;
            background-color: blue;
            color: white;
            border-radius: .5rem;
            border: none;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .login .login-page .login-form form .form-submit input:hover {
            cursor: pointer;
            background-color: darkblue;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Check Login -->
    <?php
        session_start();

        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == 'login' && $_SESSION['role'] == 'admin') {
                header('location:../../pages/admin/index.php');
            } else if ($_SESSION['status'] == 'login' && $_SESSION['role'] == 'pembeli') {
                header('location:../../index.php');
            }
        }
    ?>
    
    <!-- Check Register -->
    <?php
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'regis_success') {
                echo "<script>
                        alert('Registrasi Berhasil!');
                    </script>";
            } else if ($_GET['msg'] == 'regis_failed') {
                echo "<script>
                        alert('Registrasi Gagal!');
                    </script>";
                header('location:../register/register.php');
            } else if ($_GET['msg'] == 'login_failed') {
                echo "<script>
                        alert('Login Gagal!');
                    </script>";
            }
        }
    ?>
    
    <section class="login">
        <div class="login-page">
            <a style="text-decoration: none; color: black" href="../../index.php"><h1 class="login-title">Login | <span>Page</span></h1></a>
            <div class="login-form">
                <form action="login-check.php" method="POST">
                    <div class="form-input">
                        <input type="text" name="nama_pembeli" id="" placeholder="Inputkan Nama..." required autofocus>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" id="" placeholder="Inputkan Password..." required>
                    </div>
                    <p>Not Registered? <a href="../register/register.php">Register now</a>.</p>
                    <div class="form-submit">
                        <input type="submit" name="login" id="" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>