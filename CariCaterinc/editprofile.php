
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Catering</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="image/title.png"/>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap-select-1.12.1/dist/css/bootstrap-select.css">
  <link rel="stylesheet" href="https://developers.google.com/maps/documentation/javascript/demos/demos.css">
  <link rel="stylesheet" type="text/css" href="css/catering.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>

</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
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
            <li><a href="#">Promo</a></li>
            <li><a href="#about">Cari Catering</a></li>
            <li><a href="#contact">Menu Terlaris</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
             <?php
      include_once 'connection.php';
      if(!$user->is_loggedin())
      {
        $user->redirect('login.php');
      }
      $user_id      = $_SESSION['user_session'];
      $query        = $DB_conn->query("SELECT `id` FROM `user` WHERE `user` = '$user_id'");
      $id           = $query->fetch_assoc();
      foreach ($id as $id) {
        
      }
      if($user_id==""){
        ?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li> 
      <?php
      } else {
        ?>
         <li><a href="editprofile.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $user_id; ?></a></li>
      <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php
      }
      if(isset($_POST['btn-signup']))
{
   $name          = trim($_POST['txt_name']);
   $uname         = trim($_POST['txt_uname']);
   $upass         = base64_encode(trim($_POST['txt_upass']));
   $email         = $_POST['email'];
   $telp          = $_POST['telp'];
   $target_dir    = "ProfPict/";
   $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $file          = $_FILES["fileToUpload"]["name"];
   $file_tmp      = $_FILES["fileToUpload"]["tmp_name"];
   $file_size     = $_FILES["fileToUpload"]["size"];
   $uploadOk      = 1;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 
   if($name=="") {
     $error[] = "provide name !"; 
   }
   else if($uname=="") {
     $error[] = "provide username !"; 
   }
   else if($upass=="") {
     $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
     $error[] = "Password must be atleast 6 characters"; 
   }
   else if($email=="") {
     $error[] = "Provide email";
   }
   else if ($telp=="") {
     $error[] = "Provide telephone number";
   }
   else {
      try
      {
            if($user->update($id,$name,$uname,$upass,$email,$telp,$target_file,$target_dir,$file,$file_tmp,$file_size,$uploadOk,$imageFileType)) 
            {
              $user->redirect('?page=edit&changed');
              }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
} 

      ?>
          </ul>
        </div>
      </div>
</nav>
  
<!-- Start Content -->


<div class="container">
  <div class="jumbotron"  style="background-color:#eee;margin-top:10px; margin-bottom:0px;"> 
    <h2>Edit Profil</h2>
    <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                 echo $error;
               }
            }
            else if(isset($_GET['changed']))
            {
                 ?>
                 Data successfuly change!
                 <?php
            }
            ?>
    <hr>
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php
          if ($result[0]['picture']=="") {
            echo "//placehold.it/100";
          }else{
            echo $result[0]['picture'];
          }
            ?>" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" name="fileToUpload" value="<?php echo $result[0]['picture']; ?>" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Data Pribadi</h3>
        
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama :</label>
            <div class="col-lg-8">
              <input class="form-control" name="txt_name" type="text" value="<?php echo $result[0]['name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="<?php echo $result[0]['email']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" name="txt_uname" type="text" value="<?php echo $result[0]['user']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Kata sandi:</label>
            <div class="col-md-8">
              <input class="form-control" name="txt_upass" type="password" value="<?php echo base64_decode($result[0]['password']); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Telephone</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="telp" value="<?php echo $result[0]['telepon']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-warning" name="btn-signup" value="Simpan Perubahan" style="width:150px;">
              <span></span>
              <input type="reset" class="btn btn-default" value="Batal" style="width:150px;">
            </div>
          </div>
        </form>
      </div>
  </div>
  </div>
</div>
<!-- End Content -->
<footer class="footer">
  <div class="container" style="padding: 20px 0px 20px 0px">
        <div class="col-md-3">
            <img src="image/logo.png" alt="Catering" width="150px"><br><br>
            <p> <a  href="">Tentang Kami</a> </p>
            <p> <a  href="">Kunjungi Kami</a> </p>
            <p> <a  href="">Syarat dan Ketentuan</a> </p>
        </div>
        <div class="col-md-6 text-left">
        </div>
        <div class="col-md-3 text-right" style="padding: 0">
          <a class="fa fa-facebook-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
          <a class="fa fa-twitter-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
          <a class="fa fa-youtube-square" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
          <a class="fa fa-instagram" aria-hidden="true" style="margin-right:5px; font-size:60px;"></a>
        </div>
  </div>
</footer>
</body>
</html>

