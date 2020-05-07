<?php 
	include "koneksi.php";

	$nik	= $_POST['nik'];
	$nama	= $_POST['nama'];
	$user	= $_POST['user'];
	$pass	= $_POST['pass'];
	$telp	= $_POST['telp'];

	$query = mysql_query("INSERT into masyarakat values ('$nik', '$nama', '$user', '$pass', '$telp')") or die (mysql_error());

	if ($query) {
		header("Location:index.php");
		die;
	}else{
		header("Location:daftar.php?pesan=gagal");
	}
 ?>