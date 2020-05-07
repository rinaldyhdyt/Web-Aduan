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
		       		<a href="daftar_tugas.php" class="list-group-item list-group-item-action bg-light">Daftarkan Petugas</a>
		       		<a href="../cetak/cetak-pdf.php" class="list-group-item list-group-item-action bg-light aktip">Generate Laporan</a>
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
		      		<?php 
						if (isset($_GET['pesan'])) {
							if ($_GET['pesan'] == "berhasil") { ?>
								<div class="alert alert-success fade show alert-dismissible mt-4">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Berhasil!</strong> Menanggapi Pengaduan Berhasil!
								</div>
							<?php	
							}elseif ($_GET['pesan'] == "berhasil_daftar") { ?>
								<div class="alert alert-success fade show alert-dismissible mt-4">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Berhasil!</strong> Berhasil Membuat Akun Petugas!
								</div>
							<?php	
							}
						}
						?>
		      		<div class="card mb-5">
		      			<div class="card-body">
		      				<div class="card-title">
		      					<h6>Generate Laporan</h6>
		      					<form class="form-inline ml-auto">
									<a href="../cetak/cetak-pdf.php">
										<button class="btn btn-primary my-2 my-sm-0" type="button" name="cetak">Cetak</button>
									</a>
								</form>
		      				</div>
		      				<div class="card-text">
		      					<div class="table-responsive">
		      						<table class="table mt-4 table-hover">
		      							<thead class="thead-light">
		      								<tr>
		      									<th>No</th>
		      									<th>ID Tanggapan</th>
		      									<th>ID Petugas</th>
		      									<th>ID Pengaduan</th>
		      									<th>Tanggal Aduan</th>
		      									<th>Laporan</th>
		      									<th>Tanggapan</th>
		      									<th>Foto</th>
		      									<th>Status</th>
		      								</tr>
		      							</thead>

		      							<?php 
		      								$query = mysql_query("SELECT * from pengaduan join tanggapan") or die (mysql_error());

		      								if (mysql_num_rows($query) == 0) { ?>
		      									<tr>
		      										<td colspan="9" class="text-center">Belum Ada Data!</td>
		      									</tr>

		      								<?php
		      								}

		      								$no = 1;
		      								while ($row = mysql_fetch_array($query)) {?>
		      									<tbody>
		      										<tr>
		      											<td><?php echo $no; ?></td>
		      											<td><?php echo $row['id_tanggapan']; ?></td>
		      											<td><?php echo $row['id_petugas']; ?></td>
		      											<td><?php echo $row['id_pengaduan']; ?></td>
		      											<td><?php echo $row['tgl_pengaduan']; ?></td>
		      											<td><?php echo $row['isi_laporan']; ?></td>
		      											<td><?php echo $row['tanggapan']; ?></td>
		      											<td><?php echo '<img src="../foto_aduan/'.$row['foto'].'" width="60px">' ?></td>
		      											<td><?php echo $row['status']; ?></td>
		      										</tr>
		      									</tbody>

		      								<?php
		      								$no++;
		      								}
		      							 ?>
		      						</table>
		      					</div>
		      				</div>
		      			</div>
		      		</div>
		      	</div>
		    </div>
		  </div>
	</body>
</html>