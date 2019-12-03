    <!-- Content Header (Page header) -->
    <?php
    include_once '../function.php';
      $id       = $_GET['id'];
      $query2   = $DB_conn->query("SELECT * FROM `slider` WHERE `id_slider` = '$id'");
      $result[] = $query2->fetch_assoc();


//$password = base64_decode($result[0]['password']);
// echo var_dump($result);

     if(isset($_POST['btn-edit']))
      {
   
   $target_dir_up = "../ImgContent/Slider/";
   $target_dir    = "ImgContent/Slider/";
   $target_file_up= $target_dir_up . basename($_FILES["fileToUpload"]["name"]);
   $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $file          = $_FILES["fileToUpload"]["name"];
   $file_tmp      = $_FILES["fileToUpload"]["tmp_name"];
   $file_size     = $_FILES["fileToUpload"]["size"];
   $uploadOk      = 1;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   $judul         = $_POST['judul'];
   

 
   if($user->editslider($target_dir_up,$target_dir,$target_file_up,$target_file,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$id,$judul)){
    
    ?>
    
    <script type="text/javascript">
    window.location.href = '?page=slider&edited';
    </script><?php

   }
} 
if (isset($_POST['btn-reset'])) {
  $user->redirect('?page=silder');
}
     ?>
    <section class="content-header">
      <h1>
        Slider
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="">Kontrol Panel</li>
        <li class="">Slider</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <h4>Edit Slider</h4>
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
                 <p style="color:#F9AE2C">Slider berhasil diubah!</p>
                 <?php
            }
            ?>
      <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
         <div class="col-md-3">
        <div class="text-center">
          <img src="<?php
          if ($result[1]['gambar']===null) {
            echo "//placehold.it/100";
          }else{
            echo "../" . $result[1]['gambar'];
          }
            ?>" class="avatar img-circle" alt="foto-profil"  width="250px" height="250px">
          <h6>Unggah Foto</h6>
          
          <input type="file" name="fileToUpload" value="<?php echo "../" . $result[1]['gambar']; ?>" class="form-control">
        </div>
      </div>
        <div class="col-md-9 personal-info">
        <h3>Data Slider</h3>
        
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Judul </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="judul" value="<?php echo $result[1]['Judul']; ?>" >
            </div>
          </div>
          </div>
        
        
        
       
        <div class="form-group">
          <label class="col-md-2 control-label"></label>
          <div class="col-md-9">
            <input type="submit" class="btn btn-warning" name="btn-edit" value="Simpan Perubahan" style="width:150px;">
            <span></span>
            <input type="reset" class="btn btn-default" value="Batal" style="width:150px;">
          </div>
        </div>
      </form>  
      

    </section>
    <!-- /.content -->

