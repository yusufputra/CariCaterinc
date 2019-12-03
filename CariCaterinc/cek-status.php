<div class="container" style="padding:20px; margin-top:50px">    
    <center><h2> Dalam Proses </h2></center>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <hr>
            <?php 
            $query2    = $DB_conn->query("SELECT * FROM `order` WHERE `pemesan` = '$user_id'");
            $row2      = $query2->num_rows;
            $result2[]   = $query2->fetch_all();
            $query12   = $DB_conn->query("SELECT SUM( jumlah ) AS total FROM `order` WHERE `pemesan` = '$user_id'");
            $total2[]  = $query12->fetch_assoc();

            if($total2[0]['total'] > 0) { ?> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:200px">Produk</th>
                        <th style="width:200px">Tanggal</th>
                        <th style="width:100px">Jumlah</th>
                        <th class="text-center" style="width:150px">Harga</th>
                        <th class="text-center" style="width:150px">Total</th>
                    </tr>
                </thead>

                <tbody>
                <?php
               

                if($query2 !== ""){

                        // sek teko kene
                    for ($r=0; $r < $row2; $r++) {
                        
                        $id_konten2  = $result2[0][$r][1];
                        $menu_sql2   = $DB_conn->query("SELECT `judul` FROM `konten` WHERE `id_konten` = '$id_konten2'");
                        $menu2[]     = $menu_sql2->fetch_assoc();
                        // echo var_dump($menu2);
                        
                        // $deletecart = "deletecart" . $i;
                        

                        // if(isset($_POST[$deletecart])){
                        //     if($user->deleteCart($id_konten)){
                        //         $user->redirect('?page=cart');
                        //     }
                        // }
                        //echo var_dump($menu);
                     ?>
                        <tr>
                        <td class="col-sm-8 col-md-6"><?php echo $menu2[$r]['judul']; ?></td>
                        <td class="col-sm-8 col-md-6"><?php echo $result2[0][$r][7] ?></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $result2[0][$r][4]; ?>" disabled>
                        </td>
                            <?php 
                            $harga2 = $result2[0][$r][5] / $result2[0][$r][4];
                            ?>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo "Rp ".number_format($harga2,0,",","."); ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo "Rp ".number_format($result2[0][$r][5],0,",","."); ?></strong></td>
                    </tr>
                    <?php
                    }
                    
                }
                ?>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right" width="500px" colspan="3"><h3><strong>Total
                            <?php echo "Rp ".number_format($total2[0]['total'],0,",","."); ?></strong></h3>
                        </td>
                        
                    </tr>

                    </tr>
                </tbody>
            </table>
            <?php }else {
                echo "<center><h3>Tidak ada data</h3></center><br><br>";
            } ?>
        </div>

        <center><h2> Diterima </h2></center>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <hr>
            <?php
            $query3    = $DB_conn->query("SELECT * FROM `delivered` WHERE `pemesan` = '$user_id'");
            $row3      = $query3->num_rows;
            $result3[]   = $query3->fetch_all();
            $query13   = $DB_conn->query("SELECT SUM( jumlah ) AS total FROM `delivered` WHERE `pemesan` = '$user_id'");
            $total3[]  = $query13->fetch_assoc();
                    
            if($total3[0]['total'] > 0){
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:200px">Produk</th>
                        
                        <th style="width:100px">Jumlah</th>
                        <th class="text-center" style="width:150px">Harga</th>
                        <th class="text-center" style="width:150px">Total</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                
                if($query3 !== ""){

                        // sek teko kene
                    for ($q=0; $q < $row3; $q++) {
                        
                        $id_konten3  = $result3[0][$q][1];
                        $menu_sql3   = $DB_conn->query("SELECT `judul` FROM `konten` WHERE `id_konten` = '$id_konten3'");
                        $menu3[]     = $menu_sql3->fetch_assoc();
                        // echo var_dump($menu2);
                        
                        // $deletecart = "deletecart" . $i;
                        

                        // if(isset($_POST[$deletecart])){
                        //     if($user->deleteCart($id_konten)){
                        //         $user->redirect('?page=cart');
                        //     }
                        // }
                        //echo var_dump($menu);
                     ?>
                        <tr>
                        <td class="col-sm-8 col-md-6"><?php echo $menu3[$q]['judul']; ?></td>
                        
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $result3[0][$q][4]; ?>" disabled>
                        </td>
                            <?php 
                            $harga3 = $result3[0][$q][5] / $result3[0][$q][4];
                            ?>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rp <?php echo $harga3; ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rp <?php echo $result3[0][$q][5]; ?></strong></td>
                    </tr>
                    <?php
                    }
                    
                }
                ?>
                    

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right" width="500px" colspan="3"><h3><strong>Total
                            <?php echo "Rp ".number_format($total3[0]['total'],0,",","."); ?></strong></h3>
                        </td>
                    </tr>
                
                    </tr>
                </tbody>
            </table>
            <?php
        }else{
            echo "<center><h3>Tidak ada data</h3></center><br><br>";
        }
            ?>
        </div>
</div>