<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cari Catering</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/title.png"/>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap-select-1.12.1/dist/css/bootstrap-select.css">
	<link rel="stylesheet" href="https://developers.google.com/maps/documentation/javascript/demos/demos.css">
	<link rel="stylesheet" type="text/css" href="css/catering.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- SweetAlert -->
	<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<script src="js/sweetalert2.min.js"></script>
	<!-- // <script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script> -->
	<!-- <link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css"> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>
	<script
	src="https://code.jquery.com/jquery-2.2.4.js"
	integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
	crossorigin="anonymous"></script>
	<!--<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
	</script>-->
	<style type="text/css">
	.numberCircle {
    border-radius: 50%;
    /*behavior: url(PIE.htc);  remove if you don't care about IE8 */

    width: 20px;
    height: 10px;
    padding: 10px;
    

    background: #fff;
    border: 2px solid #666;
    color: #666;
    text-align: center;

    font: 20px Arial, sans-serif;


	}
	.jumbotron{
    	background-color: white;
    }
    .container{
    	width: 90%;
    	margin:  0 auto;
    }
    body{
    	font-family: "Gotham",Arial;
    }
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container" style="margin-top:0;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img style="max-width:100px; margin-top: -7px;" src="image/logo.png" alt="Catering" ></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php
					error_reporting(0);
					$page = isset($_GET['page']) ? $_GET['page'] : '';
					if($page == 'promo') {
						?>
						<li class="active"><a href="?page=promo">Promo</a></li>
						<li><a href="?page=search">Cari Catering</a></li>
						<!-- <li><a href="?page=laris">Menu Terlaris</a></li> -->
						<?php
					} else if ($page == 'search') {
						?>
						<li><a href="?page=promo">Promo</a></li>
						<li class="active"><a href="?page=search">Cari Catering</a></li>
						<!-- <li><a href="?page=laris">Menu Terlaris</a></li> -->
						<?php
					} 

					// else if ($page == 'laris') {
					/* 	?>
						<!-- <li><a href="?page=promo">Promo</a></li>
						<li><a href="?page=search">Cari Catering</a></li>
						<li  class="active"><a href="?page=laris">Menu Terlaris</a></li> -->
						<?php */
					//} 

					else {
						?>
						<li><a href="?page=promo">Promo</a></li>
						<li><a href="?page=search">Cari Catering</a></li>
						<!--<li><a href="?page=laris">Menu Terlaris</a></li>-->
						<?php
					}
					?>
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					$page = isset($_GET['page']) ? $_GET['page'] : '';
					if($page == 'cart') {
						?>
						<li class="active"><a href="?page=cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
						<?php
					} else {
						?>
						<li><a href="?page=cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
						<?php
					}
					include_once 'connection.php';
					// if(!$user->is_loggedin())
					// {
					// 	$user->redirect('login.php');
					// }

					
					$user_id	= $_SESSION['user_session'];
					$query      = $DB_conn->query("SELECT `id` FROM `user` WHERE `user` = '$user_id'");
					$id         = $query->fetch_assoc();
					
					foreach ($id as $id) {
									//print_r($id);
					}

					if($user_id==""){
						?>
						<li><a href="?page=register	"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
						<li><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li> 
						
						<?php
					} else {
						
						$Vorder 	= $DB_conn->query("SELECT * FROM `order` WHERE `penjual` = '$user_id'");
						$row_order 	= $Vorder->num_rows;

						// echo var_dump($row_order);

						$page = isset($_GET['page']) ? $_GET['page'] : '';
						if($page == 'edit') {
							?>
							<li class="active"><a href="?page=edit"><span class="glyphicon glyphicon-user"></span> <?php echo $user_id; ?></a></li>
							<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
							<?php
						} else{
							?>
							<li><a href="?page=edit"><?php if($row_order != 0){ echo "<span class='numberCircle'>". $Vorder->num_rows ."</span>";}else{echo "<span class='glyphicon glyphicon-user'></span>";} ?> <?php echo $user_id; ?></a></li>
							<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
							<?php		
						}

					}
					?>
				</ul>
			</div>
		</div>
	</nav>
		
	
	<!--start switch-->
	<?php
	$query2   = $DB_conn->query("SELECT * FROM `user` WHERE `id` = '$id'");
	$result[]   = $query2->fetch_assoc();

	$page = isset($_GET['page']) ? $_GET['page'] : '';
	switch ($page) {
		case 'edit':
		if ($result[0]['seller'] == 0) {
			include_once 'editprof.php';
		}else{
			include_once 'penjual-edit-profile.php';
		}
		break;
		case 'promo':
		include_once 'promo.php';
		break;
		// case 'laris':
		// include_once 'menu-terlaris.php';
		// break;
		case 'search':
		include_once 'caricatering.php';
		break;
		case 'login':
	    include_once 'home-login.php';
	    break;
		case 'register':
		include_once 'signup.php';
		break;
		case 'cart':
		include_once 'cart.php';
		break;
		case 'profile':
		include_once 'editprof.php';
		break;
		case 'jual':
		include_once 'jual.php';
		break;
		case 'seller':
		include_once 'profile-penjual.php';
		break;
		case 'aboutus':
		include_once 'aboutus.php';
		break;
		case 'visit':
		include_once 'visitus.php';
		break;
		case 'term':
		include_once 'syaratdanketentuan.php';
		break;
		case 'order':
		include_once 'list-order.php';
		break;
		case 'confirm':
		include_once 'cart-confirmation.php';
		break;
		case 'vieworder':
		include_once 'vieworder.php';
		break;
		case 'status-order':
		include_once 'cek-status.php';
		break;
		case 'edit-menu':
		include_once 'edit-menu.php';
		break;
		

		default:
		include_once 'home.php';
		break;
	}
	?>
	<!--end switch-->

	<footer class="footer">
		<div class="container" style="padding: 20px 0px 20px 0px;">
			<div class="col-md-3">
				<img src="image/logo.png" alt="Catering" width="150px"><br><br>
				<p > <a  href="?page=aboutus">Tentang Kami</a> </p>
				<p> <a  href="?page=visit">Kunjungi Kami</a> </p>
				<p> <a  href="?page=term">Syarat & Ketentuan</a> </p>
			</div>
			<div class="col-md-6 text-left">
			</div>
			<div class="col-md-3 text-right" style="padding: 0">
				<br><br><br>
				<p style="color:#fff">Temukan Kami</p>
				<a href="https://www.facebook.com/CariCatering-755447967951549/"target="_blank"class="fa fa-facebook-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
				<a href="https://www.twitter.com/CariCatering/" target="_blank" class="fa fa-twitter-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
				<a class="fa fa-youtube-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
				<a href="https://www.instagram.com/caricatering2/" target="_blank" class="fa fa-instagram" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
			</div>
			<br>
		</div>
		<div class="container-fluid" style=" background-color:#1D1D1D; padding:10px">
			<div class="pull-right hidden-xs">
      			<b>Version</b> 1.0
    		</div>
		    <strong>Copyright &copy; 2017 Cari Catering.</strong> All rights
		    reserved.
		</div>
	</footer>
</body>
</html>
