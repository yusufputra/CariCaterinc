  
<!--Content Start-->
<?php
  $seller        = $_GET['user'];
  $query3        = $DB_conn->query("SELECT * FROM `user` WHERE `user` = '$seller'");
  $result3[]     = $query3->fetch_assoc();
  // echo var_dump($result3);
?>
<div class="container" style="padding:50px; margin-top:50px">
  <div class="row">
    <div class="col-md-3 col-sm-3">
      <center><img src="<?php  
          if ($result3[0]['picture']=="" || $result3[0]['picture']=="ProfPict/") {
            echo "ProfPict/default-pict.jpg";
          }else{
            echo $result3[0]['picture'];
          } 
      ?>" class="img-circle" alt="coba"  width="250px" height="250px"></center>
    </div>
    <div class="col-md-5 col-sm-5">
      <h3>Catering <?php echo $result3[0]['user']; ?></h3>
      <h5><i><b><?php echo $result3[0]['name']; ?></b></i></h5>
      <br>
      <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result3[0]['alamat']; ?></p>
      <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $result3[0]['telepon']; ?></p>
      <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $result3[0]['email']; ?></p>
    
    </div>
    

  </div>
  <br><br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1" style="color:#191919">Menu</a></li>
    <li><a data-toggle="tab" href="#menu3" style="color:#191919">Ulasan</a></li>
  </ul>

    <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <!-- <h2>Semua Menu</h2> -->
      <br>
      <div class="row">
        <div name="allin">
          <!-- <h4 style="padding-right:15px; padding-left:15px;">allin</h4>
            <hr style="border-top:1px solid #fff; margin:5px 15px 15px 15px"> -->
          <?php
  $query        = $DB_conn->query("SELECT * FROM `konten` WHERE `user` = '$seller'");
  $row          = $query->num_rows;
 
  if($query !== ""){
    for ($x = 0; $x < $row; $x++) { 
      $result2[]     = $query->fetch_assoc();
?>
          <div class="col-sm-4 col-md-4">
               <div class="thumbnail"  style="width:330px; height:550px;">
                <img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;"alt="steamed-and-roast-chicken">
                <div class="caption">
                 <h4 class="title"><?php echo $result2[$x]['judul']; ?></h4>
                 <p><?php echo $result2[$x]['deskripsi']; ?></p>
                 <p><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></p>
                  <br>
                  <p><b>Penjual : <a href="?page=seller&user=<?php echo $result2[$x]['user']; ?>" style="color:#F9AE2C"><?php echo $result2[$x]['user']; ?><a/></b></p>
                  <br>
                  <p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $x; ?>">Lihat detail »</a></p>
                </div>
              </div>
          </div>
              <?php
    }
    }else{?>
<h1>Data not recorded</h1>
<?php }?>
          
      </div>
    </div>
  </div>

<?php
$query4        = $DB_conn->query("SELECT * FROM `comment` WHERE `user` = '$seller'");
$row4          = $query4->num_rows;
if(isset($_POST['comment'])){
  if(!$user->is_loggedin())
    {
      $user->redirect('login.php');
    }
  $commentText  = $_POST['addComment'];

  if($user->addComment($commentText,$user_id,$seller)){
  }
}
?>
    <div id="menu3" class="tab-pane">
      <h2>Ulasan</h2>
      <p>Berikan ulasan untuk catering ini</p>
      
      <script type="text/javascript">
            $(document).ready(function() {
              $('#submitComment').click(function(){
                var tampil =  $('#addComment').val();
                var tampil2 = '<hr style="border-top:1px solid #fff"><div class="media-left">'+
                                '<img width="45px" height="45px" src="'+ $('#pict').val() +'" class="media-object" style="width:45px"></div>'+
                                '<div class="media-body">'+
                                '<h4 class="media-heading">'+ $('#commentor').val() +'<small><i> Dikirim pada <?php echo date("d-m-Y");?></i></small></h4>'+
                                '<p>'+ $('#addComment').val() +'</p>'+
                                '0<a style="color: #95A5A6"> <i class="fa fa-thumbs-up like" aria-hidden="true" href="#" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Suka"></i></a>&nbsp;&nbsp;'+
                                '0<a style="color: #95A5A6"> <i class="fa fa-thumbs-down like" aria-hidden="true" href="#" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Tidak suka"></i></a></div>';
                // console.log(tampil);
                $('#media1').append(tampil2);
                $.ajax({
                  url: "comment.php?addComment=" + $('#addComment').val() + "&commentor=" + $('#commentor').val() + "&user=" + $('#user').val(), 
                  success: true
                });
                $('#addComment').val('');
              })
            });
          </script>

      <div class="media" id="media1">
        <?php 
          if($query4 !== ""){
          for ($s = 0; $s < $row4; $s++) { 
            $result4[]     = $query4->fetch_assoc();
            $userpict      = $result4[$s]['commentor'];
            $query5        = $DB_conn->query("SELECT * FROM `user` WHERE `user` = '$userpict'");
            $result5[]     = $query5->fetch_assoc();

            //echo var_dump($result4);
        ?>



        <hr style="border-top:1px solid #fff">
        <div class="media-left">
          <img src="<?php  
          if ($result5[$s]['picture']=="" || $result5[$s]['picture']=="ProfPict/") {
            echo "ProfPict/default-pict.jpg";
          }else{
            echo $result5[$s]['picture'];
          } 
      ?>" class="media-object" style="width:45px">
        </div>

        <div class="media-body">
            <input id="idkomen" hidden="true" type="text" value="<?php echo $result4[$s]['id_comment']; ?>" />
            <h4 class="media-heading"><?php echo $result4[$s]['commentor']; ?> <small><i> Dikirim pada <?php echo $result4[$s]['date']; ?></i></small></h4>
            <p><?php echo $result4[$s]['comment']; ?></p>
            <span id="hasil"><?php echo $result4[$s]['like'];  ?></span> <a style="color: #95A5A6" href="comment.php?aksi=like&user=<?php echo $result3[0]['user'];?>&id=<?php echo $result4[$s]['id_comment'];?>"><i class="fa fa-thumbs-up like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Suka" ></i></a>&nbsp;&nbsp;
            <?php echo $result4[$s]['dislike'];  ?><a style="color: #95A5A6" href="" id="dislike"> <i class="fa fa-thumbs-down like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Tidak suka"></i></a>
          </div>

          <?php }} 
          ?>

          
        </div>
        <div class="tab-pane">
          <!-- <form action="" method="post" class="form-horizontal" id="commentForm" role="form">  -->
          <div class="form-horizontal">
              <hr style="border-top:1px solid #fff">  
              <div class="form-group">
                <label for="email" class="col-sm-1 col-md-1 control-label">Komentar</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                  <input type="hidden" value="<?php echo  $user_id;  ?>" id="commentor"></input>
                  <input type="hidden" value="<?php echo  $result2[0]['user'];  ?>" id="user"></input>
                  <input type="hidden" value="<?php echo  $result[0]['picture']; ?>" id="pict"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-8">                  
                  <input class="btn btn-warning btn-circle" name="comment" type="submit" id="submitComment" value="Kirim Komentar"><!--<span class="fa fa-send"></span>-->
                </div>
              </div> 
          </div>
            <!-- </form> -->
          </div>
      </div>
    </div>
  </div>

    <!-- Modal -->
<?php
    if($query !== ""){
    for ($x = 0; $x < $row; $x++) { 
      $result2[]     = $query->fetch_assoc();
      $seller      = $result2[$x]['user'];
      $harga       = $result2[$x]['harga'];
      $addtocart     = "addtocart".$x;
      $cart      = "cart".$x;
      $qty       = "qty".$x;
      $namemin   = "min".$x;

      if(isset($_POST[$addtocart])){
        if(!$user->is_loggedin())
          {
            ?>
                      
            <script type="text/javascript">
            window.location.href = '?page=login';
            </script><?php
          }else{
        $cart        = $_POST[$cart];
        $qty       = intval($_POST[$qty]);
        $tot         = intval($_POST[$namemin]);
        $pem  = $qty > $tot;

        if($qty > $tot){
        if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
          echo"
      <script>
      swal(
        'Data Ditambahkan ke Keranjang',
        'Cek Keranjang!',
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

<div class="col-md-5">
   <img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:480px;">
</div>
<div class="col-md-4">
                      <h3><?php echo $result2[$x]['judul']; ?></h3>
                      <h4 style="color:#F9AE2C"><b><?php echo "Rp ".number_format( $result2[$x]['harga'],0,",","."); ?></b></h4>
                      <p><?php echo $result2[$x]['deskripsi']; ?></p>
                      <table style="margin:10px; color : #95A5A6 ">
                        <tr cellpadding="10" >
                          <td style="width:150px">Waktu Antar</td>
                          <td><?php echo $result2[$x]['waktu']; ?></td>
                        </tr>
                        <tr>
                          <td>Min Order</td>
                          <td><?php echo $result2[$x]['minor']; ?> pcs</td>
                        </tr>
                        <tr>
                          <td>Kategori Makanan</td>
                          <td><?php echo $result2[$x]['kategori_makan']; ?></td>
                        </tr>
                      </table>
                      <br>
                      <div class="row">
                        <form method="post">
                        <input type="text" class="hidden" name="<?php echo $cart; ?>" value="<?php echo $result2[$x]['id_konten']; ?>"><br>
                        <div class="col-md-2" style="padding-top:10px"><p> Jumlah</p></div><input class="hidden" name="<?php echo $namemin; ?>" value="<?php echo $result2[$x]['minor']; ?>">
                        <div class="col-md-2"><input type="number" class="form-control bfh-number" name="<?php echo $qty; ?>" value="5" style="width:65px"></input></div>
                        <div class="col-md-7" style="margin-left:10px">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>

</div>
    <?php
    }}?>

<!--Content End-->
