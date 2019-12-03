
<?php
require_once 'function.php';

if($user->is_loggedin()!="")
{
  $user_name  = $_SESSION['user_session'];
    $query    = $DB_conn->query("SELECT `seller` FROM `user` WHERE `user` = '$user_name'");
    $status   = $query->fetch_assoc();

    if ($status['seller'] == 2) {
      $user->redirect('admin/index.php');
    }
    else {
      $user->redirect('index.php');
    }
} 

if(isset($_POST['btn_login']))
{
  $uname = $_POST['uname'];
  $upass = $_POST['upass'];

  if($user->login($uname,$upass))
  { 
  }else
  {
    $error = "<script>
        swal(
        'Gagal Masuk',
        'Password dan username tidak sesuai',
        'error'
         ) ; 
      </script>";
  }
}
?>

<!--Content Start-->
<div class="container">
<div class="jumbotron" style="margin-top:50px; margin-bottom:0; ">
  <br>
  <div class="row">
    <div class="col-md-7 col-sm-7">
      <h3 style="padding-left:0.5em;">Mengapa Cari Catering?</h3><br>
      <div class="media">
        <div class="media-left">
          <span>
            <img class="media-object" src="image/login1.png" alt="login-image">
          </span>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><b>Pemesanan Cepat dan Efisien</b></h4>
          <p style="font-size: 14px; text-align: justify;">Kami hadir sebagai jasa penyedia catering yang sudah terhubung dengan 
            tempat-tempat catering yang dekat dengan tempat anda. Tersedia setiap saat ketika anda membutuhkan, tinggal pesan dan makanan datang!</p>
        </div>
        <br><br>
        <div class="media-left">
          <span>
            <img class="media-object" src="image/login2.png" alt="login-image">
          </span>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><b>Promo dan Diskon Menarik</b></h4>
          <p style="font-size: 14px; text-align: justify;">Bukan hanya sekedar penyedia layanan catering biasa, Caricatering juga menawarkan 
            berbagai promo dan diskon yang menarik. Tetap update setiap hari untuk mendapatkan promo dan diskon yang menarik.</p>
        </div>
        <br><br>
        <div class="media-left">
          <span>
            <img class="media-object" src="image/login3.png" alt="login-image">
          </span>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><b>Kualitas Terjamin</b></h4>
          <p style="font-size: 14px; text-align: justify;">Kami menyediakan berbagai macam segala jenis makanan yang anda butuhkan. 
            Tempat catering yang bekerja sama dengan kami memiliki berbagai jenis 
            makanan dengan kualitas terbaik dan terjamin kehalalannya.</p>
        </div>
      </div>
    </div>
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-4 col-sm-4">
      <form method="post">
      <?php
  if(isset($error))
  {
    echo $error;
  }
?>
        <h3 class="text-center">Silahkan Masuk</h3><br>
        <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Pengguna" style="width:100%" name="uname" id="username" value="<?php if(isset($error)){echo $uname;}?>" required />
        <i class="glyphicon glyphicon-user form-control-feedback" style="color:#95A5A6;"></i>
      </div>
      <div class="form-group  has-feedback">
        <input type="password" class="form-control" id="pwd" placeholder="Kata Sandi" style="width:100%" name="upass" value="<?php if(isset($error)){echo $upass;}?>" required>
        <i class="glyphicon glyphicon-lock form-control-feedback" style="color:#95A5A6;"></i>
      </div>
      <button type="submit" name="btn_login" class="btn btn-warning" id="masuk" style="width:100%; height:35px">Masuk</button>
      
    </form>
      </div>
    </div>
  </div>
</div>

<!--Content Endd-->
