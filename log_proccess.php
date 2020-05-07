<?php 
	include "koneksi.php";

	session_start();

	$user	= $_POST['user'];
	$pass	= $_POST['pass'];

	if (isset($_POST['login'])) {
		$query = mysql_query("SELECT * from masyarakat where username = '$user' and password = '$pass'") or die (mysql_error());
		$rows = mysql_num_rows($query);

		if ($rows == 1) {
			$_SESSION['login_user'] = $username;
			header("Location:user_dashboard.php");
			die;
		}else{
			header("Location:index.php?pesan=gagal");
		}
	}
 ?>