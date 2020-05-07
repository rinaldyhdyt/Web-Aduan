<?php 
	include "../koneksi.php";

	session_start();

	if (!isset($_SESSION['login_admin'])) {
		header("Location:../petugas/index.php");
	}
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
		       		<a href="index.php" class="list-group-item list-group-item-action bg-light">Pengaduan</a>
		       		<a href="daftar_tugas.php" class="list-group-item list-group-item-action bg-light aktip">Daftarkan Petugas</a>
		       		<a href="generate_report.php" class="list-group-item list-group-item-action bg-light">Generate Laporan</a>
		      	</div>
		    </div>

		    <div id="page-content-wrapper">
		      	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
					<a class="navbar-brand" href="">Form</a>

					<span class="text-dark mt-1" style="font-size: 13px;">Administrators</span>

					<form class="form-inline ml-auto">
						<a href="../petugas/logout.php">
							<button class="btn btn-danger my-2 my-sm-0" type="button" name="logout_admin">Logout</button>
						</a>
					</form>
				</nav>

		      	<div class="container mt-4">
		      		
		      		<div class="card mb-5">
		      			<div class="card-body">
		      				<div class="card-text">
		      					<div class="container">
		      						<div class="nav-cus mt-4">
										<h4 class="text-dark">Daftar Akun Petugas</h4>
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
		      		</div>
		      	</div>
		    </div>
		  </div>
	</body>
</html>