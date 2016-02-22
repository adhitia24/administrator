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
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	
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
					<li><a href="home.php">Beranda</a></li>
					<li class="active"><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Tambah Data User</h2>
			<hr />
			
			<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			if(isset($_POST['add'])){
				$kode_pengiriman		= aman($_POST['kode_pengiriman']);
				$nama_pengirim		= aman($_POST['nama_pengirim']);
				$jenis_barang  = aman($_POST['jenis_barang']);
                $alamat_tujuan      = aman ($_POST['alamat_tujuan']);
                $nama_penerima      = aman ($_POST['nama_penerima']);
                $no_pengirim        = aman ($_POST['no_pengirim']);
	            $berat              = aman ($_POST['berat']);
	            $tanggal_pemesanan  = aman ($_POST['tanggal_pemesanan']);
                $jenis_paket = aman($_POST['jenis_paket']);
	            $status = aman($_POST['status']);
				
				$cek = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE kode_pengiriman='$kode_pengiriman'");
				if(mysqli_num_rows($cek) == 0){
					if($pass1 == $pass2){
						$pass = md5($pass1);
						$insert = mysqli_query($koneksi, "INSERT INTO `pemesanan`(`kode_pengiriman`, `nama_pengirim`, `jenis_barang`, `alamat_tujuan`, `nama_penerima`, `no_pengirim`, `berat`, `tanggal_pemesanan`, `jenis_paket`, `status`) 
															VALUES('$kode_pengiriman', '$nama_pengirim', '$jenis_barang', '$alamat_tujuan', '$nama_penerima','$no_pengirim', '$berat', '$tanggal_pemesanan', '$jenis_paket', '$status'  )") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Konfirmasi Password tidak sesuai.</div>';
					}
				}else{
					echo '<div class="alert alert-danger">NIM sudah terdaftar.</div>';
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">KODE PENGIRIMAN</label>
					<div class="col-sm-2">
						<input type="text" name="kode_pengiriman" class="form-control" placeholder="KODE PENGIRIMAN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA PENGIRIM</label>
					<div class="col-sm-4">
						<input type="text" name="nama_pengirim" class="form-control" placeholder="NAMA PENGIRIM" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS BARANG</label>
					<div class="col-sm-2">
						<select name="jenis_barang" class="form-control" required>
							<option value="">JENIS BARANG</option>
							<option value="Elektronik">ELEKTRONIK</option>
							<option value="Pakaian">PAKAIAN</option>
                            <option value="Properti">PROPERTI</option>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT TUJUAN</label>
					<div class="col-sm-6">
						<textarea name="alamat_tujuan" class="form-control" placeholder="ALAMAT TUJUAN"></textarea>
					</div> 
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">NOMOR TELEPON PENGIRIM</label>
					<div class="col-sm-4">
						<input type="text" name="no_pengirim" class="form-control" placeholder="NOMOR TELEPON PENGIRIM" required>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">BERAT</label>
					<div class="col-sm-4">
						<input type="text" name="berat" class="form-control" placeholder="BERAT" required>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL PEMESANAN</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal_pemesanan" class="form-control" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS PAKET</label>
					<div class="col-sm-2">
						<select name="jenis_paket" class="form-control" required>
							<option value="">JENIS PAKET</option>
							<option value="Reguler">REGULER</option>
							<option value="Kilat">KILAT</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control" required>
							<option value="">STATUS</option>
							<option value="On Process">On Process</option>
							<option value="On The Road">On The Road</option>
                            <option value="Recieved On Destination">Reiceved On Destination</option>
                            <option value="Failed">Failed</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="index.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>