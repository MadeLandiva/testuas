<?php
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
        
<div class="container" style="width: 400px; margin: 10% auto; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; border-radius:10px">
        <div id="container" style="padding:20px 10px;">
            <h1 class="auth-title">Log in</h1>

            <form method="POST">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="pass" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
            </form>
        </div>

        <?php 
            if(isset($_POST['login'])){
                $username = mysqli_real_escape_string($koneksi,$_POST['username']);
                $pass = mysqli_real_escape_string($koneksi,$_POST['pass']);

                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE nim='$username' AND pass='$pass' ");
                $cek = mysqli_num_rows($sql);
                $data = mysqli_fetch_assoc($sql);

                $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND pass='$pass' ");
                $cek2 = mysqli_num_rows($sql2);
                $data2 = mysqli_fetch_assoc($sql2);

                if($cek>0){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['data']=$data;
                    header('location:index.php');
                }
                elseif($cek2>0){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['data']=$data2;
                    header('location:dashboard.php');
                }
                else{
                    echo "<script>alert('Login Tidak Berhasil')</script>";
                }
            }
        ?>

</div>
</body>

</html>
