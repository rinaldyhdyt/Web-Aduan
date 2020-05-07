<?php 
	include "../koneksi.php";

	$nama	= $_POST['nama'];
	$user	= $_POST['user'];
	$pass	= $_POST['pass'];
	$telp	= $_POST['telp'];
	$level	= "Petugas";

	$query = mysql_query("INSERT into petugas (nama_petugas, username, password, telp, level) values ('$nama', '$user', '$pass', '$telp', '$level')") or die (mysql_error());

	if ($query) {
		header("Location:index.php?pesan=berhasil_daftar");
		die;
	}else{
		header("Location:daftar_tugas.php?pesan=gagal");
		die;
	}
 ?>