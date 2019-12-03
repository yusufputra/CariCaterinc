<div class="container" style="padding:20px; margin-top:50px; height:658px;">
    <div class="text-right">
        <a href="?page=status-order"><button class="btn btn-warning" >Cek Status <i class="fa fa-hourglass-1 "></i></button></a>
    </div>
    <center><h2> Keranjang </h2></center>
    <div class="container">
    <div class="row">
    <?php
    //require_once 'connection.php';
    error_reporting(0);
    if(!$user->is_loggedin())
                    {
                        $user->redirect('?page=login');
                    }

              if(isset($_GET['done'])){
                echo"
              <script>
              swal(
                'Data Ditambahkan ke Proses',
                'Harap Cek Status',
                'success'
              )
              </script>";
              
              }


    $query    = $DB_conn->query("SELECT * FROM `cart` WHERE `pemesan` = '$user_id'");
    $row      = $query->num_rows;
    $query1   = $DB_conn->query("SELECT SUM( jumlah ) AS total FROM `cart` WHERE `pemesan` = '$user_id'");
    $total[]  = $query1->fetch_assoc();

    //echo var_dump($row);
    ?>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <hr>
            <?php
                if ($total[0]['total'] > 0) { ?>
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:200px">Produk</th>
                        <th style="width:100px">Jumlah</th>
                        <th class="text-center" style="width:150px">Harga</th>
                        <th class="text-center" style="width:150px">Total</th>
                        <th style="width:200px"> </th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if($query !== ""){


                    for ($i=1; $i <= $row; $i++) {
                        $result[]   = $query->fetch_assoc();
                        $id_konten  = $result[$i]['id_konten'];
                        $menu_sql   = $DB_conn->query("SELECT `judul` FROM `konten` WHERE `id_konten` = '$id_konten'");
                        $menu[]     = $menu_sql->fetch_assoc();
                        $deletecart = "deletecart" . $i;
                        

                        if(isset($_POST[$deletecart])){
                            if($user->deleteCart($id_konten)){
                                $user->redirect('?page=cart');
                            }
                        }
                        //echo var_dump($menu);
                     ?>
                        <tr>
                        <td class="col-sm-8 col-md-6"><?php echo $menu[$i-1]['judul']; ?></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $result[$i]['qty']; ?>" disabled>
                        </td>
                            <?php 
                            $harga = $result[$i]['jumlah'] / $result[$i]['qty'];
                            ?>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo "Rp ".number_format($harga,0,",","."); ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo "Rp ".number_format($result[$i]['jumlah'],0,",","."); ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-right">
                            <form method="post">
                            <input type="submit" class="btn btn-danger" name="<?php echo $deletecart; ?>" value="Hapus">
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    
                }
                ?>
                    
                    
                    <!--<tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>-->
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right" width="500px" colspan="2"><h3><strong>Total 
                            <?php echo "Rp ".number_format($total[0]['total'],0,",","."); ?>
                        </strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="?page=search" ><button type="button" class="btn btn-default">
                            Lanjut Belanja  <span class="glyphicon glyphicon-shopping-cart"></span>
                        </button></td></a>
                        <td>
                        <button type="button" class="btn btn-success">
                            <a href="?page=confirm&pemesan=<?php echo $user_id; ?>">Konfirmasi</a> <span class="glyphicon glyphicon-credit-card"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
                  <?php } 
                  else{
                    echo "<h3 class='text-center'>Anda belum memesan, silahkan pesan terlebih dahulu !</h3>";
                  }
                  ?>
            
        </div>    
    </div>
</div>
  </div>