<?php 
	include "../koneksi.php";

	session_start();

	if (!isset($_SESSION['login_petugas'])) {
		header("Location:index.php");
	}

	$id = $_GET['tanggapi'];
	$query = mysql_query("SELECT * from pengaduan where id_pengaduan = '$id' ");
	$row = mysql_fetch_array($query);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Beranda | Pengaduan Masyarakat</title>

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../custom/style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/sidebar/css/simple-sidebar.css">

		<script type="text/javascript" src="../bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="d-flex" id="wrapper">
		    <div class="bg-light border-right" id="sidebar-wrapper">
		      	<div class="sidebar-heading">Quick Response</div>
		      	<div class="list-group list-group-flush">
		       		<a href="petugas_dashboard.php" class="list-group-item list-group-item-action bg-light">Pengaduan</a>
		      	</div>
		    </div>

		    <div id="page-content-wrapper">
		      	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
					<a class="navbar-brand" href="">Form</a>

					<span class="text-dark mt-1" style="font-size: 13px;">Petugas</span>

					<form class="form-inline ml-auto">
						<a href="../petugas/logout.php">
							<button class="btn btn-danger my-2 my-sm-0" type="button" name="logout_admin">Logout</button>
						</a>
					</form>
				</nav>

		      	<div class="container mt-4">
		      		<?php 
						if (isset($_GET['pesan'])) {
							if ($_GET['pesan'] == "berhasil") { ?>
								<div class="alert alert-success fade show alert-dismissible mt-4">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Berhasil!</strong> Menghapus Pengaduan Berhasil!
								</div>
							<?php	
							}
						}
					?>
		      		<div class="form-group">
		      			<h5>Tanggapi Aduan</h5>
		      		</div>
					<div class="media border p-3">
						<?php echo '<img src="../foto_aduan/'.$row['foto'].'" width="120px">'; ?>
						<div class="media-body ml-4">

							<div class="form-group">
								<label>Nama Pengadu : </label>
								<label><?php echo $row['nama']; ?></label>								
							</div>
							<div class="form-inline mt-n4" style="font-size: 13px;">
								<p>NIK Pengadu : </p>
								<p><?php echo $row['nik']; ?></p>
							</div>
							<div class="form-group">
								<label>Isi Laporan : </label>
								<br/>
								<label><?php echo $row['isi_laporan']; ?></label>							
							</div>
							<hr>
							<form action="tanggapan_proccess.php" method="POST">
								<input type="text" value="<?php echo $row['id_pengaduan']; ?>" name="id_pengaduan" style="display: none;">
								<div class="form-group">
									<label>Isi Tanggapan</label>
									<textarea name="isi" class="form-control" rows="5" placeholder="Isi Tanggapan Anda" required></textarea>
								</div>
								<input type="submit" name="tanggapan" class="btn btn-primary buton" value="Kirim">
							</form>

						</div>
					</div>
		      	</div>
		    </div>
		  </div>
	</body>
</html>