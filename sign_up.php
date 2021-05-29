<?php
    require "function.php";
    if( isset( $_POST["register"])){
        $pesanError1 = checkExistingUsername($_POST["username"]);
        $pesanError2 = confirmPassword($_POST["password"], $_POST["confirmpassword"]);

        if($pesanError1 && $pesanError2 == true){
            $registrasi = registrasi(koneksiDatabase("salesorder"), $_POST);
            if($registrasi > 0 ){
                phpAlert("Anda telah teregistrasi.");
            }else{
                $pesanError3 = mysqli_error(koneksiDatabase('salesorder'));
                phpAlert(($pesanError3));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <title>Register</title>
</head>

<body>
    <div class="kontener">
        <div class="header">
            <h1>Sign Up</h1>
        </div>
        <div class="content">
            <form action="" method="POST">
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autofocus required>
                </div>
                <?php global $pesanError1; ?>
                <?php if($pesanError1 === false) : ?>
                    <p>ERROR: <?= "Username sdh ada, pilih username lain"; ?> </p>
                <?php endif; ?>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="input-box">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" required>
                </div>
                <?php global $pesanError2; ?>
                <?php if($pesanError2 === false) : ?>
                    <p>ERROR: <?= "Password tidak sesuai."; ?> </p>
                <?php endif; ?>
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div>
        <div class="footer">
            <h2> Have an Account? </h2>
            <a href="sign_in.php"> Login </a>
        </div>
    </div>
</body>
</html>