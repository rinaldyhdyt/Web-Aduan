<?php 
	include "../koneksi.php";

	session_start();

	if (!isset($_SESSION['login_petugas'])) {
		header("Location:index.php");
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
		      		<div class="card mb-5">
		      			<div class="card-body">
		      				<div class="card-title">
		      					<h6>Aduan Yang Masuk</h6>
		      				</div>
		      				<div class="card-text">
		      					<div class="table-responsive">
		      						<table class="table mt-4 table-hover">
		      							<thead class="thead-light">
		      								<tr>
		      									<th>No</th>
		      									<th>ID</th>
		      									<th>Tanggal</th>
		      									<th>NIK</th>
		      									<th>Nama</th>
		      									<th>Laporan</th>
		      									<th>Foto</th>
		      									<th>Status</th>
		      									<th>Aksi</th>
		      								</tr>
		      							</thead>

		      							<?php 
		      								$query = mysql_query("SELECT * from pengaduan order by id_pengaduan asc") or die (mysql_error());

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
		      											<td><?php echo $row['id_pengaduan']; ?></td>
		      											<td><?php echo $row['tgl_pengaduan']; ?></td>
		      											<td><?php echo $row['nik']; ?></td>
		      											<td><?php echo $row['nama']; ?></td>
		      											<td><?php echo $row['isi_laporan']; ?></td>
		      											<td><?php echo '<img src="../foto_aduan/'.$row['foto'].'" width="60px">' ?></td>
		      											<td><?php echo $row['status']; ?></td>
		      											<td><?php echo '<a href="tanggapan.php?tanggapi='.$row['id_pengaduan'].'"><img src="../asset/reply.png" class="img-thumbnail" width="30px" title="Tanggapi"></a> <a href="delete_aduan.php?hapus='.$row['id_pengaduan'].'"><img src="../asset/delete.png" class="img-thumbnail" width="30px" title="Hapus"></a>'; ?></td>
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