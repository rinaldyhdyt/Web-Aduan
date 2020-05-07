<?php 
	include "koneksi.php";

	session_start();

	$id = $_GET['id'];
	$query = mysql_query("SELECT * from pengaduan join tanggapan on pengaduan.id_pengaduan = tanggapan.id_pengaduan where pengaduan.id_pengaduan =  '$id'");
	$row = mysql_fetch_array($query);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Balasan | Pengaduan Masyarakat</title>

		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="custom/style.css">

		<script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
			<a class="navbar-brand" href="">Quick Response</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse show" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="user_dashboard.php">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="aduan.php">Ajukan Aduan</a>
					</li>
				</ul>

				<form class="form-inline ml-auto">
					<a href="logout.php">
						<button class="btn btn-danger my-2 my-sm-0" type="button">Logout</button>
					</a>
				</form>
			</div>
		</nav>

		<div class="jumbotron text-center" style="margin-top: 50px; margin-bottom: 0px;">
			<h3>Quick Response</h3>
			<label>Pengaduan Masyarakat</label>
			<br/>
			<label class="mr-5 ml-5" style="font-size: 13px;">Quick Response merupakan kanal aduan kemanusiaan bagi masyarakat. <br/> Quick Response hadir untuk memberikan solusi atau pertolongan pertama bagi permasalahan yang bersifat kemanusiaan dan darurat.</label>
		</div>

		<div class="container mb-5">
			<div class="card mt-5 shadow-sm">
				<div class="card-body">
					<div class="card-title">
						<div class="form-inline">
							<a href="user_dashboard.php"><</a>
							<h6 class="mt-2 ml-3">Balasan</h6>
						</div>
						
					</div>
					<div class="card-text mt-5 ml-4">
						<div class="media p-3">
							<?php echo '<img src="foto_aduan/'.$row['foto'].'" width="120px">' ?>
						
							<div class="media-body ml-4">
								<div class="form-group">
									<label>Nama Pengadu : </label>
									<label><?php echo $row['nama']; ?></label>
								</div>
								<div class="form-inline mt-n4" style="font-size: 13px;">
									<p>Nik Pengadu : </p>
									<p><?php echo $row['nik']; ?></p>
								</div>
								<div class="form-group">
									<label>Isi Laporan : </label>
									<br/>
									<label><?php echo $row['isi_laporan']; ?></label>
								</div>

								<div class="container">
									<hr>
									<span>Tanggapan : </span>
									<div class="media p-3">
										<img src="asset/admin.png" width="60px">
										<div class="media-body ml-4">
											<div class="form-group">
												<label>ID Pembalas : </label>
												<label><?php echo $row['id_petugas']; ?></label>
											</div>

											<div class="form-group">
												<label>Tanggapan : </label>
												<br/>
												<label><?php echo $row['tanggapan']; ?></label>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="page-footer mt-0">
			<div class="footer-copyright text-center py-3 bg-dark text-light">
				&copy; <?php echo $tahun = gmdate('Y') ?> Quick Response
			</div>
		</footer>
	</body>
</html>