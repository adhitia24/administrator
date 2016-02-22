<?php
ob_start();
session_start();

mysql_connect("localhost","root","") or die ("can't connect to database");
mysql_select_db("db_bahtera") or die ("database not found ");


if (empty($_POST['id']) || empty($_POST['password'])) {
    echo "<script language='javascript'>alert('Masukan Username atau Password');window.location='index.php'
    </script>";
}
$id = $_POST['id'];
$password = $_POST['password'];
$password2 = md5($password);


$sql = mysql_query("SELECT * from user WHERE id='$id' AND password='$password'") ;
if(mysql_num_rows($sql) > 0){
	$sql2 = mysql_query("SELECT * from user WHERE id='$id'") ;
	while($r2 = mysql_fetch_array($sql2)){ 

		$_SESSION['id'] = $id;
		$_SESSION['password'] = $password;
		
		
		echo "<script>alert('Anda Berhasil Login')</script>";
		echo "<script>window.location='http://localhost/administrator/home.php'</script>" ;	
	}

}else{ 
	echo "<script>alert('Username atau Password anda salah!')</script>";
	echo "<script>window.location='http://localhost/administrator/index.php'</script>" ;
}
?>