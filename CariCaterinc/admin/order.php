    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Home</a></li>
        <li class="active">Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!--Responsive Table-->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php
            $query    = $DB_conn->query("SELECT * FROM `cart`");
            $row      = $query->num_rows;
            $query1   = $DB_conn->query("SELECT SUM( jumlah ) AS total FROM `cart` WHERE `pemesan` = '$user_id'");
            $total[]  = $query1->fetch_assoc();
            ?>
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
                <?php
                for ($i=1; $i <= $row; $i++) { 
                  $result[]   = $query->fetch_assoc();
                  $id_konten  = $result[$i]['id_konten'];
                  $menu_sql   = $DB_conn->query("SELECT `judul` FROM `konten` WHERE `id_konten` = '$id_konten'");
                  $menu[]     = $menu_sql->fetch_assoc();
                  ?>
                  <tr>
                  <td><?php echo $result[$i]['id_cart']; ?></td>
                  <td><?php echo $menu[$i-1]['judul']; ?></td>
                  <td><?php echo $result[$i]['qty']; ?></td>
                  <?php 
                            $harga = $result[$i]['jumlah'] / $result[$i]['qty'];
                            ?>
                  <td>Rp <?php echo $harga; ?></td>
                  <td>Rp <?php echo $result[$i]['jumlah']; ?></td>
                </tr>
                  <?php
                }
                ?>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->