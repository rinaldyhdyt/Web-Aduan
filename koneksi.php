<?php 
	$server		= "localhost";
	$username	= "root";
	$password	= "";
	$db			= "pengaduan_2";

	$konek = mysql_connect($server, $username, $password);

	if ($konek) {
		$pilih = mysql_select_db($db);
	}else{
		echo mysql_error();
	}
 ?>