<!--Content Start-->
<div class="container">
  <div class="jumbotron"  style="">
  <?php
require_once 'connection.php';
/* DON'T EVER TOUCH THIS */
if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}

if(isset($_POST['btn-signup']))
{
   $name        = trim($_POST['txt_name']);
   $uname       = trim($_POST['txt_uname']);
   $upass       = trim($_POST['txt_upass']);
   $email       = $_POST['email'];
   $telp        = $_POST['telp'];
   $gender      = $_POST['gender'];
   $seller      = $_POST['seller'];

 
   if($name=="") {
     $error[] = "Masukkan nama !"; 
   }
   else if($uname=="") {
     $error[] = "Masukkan username !"; 
   }
   else if($upass=="") {
     $error[] = "Masukan password !";
   }
   else if(strlen($upass) < 6){
     $error[] = "Password harus lebih dari 6 karakter !"; 
   }
   else if($email=="") {
     $error[] = "Masukkan email !";
   }
   else if ($telp=="") {
     $error[] = "Masukkan nomor telepon !";
   }
   else if ($gender=="") {
     $error[] = "Masukkan jenis kelamin !";
   }
   else if($seller==""){
     $error[] = "Apakah Anda penjual ?";
   }
   else {
      try
      {
            if($user->register($name,$uname,$upass,$email,$telp,$gender,$seller)) 
            {
              $user->redirect('?page=register&joined');

            }

     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
} 
/* End of DON'T EVER TOUCH THIS */
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
<form method="post">
            <h2 class="text-center">Silahkan Daftar</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                 echo $error;
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <p style="color:#F9AE2C">Berhasil mendaftar <a href='?page=login' style="color:#141414" >masuk</a> disini</p>

                 <?php
            }
            ?>
           <div class="form-group has-feedback">
           <label for="name">Nama Lengkap :</label>
            <input class="form-control" type="text" name="txt_name" placeholder="Nama Lengkap" required/>
            <span class="glyphicon glyphicon-user form-control-feedback" style="color:#95A5A6;"></span>
            </div>
            <div class="form-group has-feedback">
            <label for="uname">Nama Pengguna :</label>
            <input class="form-control" type="text" name="txt_uname" placeholder="Nama Pengguna" required/>
            <span class="glyphicon glyphicon-star form-control-feedback" style="color:#95A5A6;"></span>
            </div>
            <div class="form-group has-feedback">
            <label for="upass">Kata Sandi :</label>
            <input class="form-control" type="password" name="txt_upass" placeholder="Kata Sandi" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#95A5A6;"></span>
            </div>
            <div class="form-group has-feedback">
            <label for="email">Email :</label>
            <input class="form-control" type="email" name="email" placeholder="xxx@domain.xyz" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:#95A5A6;"></span>
            </div>
            <div class="form-group has-feedback">
            <label for="telp">Nomor Telepon :</label>
            <input class="form-control" type="text" name="telp" placeholder="08xxxxxxxx" required/>
            <span class="glyphicon glyphicon-phone-alt form-control-feedback" style="color:#95A5A6;"></span>
            </div>
            <div class="form-group">
            <label for="gender">Jenis Kelamin :</label>
            <label><input type="radio" name="gender" value="male" required> Laki-Laki</label>
            <label><input type="radio" name="gender" value="female" required> Perempuan</label>
            </div>
            <div class="form-group">
            <label for="seller">Penjual :</label>
            <label><input type="radio" name="seller" value="1" required> Ya</label>
            <label><input type="radio" name="seller" value="0" required> Tidak</label>
            </div>
                     
                  
           
             <button type="submit" name="btn-signup" class="btn btn-warning">Daftar</button>
            </div>
            <br />

</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
<!--Content End-->
