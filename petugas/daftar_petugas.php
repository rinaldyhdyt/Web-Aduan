<?php 
	include "../koneksi.php";
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Petugas/Admin | Pengaduan Masyarakat</title>

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../custom/style.css">

		<script type="text/javascript" src="../bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
			<a class="navbar-brand" href="#">Quick Response</a>
		</nav>

		<div class="container mb-5" style="margin-top: 100px;">
			<div class="row">
				<div class="col-lg-6">
					<div class="">
						<h5>Quick Response</h5>
					</div>
					<div class="mr-5 mt-5">
						<p>Quick Response merupakan kanal aduan kemanusiaan bagi masyarakat. Quick Response hadir untuk memberikan solusi atau pertolongan pertama bagi permasalahan yang bersifat kemanusiaan dan darurat.</p>
					</div>
					<div class="daftar mt-5">
						<p>Sudah Punya Akun?</p>
						<div class="buton mb-5">
							<a href="index.php">
								<button class="btn btn-success">Login Disini</button>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 shadow-sm mb-5">
					<div class="nav-cus mt-4">
						<h4 class="text-dark">Daftar Petugas/Admin</h4>
					</div>
					<div class="container mt-5">
						<form action="daftar_proccess.php" method="POST">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="user" class="form-control" placeholder="Username" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>No Telepon</label>
										<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="pass" class="form-control" placeholder="Password" required>
									</div>
								</div>
								
							</div>
							
							
							
							<div class="form-group buton mt-4 mb-5">
								<input type="submit" name="daftar" value="Daftar" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<footer class="page-footer mt-n4">
			<div class="footer-copyright text-center py-3 bg-dark text-light">
				&copy; <?php echo $tahun = gmdate('Y') ?> Quick Response
			</div>
		</footer>

	</body>
</html>