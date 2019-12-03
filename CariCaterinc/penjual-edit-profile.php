<?php
if(isset($_GET['added'])===TRUE) {
                echo"
              <script>
              swal(
                'Berhasil',
                'Menu Telah Ditambahkan',
                'success'
              )
              </script>";

                

                

              }
              if(isset($_POST[$addToPromo])){
              if($user->addToPromo($judulmenu)){
                echo"
              <script>
              swal(
                'Berhasil',
                'Menu Telah Ditambahkan',
                'success'
              )
              </script>";
                  }}
?>
<!--Content Start-->
<div class="container" style="padding:20px; margin-top:50px">
  <div class="row">
    <div class="col-md-3 col-sm-3">
      <center><img src="<?php if ($result[0]['picture']=="" || $result[0]['picture']=="ProfPict/") {
            echo "ProfPict/default-pict.jpg";
          }else{
            echo $result[0]['picture'];
          } ?>" class="img-circle" alt="prof-pict" width="250px" height="250px"></center>
    </div>
    <div class="col-md-4 col-sm-4">
      <h3>Catering <?php echo $result[0]['user']; ?></h3>
      <h5><i><b><?php echo $result[0]['name']; ?></b></i></h5>
      <br>
      <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result[0]['alamat']; ?></p>
      <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $result[0]['telepon']; ?></p>
      <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $result[0]['email']; ?></p>

    </div>
    <div class="col-md-5 col-sm-5 text-right">
      <a href="?page=profile"><button class="btn btn-warning" >Sunting Profil <i class="glyphicon glyphicon-pencil"></i></button></a>
      <a href="?page=jual" ><button class="btn btn-warning" >Jual Produk <i class="glyphicon glyphicon-heart-empty"></i></button></a>
      <a href="?page=order" ><button class="btn btn-warning" >Daftar Pesanan <i class="glyphicon glyphicon-shopping-cart"></i></button></a>
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
          <!--<h4 style="padding-right:15px; padding-left:15px;">allin</h4>
          <hr style="border-top:1px solid #fff; margin:5px 15px 15px 15px">-->
          <?php
          $query        = $DB_conn->query("SELECT * FROM `konten` WHERE `user` = '$user_id'");
          $row          = $query->num_rows;

          if($query !== ""){
            for ($x = 0; $x < $row; $x++) { 
              $result2[]     = $query->fetch_assoc();
              $judulmenu     = $result2[$x]['judul'];
              $deleteMenu    = "deleteMenu" . $x;
              $addToPromo    = "addToPromo" . $x;
      //echo var_dump($_POST[$addToMenu]);

              if(isset($_POST[$deleteMenu])) {

                if($user->deleteMenu($judulmenu)===TRUE){
                  echo"
              <script>
              swal(
                'Berhasil',
                'Menu telah dihapus!',
                'success'
              )
              </script>
              <script>
              setTimeout(function() {
              window.location.reload(0);
              }, 3000);
              </script>";
                }

              }
              if(isset($_POST[$addToPromo])===TRUE) {
                echo"
              <script>
              swal(
                'Berhasil',
                'Menu ditambahkan ke promo',
                'success'
              )
              </script>";

                if($user->addToPromo($judulmenu)){
                }

                

              }


              ?>
              <div class="col-sm-4 col-md-4">
               <div class="thumbnail"  style="width:350px; height:650px">
                <img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;" >
                <div class="caption">
                 <h4 class="title"><?php echo $result2[$x]['judul']; ?></h4>
                 <p><?php echo $result2[$x]['deskripsi']; ?></p>
                 <table>
                    <tr>
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

                     <tr>
                      <td>Harga</td>
                      <td><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></td>
                    </tr>


                 </table>

                
                <br>
                <form method="post">
                  <input type="text" name="judul" class="btn btn-default" value="<?php echo $result2[$x]['judul']; ?>" style="width:100%"disabled>
                 <p>
                    <br><br>
                    <a href="?page=edit-menu&id=<?php echo $result2[$x]['id_konten']; ?>" class="btn btn-warning">Sunting</a>
                    
                    <input type="submit" name="<?php echo $deleteMenu; ?>" class="btn btn-danger" value="Hapus">
                    <input type="submit" name="<?php echo $addToPromo; ?>" class="btn btn-primary" value="Tambah ke Promo">
                    <!-- <a href=""  role="button" data-toggle="modal" data-target="?page=edit-menu"></a> -->
                    <a></a>
                  </form>
                  <br>
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
  $query1        = $DB_conn->query("SELECT * FROM `comment` WHERE `user` = '$user_id'");
  $row1          = $query->num_rows;
  $seller        = $user_id;
  // if(isset($_POST['comment'])){
  //   $commentText  = $_POST['addComment'];

  //   if($user->addComment($commentText,$user_id,$seller)){
  //   }
  // }
  ?>
  <div id="menu3" class="tab-pane">
    <h2>Ulasan</h2>
    <p>Berikan ulasan untuk catering ini</p>
    <?php
    // if(isset($_POST['comment'])){
  //   $commentText  = $_POST['addComment'];

  //   if($user->addComment($commentText,$user_id,$seller)){
  //   }
  // }
    ?>
    
          <script type="text/javascript">
            $(document).ready(function() {
              $('#submitComment').click(function(){
                var tampil =  $('#addComment').val();
                var tampil2 = '<hr style="border-top:1px solid #fff"><div class="media-left">'+
                                '<img width="45px" height="45px" src="'+ $('#pict').val() +'" class="media-object" style="width:45px"></div>'+
                                '<div class="media-body">'+
                                '<h4 class="media-heading">'+ $('#commentor').val() +'<small><i> Dikirim pada <?php echo date("d-m-Y");?></i></small></h4>'+
                                '<p>'+ $('#addComment').val() +'</p>'+
                                '0<a style="color: #95A5A6"> <i class="fa fa-thumbs-up like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Suka"></i></a>&nbsp;&nbsp;'+
                                '0<a style="color: #95A5A6"> <i class="fa fa-thumbs-down like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Tidak suka"></i></a></div>';
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
      if($query1 !== ""){
        $query6        = $DB_conn->query("SELECT * FROM `comment` WHERE `user` = '$seller'");
        $row4          = $query6->num_rows;
        for ($s = 0; $s < $row4; $s++) { 
          $result3[]     = $query1->fetch_assoc();
          $userpict      = $result3[$s]['commentor'];
          $query4        = $DB_conn->query("SELECT * FROM `user` WHERE `user` = '$userpict'");
          $result4[]     = $query4->fetch_assoc(); 
          ?>

        <hr style="border-top:1px solid #fff">
        <div class="media-left">
          <img src=" 
          <?php  
          if ($result4[$s]['picture']=="" || $result4[$s]['picture']=="ProfPict/") {
            echo "ProfPict/default-pict.jpg";
          }else{
            echo $result4[$s]['picture'];
          } 
      ?>" class="media-object" style="width:45px">
        </div>

        <div class="media-body">
            <input id="idkomen" hidden="true" type="text" value="<?php echo $result3[$s]['id_comment']; ?>" />
            <h4 class="media-heading"><?php echo $result3[$s]['commentor']; ?> <small><i> Dikirim pada <?php echo $result3[$s]['date']; ?></i></small></h4>
            <p><?php echo $result3[$s]['comment']; ?></p>
            <span id="hasil"><?php echo $result3[$s]['like'];  ?></span> <a style="color: #95A5A6" href="comment.php?aksi=like&user=<?php echo $result[0]['user'];?>&id=<?php echo $result3[$s]['id_comment'];?>"><i class="fa fa-thumbs-up like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Suka" ></i></a>&nbsp;&nbsp;
            <?php echo $result3[$s]['dislike'];  ?><a style="color: #95A5A6" href="" id="dislike"> <i class="fa fa-thumbs-down like" aria-hidden="true" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" title="Tidak suka"></i></a>
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
                  <input type="hidden" value="<?php echo  $result[0]['user'];  ?>" id="user"></input>
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
                   <img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "image/terlaris1.jpg";} ?>" style="width:480px;">
                 </div>
                 <div class="col-md-4">
                  <h3><?php echo $result2[$x]['judul']; ?></h3>
                  <h4 style="color:#F9AE2C"><b>Rp. <?php echo $result2[$x]['harga']; ?> </b></h4>
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
                    <div class="col-md-2" style="padding-top:10px"><p> Jumlah</p></div>
                    <div class="col-md-2"><input type="number" class="form-control bfh-number" value="5" style="width:65px"></input></div>
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
}}?>

<!--Content End-->
