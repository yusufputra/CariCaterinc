<?php
  if(isset($_POST['btn-save'])){
    $judul    = $_POST['judul'];
    $target_dir    = "ImgContent/";
    $target_file   = $target_dir . basename($_FILES["gambar"]["name"]);
    $file          = $_FILES["gambar"]["name"];
    $file_tmp      = $_FILES["gambar"]["tmp_name"];
    $file_size     = $_FILES["gambar"]["size"];
    $uploadOk      = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $cat      = $_POST['cat'];
    $cat_mkn  = $_POST['cat_mkn'];
    $minor    = $_POST['minor'];
    $time     = $_POST['time'];
    $harga    = $_POST['harga'];
    $desk     = $_POST['deskripsi'];

    
      if($user->addMenu($judul,$target_dir,$target_file,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$cat,$minor,$time,$harga,$desk,$user_id,$cat_mkn)){
        $user->redirect('?page=edit&added');
      }else{
        echo "<script>
        swal(
          'Data Tidak Masuk',
          'Harap Ubah Judul',
          'error'
        )</script>";
      }

    



  }

?>
<!--Content Start-->
<div class="container" style="background-color:#eee;  margin-top:30px; margin-bottom:0px; padding:20px">
  <h3>Jual Produk</h3>
  <hr style="border-top:1px solid #fff"> 
  
  <div class="row">
      <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Nama Produk</label>
            <div class="col-md-7">
              <input class="form-control" name="judul" type="text" required>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Foto Produk</label>
            <div class="col-md-7">
              <input type="file" name="gambar" class="form-control" style="width:230px" required>
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
              <select class="form-control" name="cat_mkn" style="width:180px; ">
                  <option value="sehat">Makanan Sehat</option>
                  <option value="diet">Diet Mayo</option>
                  <option value="camilan">Camilan</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Min Order</label>
            <div class="col-md-2">
              <input class="form-control" type="text" name="minor" style="width:180px;" required>
            </div>
            <p class="col-md-7 text-left" style="margin-top:5px">porsi</p>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Waktu Antar</label>
            <div class="col-md-7">
              <select class="form-control" name="time" style="width:180px; ">
                  <option value="pagi">Pagi</option>
                  <option value="siang">Siang</option>
                  <option value="malam">Malam</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Harga Satuan</label>
            <div class="col-md-7">
              <input class="form-control" name="harga" type="text" style="width:180px; " required>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label text-right">Deskripsi</label>
            <div class="col-md-7">
              <textarea class="form-control" name="deskripsi" style="height:200px" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="btn-save" class="btn btn-warning" value="Simpan" style="width:100px;">
              <span></span>
              <input type="reset" class="btn btn-default" value="Batal" style="width:100px;">
            </div>
          </div>
      </form>      
  </div>
</div>
<!--Content End-->