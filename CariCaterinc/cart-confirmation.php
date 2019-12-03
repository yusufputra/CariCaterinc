  <div class="container" style="margin-top:50px; margin-bottom:50px">
    <center><h1> Konfirmasi </h1></center>
    <hr>
    <?php
    if(isset($_POST['pesan'])){
      $note   = $_POST['note'];
      $date   = date("d F Y h:i:s");
      // echo var_dump($date);
      if($user->addToOrder($note,$user_id,$date) & $user->deleteOrder($user_id)){
        $user->redirect('?page=cart&done');
      }
    }
    if(isset($_GET['page']) && isset($_GET['pemesan'])){
      $pemesan          = $_GET['pemesan'];

      $query_client     = $DB_conn->query("SELECT * FROM `user` WHERE `user` = '$pemesan'");
      $result_client    = $query_client->fetch_assoc();
      
    }
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h3>Info Pemesan</h3>
          <hr>
            <table class="table table-bordered">
            <tbody>
                <tr>
                  <td>Nama Lengkap</td>
                  <td><input type="text" class="form-control" value="<?php echo $result_client['name']; ?>" disabled/></td>
                </tr>
                <tr>
                  <td>Nomor Telepon</td>
                  <td><input type="text" class="form-control" value="<?php echo $result_client['telepon']; ?>" disabled/></td>
                </tr>
                <tr>
                  <td>Alamat Rumah</td>
                  <td><input type="text" class="form-control" value="<?php echo $result_client['alamat']; ?>" disabled/></td>
                </tr>
                
            </tbody>
        </table>
                
        </div>
        <div class="col-md-6 ">
        <?php
        if(isset($_GET['page']) && isset($_GET['pemesan'])){
          $pemesan          = $_GET['pemesan'];

          $query_cart       = $DB_conn->query("SELECT * FROM `cart` WHERE `pemesan` = '$pemesan'");
          $row_cart         = $query_cart->num_rows;
          $result_cart[]    = $query_cart->fetch_all();
          $query1           = $DB_conn->query("SELECT SUM( jumlah ) AS total FROM `cart` WHERE `pemesan` = '$pemesan'");
          $total[]          = $query1->fetch_assoc();
          
        }
        ?>
          <h3>Detail Pesanan</h3>
          <hr>
            <table class="table">
                <tbody>
                <?php
                for ($i=0; $i < $row_cart; $i++) {
                $id_menu        = $result_cart[0][$i][1];
                $query_menu     = $DB_conn->query("SELECT `judul` FROM `konten` WHERE `id_konten` = '$id_menu'");
                $result_menu[] = $query_menu->fetch_assoc();
                
                
                ?>

                    <tr>
                        <td class="col-md-6"><h5><span><?php echo $result_cart[0][$i][4]; ?>x <span><strong> <?php echo $result_menu[$i]['judul']; ?></strong></h5></td>
                        <td class="col-md-6 text-right"><h5><strong><?php echo "Rp ".number_format($result_cart[0][$i][5],0,",","."); ?></strong></h5></td>
                    </tr>
                <?php
                }
                ?>    
                    
                    <tr>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo "Rp ".number_format($total[0]['total'],0,",","."); ?></strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <form method="post">
            <textarea name="note" placeholder="Tambahkan informasi tambahan untuk penjual" style="width:100%; margin-bottom:10px" class="form-control"></textarea>
            <input type="submit" name="pesan" class="btn btn-warning" value="Pesan Sekarang">
            <!-- <button type="button" class="btn btn-success" style="width:100%; padding:10px">
              <span class="glyphicon glyphicon-shopping-cart"></span> Pesan Sekarang
            </button> -->
            </form>
        </div>
    </div>
</div>
  </div>
