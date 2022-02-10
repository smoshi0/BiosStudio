<?php
session_start();

if ( !isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
} 
?>
<html>
    <head>
        <title>INDEX</title>
    </head>
    <body>
    <a href="projek.php">Project </a>
    <a href="anggota.php">Anggota </a>
    <a href="logout.php">Logout </a>
    </body>
</html>