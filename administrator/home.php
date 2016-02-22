<?php
include("koneksi.php");
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
					<li class="active"><a href="home.php">Beranda</a></li>
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Data User</h2>
			<hr />
			
			<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			if(isset($_GET['aksi']) == 'delete'){
				$kode_pengiriman = $_GET['kode_pengiriman'];
				$cek = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE kode_pengiriman='$kode_pengiriman'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE kode_pengiriman='$kode_pengiriman'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="urut" class="form-control" onchange="form.submit()">
						<option value="0">Filter</option>
						<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
						<option value="1" <?php if($urut == '1'){ echo 'selected'; } ?>>Mahasiswa Aktif</option>
						<option value="2" <?php if($urut == '2'){ echo 'selected'; } ?>>Mahasiswa Tidak Aktif</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>NO.</th>
					<th>KODE PENGIRIMAN</th>
					<th>NAMA PENGIRIM</th>
					<th>JENIS BARANG</th>
					<th>NAMA PENERIMA</th>
					<th>ALAMAT TUJUAN</th>
					<th>STATUS</th>
					<th>SETTING</th>
				</tr>
				<?php
				if($urut){
					$sql = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status='$urut' ORDER BY kode_pengiriman ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY kode_pengiriman ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['kode_pengiriman'].'</td>
							<td>'.$row['nama_pengirim'].'</td>
							<td>'.$row['jenis_barang'].'</td>
							<td>'.$row['nama_penerima'].'</td>
							<td>'.$row['alamat_tujuan'].'</td>
							<td>';
							if($row['status'] == 1){
								echo '<span class="label label-success">Aktif</span>';
							}else{
								echo '<span class="label label-warning">Tidak Aktif</span>';
							}
						echo '
							</td>
							<td>
								<a href="profile.php?nim='.$row['kode_pengiriman'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
								<a href="edit.php?kode_pengiriman='.$row['kode_pengiriman'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="password.php?nim='.$row['kode_pengiriman'].'" title="Ganti Password"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
								<a href="avatar.php?nim='.$row['kode_pengiriman'].'" title="Ganti Password"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&kode_pengiriman='.$row['kode_pengiriman'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>