<?php 
	include "../koneksi.php";

	session_start();

	$id_pengaduan = $_POST['id_pengaduan'];
	$id_tugas = $_SESSION['id'];
	$tgl = date("Y-m-d H:i:s");
	$tanggap = $_POST['isi'];

	if (isset($_POST['tanggapan'])) {
		$query = mysql_query("INSERT into tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) values ('$id_pengaduan', '$tgl', '$tanggap', '$id_tugas') ") or die (mysql_error());

		if ($query) {
			$query = mysql_query("UPDATE pengaduan set status = 'sukses' where id_pengaduan = '$id_pengaduan' ");
			header("Location:index.php");
		}else{
			echo mysql_error();
		}
	}
 ?>