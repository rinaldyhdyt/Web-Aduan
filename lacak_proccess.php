<?php 
	if (isset($_GET['cari'])) {
		$cari 	= $_GET['cari'];
		$query	= mysql_query("SELECT * from pengaduan like '%".$cari."%'");

		if ($query) {
			header("Location:user_dashboard.php");
		}
	}else{
		header("Location:user_dashboard.php");
	}
?>