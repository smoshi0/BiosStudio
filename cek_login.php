<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'function.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where username='$username'");
// menghitung jumlah data yang ditemukan

$cek = mysqli_num_rows($login);

if( mysqli_num_rows($login) === 1 ){
	$data = mysqli_fetch_assoc($login);
	if( password_verify($password, $data["password"])){
		if($data['level']=="admin"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:admin_page.php");
		// cek jika user login sebagai pegawai
		}else if($data['level']=="analis"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "analis";
			// alihkan ke halaman dashboard admin
			header("location:analis_page.php");
		}else if($data['level']=="front"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "front";
			header("location:frontend_page.php");
		}else if($data['level']=="backend"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "backend";
			header("location:backend_page.php");
		}	
	}
}
?>