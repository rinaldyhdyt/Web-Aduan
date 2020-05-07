<?php 
	session_start();

	if (!isset($_SESSION['login_user'])) {
		header("Location:index.php");
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ajukan Aduan | Pengaduan Masyarakat</title>

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
						<a class="nav-link" href="user_dashboard.php">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="aduan.php">Ajukan Aduan</a>
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
			<?php 
				if (isset($_GET['pesan'])) {
					if ($_GET['pesan'] == "berhasil") { ?>
						<div class=" text-success alert alert-dismissible mt-4">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Berhasil!</strong> Pengaduan Anda Berhasil Di Kirim dan Sedang di Tinjau!
						</div>
					<?php	
					}else{ ?>
						<div class="text-danger alert alert-dismissible mt-4">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Gagal!</strong> Mohon Isi Formulir dengan Benar!
						</div>
					<?php
					}
				}
			?>
			<div class="card mt-4 shadow-sm">
				<div class="card-title">
					<h6 class="ml-3 mt-3">Ajukan Pengaduan Baru</h6>
				</div>
				<div class="card-text ml-4 mr-4">
					<form action="aduan_proccess.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="number" name="nik" class="form-control" placeholder="Nomor Induk Keluarga Pelapor" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Foto</label>
									<div class="custom-file">
										<input type="file" name="foto" class="custom-file-input" id="customFile">
										<label class="custom-file-label" for="customFile">Pilih Foto</label>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Nama Pelapor" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="lapor">Laporan</label>
							<textarea class="form-control" id="lapor" rows="5" placeholder="Isi Laporan/Pengaduan Anda Disini" name="laporan" required></textarea>
						</div>

						<input type="submit" name="ajukan" class="btn btn-primary mb-5 buton" value="Kirim"></input>
					</form>
					
					
				</div>
			</div>
		</div>

		<footer class="page-footer mt-5">
			<div class="footer-copyright text-center py-3 bg-dark text-light">
				&copy; <?php echo $tahun = gmdate('Y') ?> Quick Response
			</div>
		</footer>

		<script>
			$(".custom-file-input").on("change", function() {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		</script>

	</body>
</html>