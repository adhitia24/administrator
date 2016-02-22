<?php
include("koneksi.php");
include("func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Manajemen</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="#">Manajemen User</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="#">Manajemen User</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Beranda</a></li>
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Profile User</h2>
			<hr />
			
			<?php
			$nim = $_GET['nim'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<img class="img-responsive img-circle center-block" src="avatar/<?php echo $row['foto']; ?>" width="150"><br />
			<table class="table table-striped">
				<tr>
					<th width="20%">NIM</th>
					<td><?php echo $row['nim']; ?></td>
				</tr>
				<tr>
					<th>NAMA LENGKAP</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>TEMPAT & TANGGAL LAHIR</th>
					<td><?php echo $row['tempat_lahir'].', '.tanggal($row['tanggal_lahir']); ?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>JENIS KELAMIN</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>AGAMA</th>
					<td><?php echo $row['agama']; ?></td>
				</tr>
				<tr>
					<th>JURUSAN</th>
					<td><?php echo $row['jurusan']; ?></td>
				</tr>
				<tr>
					<th>SEMESTER</th>
					<td><?php echo $row['semester']; ?></td>
				</tr>
				<tr>
					<th>TAHUN MASUK</th>
					<td><?php echo $row['tahun_masuk']; ?></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>STATUS</th>
					<td><?php if($row['status'] == 1){ echo 'AKTIF'; }else{ echo 'TIDAK AKTIF'; } ?></td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="edit.php?nim=<?php echo $row['nim']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&nim=<?php echo $row['nim']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>