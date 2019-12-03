    <!-- Content Header (Page header) -->
<?php 
if(isset($_GET['deleted'])){
  echo"
      <script>
      swal(
        'Data Telah Dihapus',
        'Alhamdulillah!',
        'success'
      )
      </script>";
}
?>
    <section class="content-header">
      <h1>
        Komentar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa  fa-comment"></i> Home</a></li>
        <li class="active">Komentar</li>
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
                  <th>Comment</th>
                  <th>Commentor</th>
                  <th>User</th>
                  <th>Aksi</th>
                </tr>
                <?php
                
                
                $query2     = $DB_conn->query("SELECT * FROM `comment`");
                $row2       = $query2->num_rows;
                 foreach ($query2->fetch_all() as $data) {
                   $tmp              = array();
                   $tmp['id']        = $data[0];
                   $tmp['comment']   = $data[1];
                   $tmp['commentor'] = $data[2];
                   $tmp['user']      = $data[3];
                   $result2[] = $tmp;
                 }
                //echo "<pre>";
                //echo var_dump($result2[1]['name']);
                //echo "</pre>";
                for ($i=0; $i < $row2; $i++) {?> 
                  <tr>
                  <td><?php echo $result2[$i]['id']; ?></td>
                  <td><?php echo $result2[$i]['comment']; ?></td>
                  <td><?php echo $result2[$i]['commentor']; ?></td>
                  <td><?php echo $result2[$i]['user']; ?></td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        
                        <li><a href="?page=deletekomentar&id=<?php echo $result2[$i]['id']; ?>">Hapus</a></li>
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