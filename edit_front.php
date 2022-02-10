<?php
require 'function.php';
session_start();
if($_SESSION['level']!="front"){
    echo "
        <script>
            alert('Akses Ditolak');
            document.location.href = 'logout.php';
        </script>
    ";
}
$id = $_GET["id"];

$projek = query("SELECT * FROM projek WHERE id = $id")[0];

if( isset($_POST["submit"])){
    if( ubah_front($_POST) > 0 ){
        echo "
            <script>
                alert('Data Project Berhasil Diupdate!');
                document.location.href = 'frontend_page.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Project Gagal Diupdate!');
                document.location.href = 'frontend_page.php';
            </script>
        ";
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
    <title>Edit Data - Bios Studio</title>
    <link rel="icon" type="image/png" href="main/images/icon.png"/>
    <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("end_date").value);
                var pickdt = new Date(document.getElementById("start_date").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("end_date")){
            document.getElementById("jw").value=GetDays();
            }  
        }

    </script>

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
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="frontend_page.php">
                            <img src="main/images/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="main/images/avatar-01.jpg" alt="Bios Studio" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="main/images/avatar-01.jpg" alt="Bios Studio" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $_SESSION['username']; ?></a>
                                            </h5>
                                            <span class="email">bios-studio.com</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="frontend_page.php">
                            <img src="main/images/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    
                </div>
            </div>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="main/images/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">john doe</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="frontend_page.php">
                                        <img src="main/images/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="frontend_page.php">BIOS STUDIO</a>
                                    </h5>
                                    <span class="email">Bios-studio.com</span>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="logout.php">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- STATISTIC CHART-->
            <section class="statistic-chart">
            </section>
            <!-- END STATISTIC CHART-->

            <!-- STATISTIC CHART-->
            <section class="statistic-chart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <div class="statistic-chart-1">
                        <a href="frontend_page.php">
                        <button type="submit" class="btn btn-lg btn-warning mb-3">
                                <i class="fa fa-arrow-left"></i> Kembali
                        </button>
                        </a>
                        <h3 class="title-5 m-b-35">EDIT DATA PROJEK</h3><HR><br>
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="id" value="<?= $projek["id"]; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="prog_front" class=" form-control-label">Progres Front End</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="range" min="0" max="100" step="10" id="prog_front" name="prog_front" placeholder="Progres Front End" class="form-control" value="<?= $projek["prog_front"]; ?>">
                                        <small class="form-text text-muted">0% - 100%</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="note_front" class=" form-control-label">Note dari Front End</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="note_front" name="note_front" placeholder="Note dari Front End" class="form-control" value="<?= $projek["note_front"]; ?>">
                                        <small class="form-text text-muted">Note dari Front End</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-lg btn-primary" name="submit">
                                                <i class="fa fa-dot-circle-o"></i> Edit Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 BIOS STUDIO IT. All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
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
