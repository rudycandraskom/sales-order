<?php
    require "function.php";
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $koneksiDB= koneksiDatabase("salesorder");
        $perintahSQL = "SELECT * FROM user WHERE username = '$username'";
        $userResult = mysqli_query($koneksiDB, $perintahSQL);
        if(mysqli_num_rows($userResult) === 1 ) {
            $resultArray = mysqli_fetch_assoc( $userResult );
            if(password_verify($password, $resultArray["password"])) {
                mysqli_query(koneksiDatabase(), "UPDATE user SET last_login = date('Y-m-d H:i:s') WHERE username = '$username'");
                header("Location:produk_table.php");
                exit;
            } 
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <title>Login</title>
</head>

<body>
    <div class="kontener">
        <div class="header">
            <h1>Login</h1>
        </div>
        <div class="content">
            <?php if(isset($error)) : ?>
                <p>ERROR: Username / Password salah!! </p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autofocus required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        <div class="footer">
            <h2> Don't have an Account? </h2>
            <a href="sign_up.php"> Sign Up </a>
        </div>
    </div>
</body>

</html>