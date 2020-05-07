<?php 
	include "../koneksi.php";

	$id 	= $_GET['hapus'];

	$query = mysql_query("DELETE tanggapan, pengaduan from tanggapan inner join pengaduan on tanggapan.id_pengaduan = pengaduan.id_pengaduan where tanggapan.id_pengaduan = '$id' ") or die (mysql_error());

	if($query){
		header("Location:petugas_dashboard.php?pesan=berhasil");
	}else{
		echo mysql_error();
	}
 ?>