    <!-- Content Header (Page header) -->
    <?php
              if(isset($_GET['page']) & isset($_GET['done'])){
                echo"
              <script>
              swal(
                'Data Sudah Dipindah',
                'Alhamdulillah!',
                'success'
              )
              </script>";
              
              }
              ?>
    <section class="content-header">
      <h1>
        Produk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cutlery"></i> Home</a></li>
        <li class="active">Produk</li>
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
                
                
                $query2     = $DB_conn->query("SELECT * FROM `konten`");
                $row2       = $query2->num_rows;
                //$result2    = $query2->fetch_all();
                 foreach ($query2->fetch_all() as $data) {
                   $tmp              = array();
                   $tmp['id']        = $data[0];
                   $tmp['judul']     = $data[1];
                   $tmp['desc']      = $data[2];
                   $tmp['harga']     = $data[3];
                   $result2[] = $tmp;
                 }
                //echo "<pre>";
                //echo var_dump($result2);
                //echo "</pre>";
                for ($i=0; $i < $row2; $i++) {?> 
                  <tr>
                  <td><?php echo $result2[$i]['id']; ?></td>
                  <td><?php echo $result2[$i]['judul']; ?></td>
                  <td><?php echo $result2[$i]['desc']; ?></td>
                  <td><?php echo $result2[$i]['harga']; ?></td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <!-- <li><a href="?page=editproduct&id=<?php //echo $result2[$i]['id']; ?>">Edit</a></li> -->
                        <li><a href="?page=delete-product&id=<?php echo $result2[$i]['id']; ?>">Hapus</a></li>
                        <li><a href="?page=addslider&id=<?php echo $result2[$i]['id']; ?>">Add To Slider</a></li>
                      </ul>
                    </div>
                  </td>
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