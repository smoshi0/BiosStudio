<?php
require 'function.php';
session_start();
if($_SESSION['level']!="backend"){
    echo "
        <script>
            alert('Akses Ditolak');
            document.location.href = 'logout.php';
        </script>
    ";
}
$projek = query("SELECT * FROM projek");

if( isset($_POST["cari"])){
    $projek = cari($_POST["keyword"]);
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

    <style>
        td {
            text-align: center;
        }
    </style>

    <!-- Title Page-->
    <title>Menu Utama - Bios Studio</title>
    <link rel="icon" type="image/png" href="main/images/icon.png"/>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="datatables/jquery.dataTables.min.css">
    
    <script src="datatables/jquery-3.5.1.js"></script>
    <script src="datatables/jquery.dataTables.min.js"></script>
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
                        <a href="backend_page.php">
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
                        <a class="logo" href="backend_page.php">
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
                                    <a href="backend_page.php">
                                        <img src="main/images/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="backend_page.php">BIOS STUDIO</a>
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
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- STATISTIC CHART-->
            <section class="statistic-chart">
            </section>
            <!-- END STATISTIC CHART-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">DATA TABEL PROJEK</h3><HR>
                            <div class="table-responsive table-responsive-data3">
                                <table class="table table-data3 table-striped table-earning" id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Projek</th>
                                            <th>Manajer Projek</th>
                                            <th>Anggota</th>
                                            <th>Nilai Projek</th>
                                            <th>Hasil Proposal</th>
                                            <th>Jangka Waktu</th>
                                            <th>Progress</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach( $projek as $row ) : ?>
                                        <tr class="tr-shadow">
                                            <td><?= $i ?></td>
                                            <td><?= $row["nama_projek"]; ?></td>
                                            <td><?= $row["manajer"]; ?></td>
                                            <td>
                                                <?= $row["anggota1"]; ?> <br>
                                                <?= $row["anggota2"]; ?> <br>
                                                <?= $row["anggota3"]; ?>
                                            </td>
                                            <td>Rp.<?= $row["np"]; ?></td>
                                            <td><?= $row["hp"]; ?></td>
                                            <td><?= $row["jw"]; ?> Hari</td>
                                            <?php 
                                            if($row["prog_back"]=="100" && $row["prog_front"]=="100"){
                                                echo"<td><h5 style='color:#218838;'>DONE</h5></td>";
                                            }else{
                                                echo"<td><h5 style='color:#ffc107;'>IN PROGRESS</h5></td>";
                                            }
                                            ?>
                                            <td>
                                                <a href="edit_backend.php?id=<?= $row["id"]; ?>"> <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                            </a>
                                                <a href="detail_backend.php?id=<?= $row["id"]; ?>"> <button type="button" class="btn btn-success btn-sm">Detail</button>
                                            </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                <?php endforeach; ?>
                                    </tbody>
                                    
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

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
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
    <!-- <script src="main/vendor/jquery-3.2.1.min.js"></script> -->
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
