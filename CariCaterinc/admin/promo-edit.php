<?php
  //require_once('../function.php');
  //error_reporting(0);

  $id   = $_GET['id'];
?>

   <!-- Content Header (Page header) -->
       <?php
      $query2     = $DB_conn->query("SELECT * FROM `konten` WHERE `id_konten` = '$id'");
      $row2       = $query2->num_rows;
     foreach ($query2->fetch_all() as $data) {
       $tmp              = array();
       $tmp['id']        = $data[0];
       $tmp['judul']     = $data[1];
       $tmp['desc']      = $data[2];
       $tmp['harga']     = $data[3];
       $result2[] = $tmp;
     }

     if(isset($_POST['btn-edit'])){
      $judul      = $_POST['judul'];
      $desc       = $_POST['desc'];
      $harga      = $_POST['harga'];
      try
      {
            if($user->editMenu($id,$judul,$desc,$harga)) 
            {
              
              ?>
                <script type="text/javascript">
                window.location.href = '?page=promo&changed';
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
        Pembeli
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="">Kontrol Panel</li>
        <li class="">Pembeli</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <h4>Edit Pembeli</h4>
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
            <input class="form-control" id="disabledInput" type="text" value="<?php echo $result2[0]['id']; ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Judul :</label>
          <div class="col-md-9">
            <input class="form-control" name="judul" type="text" value="<?php echo $result2[0]['judul']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Deskripsi:</label>
          <div class="col-md-9">
            <input class="form-control" name="desc" type="text" value="<?php echo $result2[0]['desc']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">harga:</label>
          <div class="col-lg-9">
            <input class="form-control" name="harga" type="text" value="<?php echo $result2[0]['harga']; ?>">
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

    