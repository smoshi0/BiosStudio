<?php
require 'function.php';

if( isset($_POST["register"])){
    if( registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
                </script>";
                
                       
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register - BIOS STUDIO</title>
	<link rel="icon" type="image/png" href="main/images/icon.png"/>
    <!-- Fontfaces CSS-->
    <link href="main/css/font-face.css" rel="stylesheet" media="all">
    <link href="main/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="main/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="main/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="main/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="main/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="main/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="main/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
						<img style="width: 80px; height: 80px;" src="main/images/bios.png" alt=""><br>
						<h3 class="m-t-20">REGISTER</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input class="au-input au-input--full" type="password" id="password2" name="password2" placeholder="Konfirmasi Password">
                                </div>
								<div class="form-group">
								<label>Hak Akses</label>
								<select name="level" id="level" class="form-control" required>
									<option value="admin">Admin</option>
									<option value="analis">Sistem Analis</option>
									<option value="backend">Back End Programmer</option>
									<option value="front">Front End Programmer</option>
								</select>
								</div>
                                <div class="login-checkbox">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="register" type="submit">Register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Sudah Memiliki Akun? 
                                    <a href="login.php">Klik Disini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="main/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="main/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="main/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="main/vendor/slick/slick.min.js">
    </script>
    <script src="main/vendor/wow/wow.min.js"></script>
    <script src="main/vendor/animsition/animsition.min.js"></script>
    <script src="main/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="main/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="main/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="main/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="main/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="main/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="main/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="main/js/main.js"></script>

</body>

</html>
<!-- end document-->