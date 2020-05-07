<?php 
	include "../koneksi.php";

	session_start();

	$user	= $_POST['user'];
	$pass	= $_POST['pass'];

	if (isset($_POST['login'])) {
		$query = mysql_query("SELECT * from petugas where username = '$user' and password = '$pass'") or die (mysql_error());
		$rows = mysql_num_rows($query);

		if ($rows > 0) {
			$level = mysql_fetch_array($query);

			if ($level['level']=="Petugas") {
				$_SESSION['login_petugas'] = $username;
				$_SESSION['level'] = "Petugas";
				$_SESSION['id'] = $level['id_petugas'];

				header("Location:petugas_dashboard.php");
			}else if ($level['level']=="Admin"){
				$_SESSION['login_admin'] = $username;
				$_SESSION['level'] = "Admin";
				$_SESSION['id'] = $level['id_petugas'];
				$_SESSION['nama'] = $level['nama_petugas'];

				header("Location:../admin/index.php");
			}else{
				header("Location:index.php?pesan=gagal");
			}
		}else{
			header("Location:index.php?pesan=gagal");
		}
	}
 ?>