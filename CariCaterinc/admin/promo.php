    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Home</a></li>
        <li class="active">Promo</li>
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
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Judul</th>
                  <th>Desc</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                <?php 
                $query1   = $DB_conn->query("SELECT * FROM `promo`");
                $row      = $query1->num_rows;

                //$result = $query1->fetch_all();
	                foreach ($query1->fetch_all() as $dataa) {
	                   $tmp              = array();
	                   $tmp['id']        = $dataa[0];
	                   $tmp['judul']     = $dataa[1];
	                   $result[] = $tmp;
	                 }

                for ($i=1; $i <= $row; $i++) {
                	$judul 	= $result[$i]['judul'];
                	$query3 = $DB_conn->query("SELECT * FROM `konten` WHERE `judul` = '$judul'");
                	$row3	= $query3->num_rows;
                	$menu = $query3->fetch_all();

                	for ($j=0; $j < $row3; $j++) { 
                		?> 
                  <tr>
                  <td><?php echo $menu[0][0]; ?></td>
                  <td><?php echo $menu[0][1]; ?></td>
                  <td><?php echo $menu[0][2]; ?></td>
                  <td><?php echo $menu[0][3]; ?></td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <!-- <li><a href="?page=editpromo&id=<?php //echo $menu[0][0]; ?>">Edit</a></li> -->
                        <li><a href="?page=deletepromo&id=<?php echo $result[$i]['id']; ?>">Hapus</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <?php
                	}
                
                 
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