  <?php
$query2   = $DB_conn->query("SELECT * FROM `user` WHERE `id` = '$id'");
$result[]   = $query2->fetch_assoc();

//$password = base64_decode($result[0]['password']);
//echo var_dump($result[0]['user']);

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
   $alamat        = $_POST['address'];

 
   if($name=="") {
     $error[] = "Masukan Nama!"; 
   }
   else if($uname=="") {
     $error[] = "Masukan Nama Pengguna!"; 
   }
   else if($upass=="") {
     $error[] = "Masukkan Password!";
   }
   else if(strlen($upass) < 6){
     $error[] = "Password harus >6 karakter!"; 
   }
   else if($email=="") {
     $error[] = "Masukkan Email!";
   }
   else if ($telp=="") {
     $error[] = "Masukan Nomor Telepon!";
   }
   else {
   if ($file=="") {
     $ambil = $result[0]['picture'];
     $target_file = "ProfPict/".str_replace("ProfPict/", "", $ambil);
   $up = $DB_conn->query("UPDATE `user` SET `name`='$name',`user`='$uname',`password`='$upass',`email`='$email',`telepon`='$telp',`alamat` = '$alamat' , `picture` = '$target_file' WHERE `id`='$id'");
   if ($up) {
     $user->redirect('?page=profile&changed');
   }
   } else {
   move_uploaded_file($file_tmp, $target_file);
   $up = $DB_conn->query("UPDATE `user` SET `name`='$name',`user`='$uname',`password`='$upass',`email`='$email',`telepon`='$telp',`alamat` = '$alamat' , `picture` = '$target_file' WHERE `id`='$id'");
   if ($up) {
     $user->redirect('?page=profile&changed');
   }
   }

  } 
} 

if (isset($_POST['btn-reset'])) {
  $user->redirect('?page=edit');
}

if(isset($_POST['btn-jadi-penjual'])){
  $DB_conn->query("UPDATE `user` SET `seller`='1' WHERE `id` = '$id'");
  $user->redirect('?page=edit');
}

      ?>
          </ul>
        </div>
      </div>
</nav>
  
<!-- Start Content -->

<div class="container">
  <div class="jumbotron"  style="margin-top:10px; margin-bottom:0px;"> 
    <div class="col-md-10"><h3>Sunting Profil</h3></div>
    <div class="col-md-2">
      <form method="post">
        <input type="submit" class="btn btn-success" name="btn-jadi-penjual" value="Jadi Penjual" style="width:150px;">
      </form>
    </div>
    
    <hr style="border-top:1px solid #fff"> 
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
                 <p style="color:#F9AE2C">Profil berhasil diubah!</p>
                 <?php
            }
            ?>
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php
          if ($result[0]['picture']=="" || $result[0]['picture']=="ProfPict/") {
            echo "ProfPict/default-pict.jpg";
          }else{
            echo $result[0]['picture'];
          }
            ?>" class="avatar img-circle" alt="foto-profil"  width="250px" height="250px">
          <h6>Unggah Foto</h6>
          
          <input type="file" name="fileToUpload" value="<?php echo $result[0]['picture']; ?>" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Data Pribadi</h3>
        
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama </label>
            <div class="col-lg-8">
              <input class="form-control" name="txt_name" type="text" value="<?php echo $result[0]['name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email </label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="<?php echo $result[0]['email']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Nama Pengguna </label>
            <div class="col-md-8">
              <input class="form-control" name="txt_uname" type="text" value="<?php echo $result[0]['user']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Kata Sandi </label>
            <div class="col-md-8">
              <input class="form-control" name="txt_upass" type="password" value="<?php echo base64_decode($result[0]['password']); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">No. Telepon </label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="telp" value="<?php echo $result[0]['telepon']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Alamat </label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" value="<?php echo $result[0]['alamat']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-warning" name="btn-signup" value="Simpan Perubahan" style="width:150px;">
              <span></span>
              <input type="submit" class="btn btn-default" name="btn-reset" value="Batal" style="width:150px;">
            </div>
          </div>
        </form>
      </div>
  </div>
  </div>
</div>
<!-- End Content -->