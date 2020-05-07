<?php 
	include "koneksi.php";

	session_start();

	if (!isset($_SESSION['login_user'])) {
		header("Location:index.php");	
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Beranda | Pengaduan Masyarakat</title>

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

			<div class="container mb-5 text-center">
				<a href="aduan.php">
					<button class="btn btn-success mt-3">Ajukan Pengaduan</button>
				</a>
				
				<form action="" method="GET">
					<div class="card text-center mt-4 shadow-sm">
						<div class="card-body mb-5">
							<div class="card-title text-left">
								<h6>Lacak Pengaduan</h6>
							</div>
							<div class="card-text">
								<input type="text" name="cari" class="form-control mt-3" placeholder="Lacak Nama Pengadu" required>
								<input type="submit" name="lacak" class="btn btn-primary mt-4 buton" value="Lacak">
							</div>
						</div>
					</div>
				</form>

				<?php 
					if (isset($_GET['lacak'])) {
						if (isset($_GET['cari'])) {
							$cari 	= $_GET['cari'];
							$query	= mysql_query("SELECT * FROM pengaduan where nama like '%".$cari."%' order by id_pengaduan desc ") or die (mysql_error());
						}else{ ?>
							<?php echo mysql_error(); ?>
						<?php
						}

						if (mysql_num_rows($query) == 0) { ?>
							<div class="text-left text-danger alert alert-danger alert-dismissible mt-4">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Maaf!</strong> Pengaduan Tidak Dapat Ditemukan!
							</div>
						<?php
						}

						if (isset($_GET['cari'])) {
							if (mysql_num_rows($query) > 0) {
								$cari = $_GET['cari']; ?>
								<div class="text-left mt-3 alert alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<?php echo "<div>Hasil Pencarian dari <strong> ".$cari." </strong> </div>"; ?>
								</div>
							<?php	
							}
						}

						while ($row = mysql_fetch_array($query)) { ?>
							<div class="container mt-3">
								<div class="media border p-3 shadow-sm alert alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<?php echo '<img src="foto_aduan/'.$row['foto'].'" width="120px">'; ?>
									<div class="media-body">
										<div class="form-group text-left ml-4">
											<label>Nama Pengadu :</label>
											<label><?php echo $row['nama']; ?></label>
										</div>
										<div class="form-inline text-left ml-4 mt-n4" style="font-size: 12px;">
											<p>NIK Pengadu :</p>
											<p><?php echo $row['nik']; ?></p>
										</div>
										<div class="form-inline text-left ml-4 mt-n3" style="font-size: 12px;">
											<p>Status :</p>
											<p><?php echo $row['status']; ?></p>
										</div>
										<div class="form-group text-left ml-4">
											<label>Isi Laporan :</label>
											<br/>
											<label class="mt-n4"><?php echo $row['isi_laporan']; ?></label>
										</div>

										<?php 
											
										if ($state = $row['status'] == "sukses") { ?>
											
												<div class="container">
													<hr>
													<div class="form-inline">
													<?php 
														echo '<a href="lihat_balas.php?id='.$row['id_pengaduan'].'" class="ling">Lihat Balasan</a>';
													 ?>
													</div>
												</div>

											<?php
											}
											
										 ?>

									</div>

								</div>
							</div>

						<?php
						}
					}
				?>
				
			</div>

		<footer class="page-footer mt-0">
			<div class="footer-copyright text-center py-3 bg-dark text-light">
				&copy; <?php echo $tahun = gmdate('Y') ?> Quick Response
			</div>
		</footer>

	</body>
</html>