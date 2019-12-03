<?php
if(isset($_GET['delivered'])){
	echo"
      <script>
      swal(
        'Segera Kirim Pesanan',
        'Alhamdulillah!',
        'success'
      )
      </script>";
}
?>
<div class="container">
	<div class="jumbotron"  style="margin-top:10px; margin-bottom:0px; "> 
		<h3>Daftar Pesanan</h3>
  		<hr style="border-top:1px solid #fff"> 
		<table class="table table-hover">
		<?php

		$query_order	= $DB_conn->query("SELECT * FROM `order` WHERE `penjual` = '$user_id'");
		$row_order 		= $query_order->num_rows;
		$result_order	= $query_order->fetch_all();
		foreach ($result_order as $data) {
			$temp				= array();
			$temp['id_cart']	= $data[0];
			$temp['id_konten']	= $data[1];
			$temp['pemesan']	= $data[2];
			$temp['penjual']	= $data[3];
			$temp['qty']		= $data[4];
			$temp['jumlah']		= $data[5];
			$temp['date']		= $data[7];
			$result[]			= $temp;
		}

		
		?>
		    <thead>
		      <tr>
		        <th>No Order</th>
		        <th>Nama</th>		        
		        <th>Telepon</th>
		        <th>Tanggal Pesanan</th>
		       
		        
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    for ($i=1; $i <= $row_order; $i++) {
		    	$pemesan 		= $result[$i]['pemesan'];
		    	$query_number 	= $DB_conn->query("SELECT `telepon` FROM `user` WHERE `user` = '$pemesan'");
		    	$number[] 		= $query_number->fetch_assoc();
		    	$pemesan 		= $result[$i]['pemesan'];
		    	
		  //   	echo "<pre>";
				// echo var_dump($menu);
				// echo "</pre>";
		     ?>
		    	<tr>
		        <td><a href="?page=vieworder&pemesan=<?php echo $pemesan; ?>" style="color:#141414"><?php echo $result[$i]['id_cart']; ?></a></td>
		        <td><a href="?page=vieworder&pemesan=<?php echo $pemesan; ?>" style="color:#141414"><?php echo $result[$i]['pemesan']; ?></a></td>
		        <td><a href="?page=vieworder&pemesan=<?php echo $pemesan; ?>" style="color:#141414"><?php echo $number[$i-1]['telepon']; ?></a></td>
		        <td><a href="?page=vieworder&pemesan=<?php echo $pemesan; ?>" style="color:#141414"><?php echo $result[$i]['date']; ?></a></td>
		      </tr>
		      <?php
		    }
		    ?>
		      
		    </tbody>
		  </table>
		  <!-- INI MULAI HISTORY -->
		  <h3>Riwayat Pesanan</h3>
  		<hr style="border-top:1px solid #fff"> 
		<table class="table table-hover">
		<?php
		$query_order1	= $DB_conn->query("SELECT * FROM `delivered` WHERE `penjual` = '$user_id'");
		$row_order1 	= $query_order1->num_rows;
		$result_order1	= $query_order1->fetch_all();

		foreach ($result_order1 as $data1) {
			$temp1				= array();
			$temp1['id_cart']	= $data1[0];
			$temp1['id_konten']	= $data1[1];
			$temp1['pemesan']	= $data1[2];
			$temp1['penjual']	= $data1[3];
			$temp1['qty']		= $data1[4];
			$temp1['jumlah']	= $data1[5];
			$temp1['date']		= $data1[7];
			$result1[]			= $temp1;
		}

		
		?>
		    <thead>
		      <tr>
		        <th>No Order</th>
		        <th>Nama</th>		        
		        <th>Telepon</th>
		        <th>Tanggal Pesanan</th>
		       
		        
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    for ($r=0; $r < $row_order1; $r++) {
		    	$pemesan1 		= $result1[$r]['pemesan'];
		    	$query_number1 	= $DB_conn->query("SELECT `telepon` FROM `user` WHERE `user` = '$pemesan1'");
		    	$number1[] 		= $query_number1->fetch_assoc();
		    	$pemesan1 		= $result1[$r]['pemesan'];
		    	
		  //   	echo "<pre>";
				// echo var_dump($number1);
				// echo "</pre>";
		     ?>
		    	<tr>
		        <td><?php echo $result1[$r]['id_cart']; ?></td>
		        <td><?php echo $result1[$r]['pemesan']; ?></td>
		        <td><?php echo $number1[$r]['telepon']; ?></td>
		        <td><?php echo $result1[$r]['date']; ?></td>
		      </tr>
		      <?php
		    }
		    ?>
		      
		    </tbody>
		  </table>
	</div>
</div>