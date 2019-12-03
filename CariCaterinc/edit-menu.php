<?php
	 $id   = $_GET['id'];

      $query2     = $DB_conn->query("SELECT * FROM `konten` WHERE `id_konten` = '$id'");
      $row2       = $query2->num_rows;
     foreach ($query2->fetch_all() as $data) {
       $tmp              = array();
       $tmp['judul']     = $data[1];
       $tmp['desc']      = $data[2];
       $tmp['harga']     = $data[3];
       $tmp['pict']      = $data[5];
       $tmp['cat_mkn']   = $data[6];
       $tmp['time']		 = $data[7];
       $tmp['waktu']	 = $data[8];
       $tmp['order']	 = $data[9];
       
       $result2[] = $tmp;
     }

     if(isset($_POST['btn-edit'])){
      $judul      = $_POST['judul'];
      $desc       = $_POST['deskripsi'];
      $harga      = $_POST['harga'];
      $cat_mkn	  = $_POST['cat_mkn'];
      $time		  = $_POST['time'];
      $waktu 	  = $_POST['time'];
      $minor	  = $_POST['minor'];

      $target_dir    = "ImgContent/";
   	  $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   	  $file          = $_FILES["fileToUpload"]["name"];
   	  $file_tmp      = $_FILES["fileToUpload"]["tmp_name"];
   	  $file_size     = $_FILES["fileToUpload"]["size"];
   	  $uploadOk      = 1;
   	  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

     if ($file=="") {
       $ambil = $result2[0]['pict'];
       $target_file = "ImgContent/".str_replace("ImgContent/", "", $ambil);
     $up = $DB_conn->query("UPDATE `konten` SET `judul`='$judul',`deskripsi`='$desc',`harga`='$harga', `pict`='$target_file', `kategori_makan`='$cat_mkn', `waktu`='$waktu', `minor`='$minor' WHERE `id_konten` = '$id'");
     if ($up) {
       $user->redirect('?page=edit-menu&id='.$id.'&changed');
     }
     } else {
     move_uploaded_file($file_tmp, $target_file);
     $up = $DB_conn->query("UPDATE `konten` SET `judul`='$judul',`deskripsi`='$desc',`harga`='$harga', `pict`='$target_file', `kategori_makan`='$cat_mkn', `waktu`='$waktu', `minor`='$minor' WHERE `id_konten` = '$id'");
     if ($up) {
       $user->redirect('?page=edit-menu&id='.$id.'&changed');
     }
     }

     }
?>


<div class="container" style="background-color:#eee; padding:20px; margin-top:50px">
	<h3>Sunting Produk</h3>
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
                 <p style="color:#F9AE2C">Produk berhasil diubah!</p>
                 <?php
            }
            ?>
	 <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Nama Produk</label>
            <div class="col-md-7">
              <input class="form-control" name="judul" type="text" value="<?php echo $result2[0]['judul']; ?>" >
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Foto Produk</label>
            <div class="col-md-7">
              <input type="file" name="gambar" class="form-control" style="width:230px" value="<?php echo $result2[0]['pict']; ?>" >
            </div>
        </div>
        
        <!-- <div class="form-group">
          <label class="col-md-3 control-label text-right">Kategori Menu</label>
            <div class="col-md-7">
              <select class="form-control" name="cat" style="width:180px; ">
                  <option value="harian">Menu Harian</option>
                  <option value="khusus">Menu Khusus</option>
              </select>
            </div>
        </div> -->

        <div class="form-group">
          <label class="col-md-3 control-label text-right">Kategori Makanan</label>
            <div class="col-md-7">
              <select class="form-control" name="cat_mkn" style="width:180px;"  value="<?php echo $result2[0]['cat_mkn']; ?>">
                  <option value="sehat">Makanan Sehat</option>
                  <option value="diet">Diet Mayo</option>
                  <option value="camilan">Camilan</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Min Order</label>
            <div class="col-md-2">
              <input class="form-control" type="text" name="minor" value="<?php echo $result2[0]['order']; ?>" style="width:180px; ">
            </div>
            <p class="col-md-7 text-left" style="margin-top:5px">porsi</p>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Waktu Antar</label>
            <div class="col-md-7">
              <select class="form-control" name="time" style="width:180px; "  value="<?php echo $result2[0]['time']; ?>">
                  <option value="pagi">Pagi</option>
                  <option value="siang">Siang</option>
                  <option value="malam">Malam</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Harga Satuan</label>
            <div class="col-md-7">
              <input class="form-control" name="harga" type="text" style="width:180px;"  value="<?php echo $result2[0]['harga']; ?>">
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Deskripsi</label>
            <div class="col-md-7">
              <textarea class="form-control" name="deskripsi" style="height:200px"  ><?php echo $result2[0]['desc']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="btn-edit" class="btn btn-warning" value="Simpan" style="width:100px;">
              <span></span>
              <input type="reset" class="btn btn-default" value="Batal" style="width:100px;">
            </div>
          </div>
      </form>
</div>