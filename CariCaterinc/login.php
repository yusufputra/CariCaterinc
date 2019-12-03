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

  <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
  <script src="js/sweetalert2.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>


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
          <a class="navbar-brand" href="#"><img style="max-width:100px; margin-top: -7px;" src="image/logo.png" alt="Catering" ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="">Promo</a></li>
            <li><a href="">Cari Catering</a></li>
            <!-- <li><a href="#contact">Menu Terlaris</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            
            <?php
              $page = isset($_GET['page']) ? $_GET['page'] : '';
              if($page == 'register'){
            ?>
            <li class="active"><a href="?page=register"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
            <li><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
            <?php
              } else {
                ?>
                <li><a href="?page=register"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
            <li class="active"><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
            
              <?php
              }
            ?>
          </ul>
        </div>
      </div>
</nav>

<!--start switch-->
<?php  
$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
  case 'register':
    include_once 'signup.php';
    break;
  case 'login':
    include_once 'home-login.php';
    break;
  default:
    include_once 'home-login.php';
    break;
}
?>
<!--end switch-->

<footer class="footer">
    <div class="container" style="padding: 20px 0px 20px 0px;">
          <div class="col-md-3">
              <img src="image/logo.png" alt="Catering" width="150px"><br><br>
              <p > <a  href="">Tentang Kami</a> </p>
              <p> <a  href="">Kunjungi Kami</a> </p>
              <p> <a  href="">Syarat dan Ketentuan</a> </p>
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
      <p class="text-center" style="color:#5A5A5A">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> CariCatering 2017</p>
    </div>
  </footer>
</body>
</html>

