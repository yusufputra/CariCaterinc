<?php
if(isset($_GET['carted'])){
  echo"
      <script>
      swal(
        'Data Ditambahkan ke Keranjang',
        'Cek Keranjang!',
        'success'
      )
      </script>";
}
?>
<div class="container">
  <div class="jumbotron" style="margin-top:10px; margin-bottom:0px; height:100%" >
    <h2><center>Menu Promo<br><small>Dapatkan potongan harga untuk menu favoritmu!</small></h2> 
  </br>
  <?php 
  $query6   = $DB_conn->query("SELECT * FROM `promo`");
  $row6     = $query6->num_rows;
  ?>
  <div class="row">
    <?php
    for($q = 0; $q < $row6; $q++){
      $result6[]  = $query6->fetch_assoc();
      $judul      = $result6[$q]['judul'];
      $query7     = $DB_conn->query("SELECT * FROM `konten` WHERE `judul` = '$judul'");
      $result7[]  = $query7->fetch_assoc();
      
      ?>
      <div class="col-sm-4 col-md-4">
       <div class="thumbnail"  >
        <img src="<?php if($result7[$q]['pict'] != "ImgContent/"){echo $result7[$q]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;" alt="steamed-and-roast-chicken">
        <div class="caption">
         <h4 class="title"><?php echo $result7[$q]['judul']; ?></h4>
         <p><?php echo $result7[$q]['deskripsi']; ?></p>
         <p><b><?php echo "Rp ".number_format($result7[$q]['harga'],0,",","."); ?></b></p>
        <p><b>Penjual : <a href="?page=seller&user=<?php echo $result7[$q]['user']; ?>" style="color:#F9AE2C"><?php echo $result7[$q]['user']; ?><a/></b></p><br>
        <p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $q; ?>">Lihat detail »</a></p>
        <br>
      </div>
    </div>
  </div>

  <?php
}
?>
<!-- Modal -->
<?php
if($query6 !== ""){
  for ($x = 0; $x < $row6; $x++) { 
    $result6[]  = $query6->fetch_assoc();
    $judul      = $result6[$q]['judul'];
    $query7     = $DB_conn->query("SELECT * FROM `konten` WHERE `judul` = '$judul'");
    $result7[]  = $query7->fetch_assoc();
    $seller      = $result7[$x]['user'];
    $harga       = $result7[$x]['harga'];
    $addtocart     = "addtocart".$x;
    $cart      = "cart".$x;
    $qty       = "qty".$x;
    $namemin  = "min" . $x;
    if(isset($_POST[$addtocart])){
      if(!$user->is_loggedin())
          {
            ?>
                      
            <script type="text/javascript">
            window.location.href = '?page=login';
            </script><?php
          }else{
        $cart        = $_POST[$cart];
        $qty         = intval($_POST[$qty]);
        $tot         = intval($_POST[$namemin]);
        $pem  = $qty > $tot;
        // echo var_dump($qty);
        // echo var_dump($tot);
        // echo var_dump($pem);
        if($qty > $tot){
        if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
          ?>
                      
            <script type="text/javascript">
            window.location.href = '?page=promo&carted';
            </script><?php
        }}else{
          echo"
              <script>
              swal(
                'Jumlah lebih sedikit',
                'Tambah Jumlah',
                'error'
              )
              </script>";
        }
        }
      }
    ?>
    <div class="modal fade" id="<?php echo "pilihan" . $x; ?>" role="dialog">
      <div class="modal-dialog modal-lg" style="width:900px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Menu</h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">

                    <div class="col-md-5" style="width:500px">
                      <img src="<?php if($result7[$x]['pict'] != "ImgContent/"){echo $result7[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:480px;">
                    </div>
                    <div class="col-md-4">
                      <h3><?php echo $result7[$x]['judul']; ?></h3>
                      <h4 style="color:#F9AE2C"><b><?php echo "Rp ".number_format($result7[$x]['harga'],0,",","."); ?></b></h4>
                      <p><?php echo $result7[$x]['deskripsi']; ?></p>
                      <table style="margin:10px; color : #95A5A6 ">
                        <tr cellpadding="10" >
                          <td style="width:150px">Waktu Antar</td>
                          <td><?php echo $result7[$x]['waktu']; ?></td>
                        </tr>
                        <tr>
                          <td>Min Order</td>
                          <td><?php echo $result7[$x]['minor']; ?> pcs</td>
                        </tr>
                        <tr>
                          <td>Kategori Makanan</td>
                          <td><?php echo $result7[$x]['kategori_makan']; ?></td>
                        </tr>
                      </table>
                      <br>
                      <div class="row">
                        <form method="post">
                        <input type="text" class="hidden" name="<?php echo $cart; ?>" value="<?php echo $result7[$x]['id_konten']; ?>"><br>
                        <div class="col-md-2" style="padding-top:10px"><p> Jumlah</p></div><input class="hidden" name="<?php echo $namemin; ?>" value="<?php echo $result7[$x]['minor']; ?>">
                        <div class="col-md-2"><input type="number" class="form-control bfh-number" name="<?php echo $qty; ?>" value="5" style="width:65px"></input></div>
                        <div class="col-md-7" style="margin-left:20px">
                              
                                    <input type="submit" name="<?php echo $addtocart; ?>" class="btn btn-warning" value="Tambahkan ke Keranjang">
                              
                              </div>
                            </form>

                        <!--<div class="col-md-7" style="margin-left:5px"><p><a href="#" class="btn btn-warning" role="button">Tambahkan ke Keranjang <i class="glyphicon glyphicon-shopping-cart"></i></a></p></div>-->
                      </div>                    
              <br>
              <br>
              <br>
              <br>

            </div>



          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php
}}else{
  echo "<center><h3>Tidak ada menu Promo</h3></center>";
  }?>
<!--end Modal-->

</div>
</div>
</div>