<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin CariCatering | Dashboard</title>
  <link rel="shortcut icon" href="../image/title.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
  <script src="../js/sweetalert2.min.js"></script>

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once '../connection.php'; ?>

  <header class="main-header"  >
    <!-- Logo -->
    <a href="index.php" class="logo" style="background-color: #F96007">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img style="max-width:25px; height:15px; margin-top: -7px;" src="../image/title.png" alt="Catering" ></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="max-width:100px; margin-top: -7px; " src="../image/logo.png" alt="Catering" ></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #F96007">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            
                <?php
                include_once '../connection.php';
                
          if(!$user->is_loggedin())
          {
            $user->redirect('../login.php');
          }
          
          $user_id  = $_SESSION['user_session'];
          $query      = $DB_conn->query("SELECT * FROM `user` WHERE `user` = '$user_id'");
          $result[]         = $query->fetch_assoc();
          ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo "../". $result[0]['picture'] ?>" style="width:25px;height:25px;" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $result[0]['name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo "../". $result[0]['picture'] ?>" style="width:90px;height:90px;" class="img-circle" alt="User Image">

                <p>
                  <?php echo $result[0]['name'] ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../logout.php?logout=true" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Kontrol User</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=penjual"><i class="fa fa-circle-o"></i>Penjual </a></li>
            <li><a href="?page=pembeli"><i class="fa fa-circle-o"></i>Pembeli </a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Halaman Depan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=slider"><i class="fa fa-circle-o"></i>Slider</a></li>
            <!-- <li><a href="?page=terlaris"><i class="fa fa-circle-o"></i>Menu Terlaris </a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="?page=order">
            <i class="fa fa-shopping-cart"></i>
            <span>Order </span>
          </a>
        </li>
        <li class="treeview">
          <a href="?page=promo">
            <i class="fa fa-tags"></i>
            <span>Promo </span>
          </a>
        </li>
        <li class="treeview">
          <a href="?page=produk">
            <i class="fa  fa-cutlery"></i>
            <span>Produk </span>
          </a>
        </li>
        <li class="treeview">
          <a href="?page=komentar">
            <i class="fa  fa-comment"></i>
            <span>Komentar </span>
          </a>
        </li>
      </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
<?php
  $page = isset($_GET['page']) ? $_GET['page'] : '';
    switch ($page) {
      case 'penjual':
        include_once 'penjual.php';
        break;

      case 'pembeli':
        include_once 'pembeli.php';
        break;

      case 'slider':
        include_once 'slider.php';
        break;

      case 'terlaris':
       include_once 'terlaris.php';
       break; 

      case 'order':
       include_once 'order.php';
       break; 

      case 'promo':
       include_once 'promo.php';
       break; 

      case 'produk':
       include_once 'produk.php';
       break; 

      case 'komentar':
       include_once 'komentar.php';
       break; 

      case 'editseller':
        include_once 'penjual-edit.php';
        break;

      case 'editbuyer':
        include_once 'pembeli-edit.php';
        break;

      case 'delete':
        include_once 'penjual-delete.php';
        break;

      case 'delete-buyer':
        include_once 'pembeli-delete.php';
        break;

      case 'deletepromo':
        include_once 'promo-delete.php';
        break;

      case 'editpromo':
        include_once 'promo-edit.php';
        break;

      case 'delete-product':
        include_once 'produk-delete.php';
        break;

      case 'editproduct':
        include_once 'produk-edit.php';
        break;

      case 'deletekomentar':
        include_once 'deletekomentar.php';
        break;

      case 'addslider':
        include_once 'addslider.php';
        break;

      case 'deleteslider':
        include_once 'deleteslider.php';
        break;

      case 'editslider':
        include_once 'editslider.php';
        break;

      default:
        include_once 'dashboard.php';
        break;
  }
?>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://caricatering.com" style="color:#333">Cari Catering</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
