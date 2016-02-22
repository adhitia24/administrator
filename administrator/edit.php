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
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Edit Data User</h2>
			<hr />
			
			<?php
			$kode_pengiriman = $_GET['kode_pengiriman'];
			$sql = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE kode_pengiriman='$koe_pengiriman '");
			if(mysqli_num_rows($sql) == 0){
				header("Location: home.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
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
				
				$update = mysqli_query($koneksi, "UPDATE `pemesanan` SET `kode_pengiriman`=[$kode_pengiriman],`nama_pengirim`=[$nama_pengirim,`jenis_barang`=[$jenis_barang],`alamat_tujuan`=[$alamat_tujuan],`nama_penerima`=[$nama_penerima],`no_pengirim`=[$no_pengirim],`berat`=[$berat],`tanggal_pemesanan`=[$tanggal_pemesanan],`jenis_paket`=[$jenis_paket],`status`=[$status] WHERE kode_pengirima=$kode_pengiriman ") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nim=".$kode_pengiriman."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success">Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">KODE PENGIRIMAN</label>
					<div class="col-sm-2">
						<input type="text" name="kode_pengiriman" class="form-control" value="<?php echo $row['kode_pengiriman']; ?>" placeholder="KODE PENGIRIMAN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA PENGIRIM</label>
					<div class="col-sm-4">
						<input type="text" name="nama_pengirim" class="form-control" value="<?php echo $row['nama_pengirim']; ?>" placeholder="NAMA PENGIRIM" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS BARANG</label>
					<div class="col-sm-2">
						<select name="jenis_barang" class="form-control" required>
							<option value="Elektronik"  <?php if($row['jenis_barang'] == 'Elektronik'){ echo 'selected'; } ?>>ELEKTRONIK</option>
							<option value="Pakian" <?php if($row['jenis_barang'] == 'Pakaian'){ echo 'selected'; } ?>>PAKAIAN</option>
							<option value="Properti" <?php if($row['jenis_barang'] == 'Properti'){ echo 'selected'; } ?>>PROPERTI</option>
							
						</select>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT TUJUAN</label>
					<div class="col-sm-6">
						<textarea name="alamat_tujuan" class="form-control" value="<?php echo $row['alamat_tujuan']; ?>"  placeholder="ALAMAT TUJUAN"></textarea>
					</div> 
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">NOMOR TELEPON PENGIRIM</label>
					<div class="col-sm-4">
						<input type="text" name="no_pengirim" class="form-control" value="<?php echo $row['no_pengirim']; ?>" placeholder="NOMOR TELEPON PENGIRIM" required>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">BERAT</label>
					<div class="col-sm-4">
						<input type="text" name="berat" class="form-control" value="<?php echo $row['berat']; ?>" placeholder="BERAT" required>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL PEMESANAN</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal_pemesanan" class="form-control" value="<?php echo $row['tanggal_pemesanan']; ?>" placeholder="0000-00-00">
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
							<option value="Reguler"  <?php if($row['jenis_paket'] == 'Reguler'){ echo 'selected'; } ?>>REGULER</option>
							<option value="Pakian" <?php if($row['jenis_paket'] == 'Kilat'){ echo 'selected'; } ?>>KILAT</option>
							<
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control" required>
							<option value="">STATUS</option>
							<option value="On Process" <?php if($row['status'] == 'On process'){ echo 'selected'; } ?>>On Process</option>
							<option value="On The Road" <?php if($row['status'] == 'On The Road'){ echo 'selected'; } ?>>On The Road</option>
                            <option value="Recieved On Destination" <?php if($row['status'] == 'Recieved On Destination'){ echo 'selected'; } ?>>Reiceved On Destination</option>
                            <option value="Failed" <?php if($row['status'] == 'Failed'){ echo 'selected'; } ?>>Failed</option>
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