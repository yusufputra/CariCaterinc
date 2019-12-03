    <!-- Content Header (Page header) -->
    <?php
    if(isset($_GET['edited'])){
      echo"
      <script>
      swal(
        'Data Teredit',
        'Alhamdulillah!',
        'success'
      )
      </script>";
    }
    if(isset($_GET['added'])){
      echo"
      <script>
      swal(
        'Data Ditambahkan',
        'Alhamdulillah!',
        'success'
      )
      </script>";
    }
    if(isset($_GET['page']) & isset($_GET['deleted'])){
      echo"
    <script>
    swal(
      'Data Terhapus',
      'Alhamdulillah!',
      'success'
    )
    </script>";
    
    }
    ?>
    <section class="content-header">
      <h1>
        Slider
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa  fa-gears"></i> Home</a></li>
        <li class="active">Halaman Depan</li>
        <li class="active">Slider</li>
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
              <a href="?page=addslider"><span class="glyphicon glyphicon-plus" align="right"></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Aksi</th>
                </tr>
                <?php
                
                
                $query2     = $DB_conn->query("SELECT * FROM `slider`");
                $row2       = $query2->num_rows;
                //$result2    = $query2->fetch_all();
                 foreach ($query2->fetch_all() as $data) {
                   $tmp                = array();
                   $tmp['id']          = $data[0];
                   $tmp['gambar']      = $data[1];
                   $tmp['judul']   = $data[2];
                   $result2[] = $tmp;
                 }
                //echo "<pre>";
                //echo var_dump($result2);
                //echo "</pre>";
                for ($i=0; $i < $row2; $i++) {?> 
                  <tr>
                  <td><?php echo $result2[$i]['id']; ?></td>
                  <td><img width="100em" src="<?php echo "../" . $result2[$i]['gambar']; ?>"></td>
                  <td><?php echo $result2[$i]['judul']; ?></td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="?page=editslider&id=<?php echo $result2[$i]['id']; ?>">Edit</a></li>
                        <li><a href="?page=deleteslider&id=<?php echo $result2[$i]['id']; ?>">Hapus</a></li>
                        
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