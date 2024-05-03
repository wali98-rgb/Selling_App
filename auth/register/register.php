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
    
    <title>Register Page</title>

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
            margin: 6rem 0 0;
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
        
        .login .login-page .login-form form .form-input input, textarea {
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
            height: 1rem;
        }
        
        .login .login-page .login-form form .form-input-jk input {
            margin: 1rem 0;
        }

        .login .login-page .login-form form p {
            margin: 0 0 1rem;
            font-size: 1rem;
        }

        .login .login-page .login-form form p a {
            text-decoration: none;
            color: blue;
        }

        .login .login-page .login-form form .form-submit input {
            padding: .5rem 1rem;
            width: 100%;
            background-color: green;
            color: white;
            border-radius: .5rem;
            border: none;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .login .login-page .login-form form .form-submit input:hover {
            cursor: pointer;
            background-color: darkgreen;
            color: white;
        }

        .login .login-page .login-form form .form-submit .btn-reset {
            margin: .5rem 0;
            padding: .5rem 1rem;
            width: 100%;
            background-color: var(--secondary);
            color: black;
            border-radius: .5rem;
            border: none;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .login .login-page .login-form form .form-submit .btn-reset:hover {
            cursor: pointer;
            background-color: rgb(210, 210, 0);
            color: black;
        }
    </style>
</head>
<body>
    <section class="login">
        <div class="login-page">
            <h1 class="login-title">Register | <span>Page</span></h1>
            <div class="login-form">
                <form action="register-act.php" method="POST">
                    <div class="form-input">
                        <input type="text" name="nama_pembeli" id="" placeholder="Inputkan Nama..." required autofocus>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" id="" placeholder="Inputkan Password..." required>
                    </div>
                    <div class="form-input">
                        <textarea name="alamat" id="" cols="10" rows="10" required placeholder="Inputkan Alamat..."></textarea>
                    </div>
                    <div class="form-input-jk">
                        <label for="">Jenis Kelamin : &nbsp;</label>
                        <input type="radio" name="j_kelamin" id="laki_laki" value="Laki-laki" required><label for="laki_laki">&nbsp; Laki-laki &nbsp;</label>
                        <input type="radio" name="j_kelamin" id="perempuan" value="Perempuan" required><label for="perempuan">&nbsp; Perempuan &nbsp;</label>
                    </div>
                    <div class="form-input">
                        <input type="text" name="pekerjaan" id="" placeholder="Inputkan Pekerjaan..." required>
                    </div>
                    <p>Haven't Account? <a href="../login/login.php">Login</a>.</p>
                    <div class="form-submit">
                        <input type="submit" name="regis" id="" value="Register">
                        <input class="btn-reset" type="reset" name="reset" id="" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>