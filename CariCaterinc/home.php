<!--Content Start-->
<div class="container">
      <div id="my-slider" class="carousel slide" data-ride="carousel" >

        


        <div class="carousel-inner" role="listbox">
        <?php
        // error_reporting(0);
        $query_slider     = $DB_conn->query("SELECT * FROM `slider`");
        $row_slider       = $query_slider->num_rows;
        $result_slider[]  = $query_slider->fetch_all();
        // $id0              = $result_slider[0][0][2];
        
        // echo var_dump($result_slider);

        // $query5     = $DB_conn->query("SELECT * FROM `konten` WHERE `id_konten` = '$id0'");
        // $row5       = $query5->num_rows;
        // $result5[]  = $query5->fetch_assoc();
        
          ?>
           <div class="item active">
              <img style="width: 100%" src="<?php echo $result_slider[0][0][1]; ?>" alt="catering"/>
              <div class="carousel-caption">
                  <h1><?php echo $result_slider[0][0][2]; ?></h1>
              </div>
          </div>
        <?php
        for($r = 1; $r < $row_slider; $r++)
        {
          // $idr        = $result_slider[0][$r][2];
          // $query6     = $DB_conn->query("SELECT * FROM `konten` WHERE `id_konten` = '$idr'");
          
          // $result5[]  = $query6->fetch_assoc();
          // echo var_dump($idr); 
          ?>
           <div class="item">
              <img  style="width: 100%" src="<?php echo $result_slider[0][$r][1]; ?>" alt="catering"/>
              <div class="carousel-caption">
                  <h1><?php echo $result_slider[0][$r][2]; ?></h1>
              </div>
          </div>
        <?php 
        }
        ?> 
          
        </div>
        <ol class="carousel-indicators">
          <li data-target="#my-slider" data-slide-to="0" class="active"></li>
          <?php
          for ($i=1; $i < $row_slider; $i++) { ?>
            <li data-target="#my-slider" data-slide-to="<?php echo $i; ?>"></li>
            <?php
          }
          ?>
            
        </ol>


        <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#my-slider" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
</div>


<div class="container bg-1"> 
  <div class="row">
  <div class="col-sm-9 col-md-9"  style="margin-left:20pt;">
    <h3 style="padding:20px"><b>Cari Catering</b><br><small>Temukan tempat catering terdekat di sekitarmu!</small><br>
      <small>Cari catering berdasarkan kategori makanan, waktu antar, dan minimal order.</small></h3>
  </div>
  <div class="col-sm-2 col-md-2" style="margin-top:57pt;"> 
    <a href="index.php?page=search"><button class="btn btn-warning" style="width:150px; height:40px;"><i class="glyphicon glyphicon-search"></i>  Cari</button></a>
  </div>

</div>
</div>

<div class="container">
<div class="home">
<?php
$query6   = $DB_conn->query("SELECT * FROM `promo`");
$row6     = $query6->num_rows;
?>
  <h2 style="color: #fff;" class="text-center">Menu Promo<br>
    <small>Yuk! Intip menu yang lagi promo</small></h2><hr>
<div class="row">
  <?php
  //echo var_dump($row6);
    if($row6 <= 2){
    echo "<center><h3><a href='?page=promo'>Cek Menu Promo</a></h3></center>";
  }else{
    for($q = 0; $q < 3; $q++){
      $result6[]  = $query6->fetch_assoc();
      $judul      = $result6[$q]['judul'];
      $query7     = $DB_conn->query("SELECT * FROM `konten` WHERE `judul` = '$judul'");
      $result7[]  = $query7->fetch_assoc();
      
      ?>
      <div class="col-sm-6 col-md-4">
       <div class="thumbnail"  style="width:330px; height:550px">
        <img src="<?php if($result7[$q]['pict'] != "ImgContent/"){echo $result7[$q]['pict'];}else{ echo "image/terlaris1.jpg";} ?>" style="width:324px; height:270px;" alt="steamed-and-roast-chicken">
        <div class="caption">
         <h4 class="title"><?php echo $result7[$q]['judul']; ?></h4>
         <p><?php echo $result7[$q]['deskripsi']; ?></p>
         <p><b><?php echo "Rp ".number_format($result7[$q]['harga'],0,",","."); ?></b></p>
        <!--  <p>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star-empty"></span>  
        </p><br> -->
        <p><b>Penjual : <a href="?page=seller&user=<?php echo $result7[$q]['user']; ?>" class="penjual"><?php echo $result7[$q]['user']; ?><a/></b></p>
        <br><br>
        <p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $q; ?>">Lihat detail »</a></p>
        <br>
      </div>
    </div>
  </div>
  
<?php
}}
?>
<!-- Modal -->
<?php
if($query6 !== ""){
  for ($x = 0; $x < 3; $x++) { 
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
                    }
        $cart        = $_POST[$cart];
        $qty         = intval($_POST[$qty]);
        $tot         = intval($_POST[$namemin]);
        $pem  = $qty > $tot;

        // echo var_dump($qty);
        // echo var_dump($tot);
        // echo var_dump($pem);

        if($qty > $tot){
        if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
          echo"
              <script>
              swal(
                'Data Ditambahkan ke Keranjang',
                'Alhamdulillah',
                'success'
              )
              </script>";
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
                      <img src="<?php if($result7[$x]['pict'] != "ImgContent/"){echo $result7[$x]['pict'];}else{ echo "image/terlaris1.jpg";} ?>" style="width:480px;">
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
}
}?>
<!--end Modal-->


</div>
</div>
</div>
<!--Content End-->