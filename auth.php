<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

$error='';
if (isset($_POST['login'])){
	if	(empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password Tidak Valid!";

}else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Username atau Password Salah!');\n";
				echo "window.location='index.php'";
				echo "</script>";
			}

// menangkap data yang dikirim dari form login
		$username = $_POST['username'];
		$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
		$login = mysql_query("select * from users where username='$username' and password=md5('$password')");
// menghitung jumlah data yang ditemukan
		$cek = mysql_num_rows($login);

// cek apakah username dan password di temukan pada database
		if($cek > 0){

			$data = mysql_fetch_assoc($login);

	// cek jika user login sebagai admin
			if($data['level']=="1"){

		// buat session login dan username
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "1";
		// alihkan ke halaman dashboard admin
				header("location:dashboard/index.php");

	// cek jika user login sebagai pegawai
			}else if($data['level']=="2"){
		// buat session login dan username
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "2";
		// alihkan ke halaman dashboard pegawai
				header("location:user/index.php");

			
		}
	}
}
?>