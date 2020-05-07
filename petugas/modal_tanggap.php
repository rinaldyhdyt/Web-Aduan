<?php 
	$id = $_GET['tanggapi'];

	$query = mysql_query("SELECT * from pengaduan where id_pengaduan = '$id'") or die (mysql_error());

	if ($query) {
		header("Location:petugas_dashboard.php?hasil=berhasil");
	}
 ?>