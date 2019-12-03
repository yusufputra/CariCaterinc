<?php
  //require_once('../function.php');
  //error_reporting(0);

  $id   = $_GET['id'];
?>

    <!-- Content Header (Page header) -->
    <?php
      $query2     = $DB_conn->query("SELECT * FROM `user` WHERE `id` = '$id'");
      $row2       = $query2->num_rows;
     foreach ($query2->fetch_all() as $data) {
       $tmp              = array();
       $tmp['id']        = $data[0];
       $tmp['name']      = $data[1];
       $tmp['user']      = $data[2];
       $tmp['email']     = $data[4];
       $tmp['telepon']   = $data[5];
       $tmp['alamat']    = $data[6];
       $result2[] = $tmp;
     }

     if(isset($_POST['btn-edit'])){
      $name     = $_POST['name'];
      $username = $_POST['uname'];
      $email    = $_POST['email'];
      $telp     = $_POST['telp'];
      $address  = $_POST['alamat'];
      try
      {
            if($user->editUser($id,$name,$username,$email,$telp,$address)) 
            {
              //move_uploaded_file($file_tmp, $target_file);
              ?>
    <script type="text/javascript">
    window.location.href = '?page=penjual&changed';
    </script><?php
              }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }

     }
     ?>
    <section class="content-header">
      <h1>
        Penjual
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="">Kontrol Panel</li>
        <li class="">Penjual</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <h4>Edit Penjual</h4>
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
         <div class="form-group">
          <label class="col-md-2 control-label">ID:</label>
          <div class="col-md-2">
            <input class="form-control" id="disabledInput" type="text" value="<?php echo $result2[0]['id']; ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Nama :</label>
          <div class="col-md-9">
            <input class="form-control" name="name" type="text" value="<?php echo $result2[0]['name']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Username:</label>
          <div class="col-md-9">
            <input class="form-control" name="uname" type="text" value="<?php echo $result2[0]['user']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Email:</label>
          <div class="col-lg-9">
            <input class="form-control" name="email" type="text" value="<?php echo $result2[0]['email']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Telepon:</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="telp" value="<?php echo $result2[0]['telepon']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Alamat:</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="alamat" value="<?php echo $result2[0]['alamat']; ?>">
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

    