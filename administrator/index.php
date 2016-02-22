<?php
/**
 * Cara Membuat Website
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Halaman Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4><em class="glyphicon glyphicon-log-in"></em>  Halaman Login</h4>

            <?php 
            /**
             * Pesan Error Bila terjadi kegagalan dalam login
             */
            if (isset($_GET['error']) && $_GET['error'] == 'salah') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Wrong ! </strong> Username dan Password tidak ditemukan
                       </div>'; 
            }?>
            <form id="login" method="post" name="login" action="checklogin.php">
        <fieldset class="login">
            <legend align="center">Bahtera Logistik</legend>
				<div><label >Username</label> <input name="id" type="text"></div>
				<div><label >Password</label> <input name="password" type="password"></div>
        </fieldset>
        <div id="kanan"><input value="Login" type="submit" id="submit" /></div>
        </form>
            <p class="return-home"><a href="./../"><em class="glyphicon glyphicon-menu-left"></em>Halaman Depan</a></p>      
        </div>
    </div>
</div> <!-- End container -->

    <!-- Script js -->
    <script src="./../assets/jquery/jquery.min.js"></script>
    <script src="./../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- End Script -->
</body>
</html>