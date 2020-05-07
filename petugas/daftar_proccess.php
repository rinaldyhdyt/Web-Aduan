<?php 
	include "../koneksi.php";

	$nama	= $_POST['nama'];
	$user	= $_POST['user'];
	$pass	= $_POST['pass'];
	$telp	= $_POST['telp'];
	$level	= "Admin";

	$query = mysql_query("INSERT into petugas (nama_petugas, username, password, telp, level) values ('$nama', '$user', '$pass', '$telp', '$level')") or die (mysql_error());

	if ($query) {
		header("Location:index.php");
		die;
	}else{
		echo "Gagal Login";
	}
 ?>