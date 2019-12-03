    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php
    $query1        = $DB_conn->query("SELECT * FROM `user` WHERE `seller` = '0'");
    $Pembeli       = $query1->num_rows;
    $query2        = $DB_conn->query("SELECT * FROM `user` WHERE `seller` = '1'");
    $Penjual       = $query2->num_rows;
    $query3        = $DB_conn->query("SELECT * FROM `konten`");
    $produk        = $query3->num_rows;
    $query4        = $DB_conn->query("SELECT * FROM `comment`");
    $comment       = $query4->num_rows;
    ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo "$comment"; ?></h3>

              <p>Jumlah Komentar</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?page=komentar" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo "$produk"; ?><!--<sup style="font-size: 20px">%</sup>--></h3>

              <p>Jumlah Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?page=produk" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo "$Penjual"; ?></h3>

              <p>Jumlah Penjual</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=penjual" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo "$Pembeli"; ?></h3>

              <p>Jumlah Pembeli</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=pembeli" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!--Responsive Table-->
      
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->