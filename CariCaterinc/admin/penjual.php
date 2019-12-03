    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penjual
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Kontrol Panel</li>
        <li class="active">Penjual</li>
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                <?php
                
                
                $query2     = $DB_conn->query("SELECT * FROM `user` WHERE `seller` = '1'");
                $row2       = $query2->num_rows;
                 foreach ($query2->fetch_all() as $data) {
                   $tmp              = array();
                   $tmp['id']        = $data[0];
                   $tmp['name']      = $data[1];
                   $tmp['user']      = $data[2];
                   $tmp['email']     = $data[4];
                   $tmp['telepon']   = $data[5];
                   $tmp['alamat']    = $data[6];
                   $result2[] = $tmp;
                 }
                //echo "<pre>";
                //echo var_dump($result2[1]['name']);
                //echo "</pre>";
                for ($i=0; $i < $row2; $i++) {?> 
                  <tr>
                  <td><?php echo $result2[$i]['id']; ?></td>
                  <td><?php echo $result2[$i]['name']; ?></td>
                  <td><?php echo $result2[$i]['user']; ?></td>
                  <td><?php echo $result2[$i]['email']; ?></td>
                  <td><?php echo $result2[$i]['telepon']; ?></td>
                  <td><?php echo $result2[$i]['alamat']; ?></td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <!-- <li><a href="?page=editseller&id=<?php //echo $result2[$i]['id']; ?>">Edit</a></li> -->
                        <li><a href="?page=delete&id=<?php echo $result2[$i]['id']; ?>">Hapus</a></li>
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