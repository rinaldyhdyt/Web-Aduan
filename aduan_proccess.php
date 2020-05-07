<?php 
	include "koneksi.php";

	$max = mysql_query("SELECT max(id_pengaduan) as maxKode from pengaduan");
	$row = mysql_fetch_array($max);
	$kode = $row['maxKode'];
	$noUrut = (int) substr($kode, 3, 3);
	$new = $noUrut++;

	$tgl 		= date("Y-m-d H:i:s");
	$nik		= $_POST['nik'];
	$nama		= $_POST['nama'];
	$aduan_foto	= $_FILES['foto']['name'];
	$aduan_tmp	= $_FILES['foto']['tmp_name'];
	$nama_file	= gmdate('dmYhisa').".png";
	$path		= 'foto_aduan/'.$nama_file;
	$lapor		= $_POST['laporan'];
	$status		= "proses";

	if (isset($_POST['ajukan'])) {
		if (move_uploaded_file($aduan_tmp, $path)) {
			$query = mysql_query("INSERT into pengaduan values ('$new', '$tgl', '$nik', '$nama', '$lapor', '$nama_file', '$status')") or die (mysql_error());

			if ($query) {
				header("Location:user_dashboard.php");
				die;
			}else{
				header("Location:aduan.php?pesan=gagal");
			}
		}
	}
 ?>