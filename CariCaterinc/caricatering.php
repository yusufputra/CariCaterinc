<?php
if(isset($_GET['carted'])){
	echo"
	<script>
	swal(
		'Data Ditambahkan ke Keranjang',
		'Cek Keranjang!',
		'success'
		)
</script>";
}
?>
<div class="container">
	<div class="jumbotron" style="margin-top:10px; margin-bottom:0px; height:100%;">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#hmenu1" style="color:#191919">Cari</a></li>
			<li><a data-toggle="tab" href="#menu2" style="color:#191919">Filter</a></li>
		</ul>

		<!--Tab Content-->
		<div class="tab-content">
			<div id="hmenu1" class="tab-pane fade in active">
				<br>
				<form method="post">
					<h4>Cari Produk Yang Ingin Dibeli</h4>
					<div class="col-sm-9 col-md-9">
						<div class="form-group has-feedback">
							<input class="form-control" type="text" name="txt_key" placeholder="Masukkan Nama Produk Makanan" value="" />
						</div>
					</div>
					<div class="col-md-3 col-md-3">
						<div class="form-group has-feedback">
							<button style="width:100%" type="submit" name="btn-src" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Cari</button>
						</div>
					</div>
				</form>
			</div>
			<div id="menu2" class="tab-pane fade">
				<br>
				<h4>Filter Pencarian Produk</h4>
				
				<!--<div class="row">-->
				<!--    <div class="col-sm-3 col-md-3">-->
				<!--        <label for="name">Kota</label>-->
				<!--    </div>-->
				<!--    <form method="post">-->
				<!--        <div class="row">-->
				<!--            <div class="col-sm-3 col-md-3">-->
				<!--                <select name="city" class="form=control">-->
				<!--                    <option va></option>-->
				<!--                </select>-->
				<!--            </div>-->
				  <!--      <div class="col-sm-3 col-md-3">-->
						<!--	<div class="form-group has-feedback">-->
						<!--		<button style="width:100%" type="submit" name="btn-fltrcty" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> &nbsp;Filter</button>-->
						<!--	</div>-->
						<!--</div>-->
				<!--        </div>-->
				<!--    </form>-->
				<!--</div>-->
				// <?php
				//  if(isset($_POST['btn-fltrcty'])){
				//     //  isinya
				//  }
				// ?>
				<div class="row">
					<div class="col-sm-3 col-md-3">
						<label for="name">Kategori Menu</label>
					</div>
					<div class="col-sm-3 col-md-3">
						<label for="name">Waktu Antar</label>
					</div>
					<div class="col-sm-3 col-md-3">
						<label for="name">Min. Order</label>
					</div>
					<div class="col-sm-3 col-md-3">
					</div>
				</div>
				<form method="post">
					<div class="row">
						<div class="col-sm-3 col-md-3">
							<select name="category" class="form-control">
								<option value="sehat">Makanan Sehat</option>
								<option value="diet">Diet Mayo</option>
								<option value="camilan">Camilan</option>
							</select>
						</div>
						<div class="col-sm-3 col-md-3">
							<select name="times" class="form-control">
								<option value="pagi">Pagi</option>
								<option value="siang">Siang</option>
								<option value="malam">Malam</option>
							</select>
						</div>
						<div class="col-sm-3 col-md-3">
							<select name="quantity" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group has-feedback">
								<button style="width:100%" type="submit" name="btn-fltr" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> &nbsp;Filter</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<?php
				require_once 'connection.php';

				if(isset($_POST['btn-fltr']) or isset($_POST['btn-src'])){

					if(isset($_POST['btn-src']))
					{

						$keyword      = $_POST['txt_key'];
						$query        = $DB_conn->query("SELECT * FROM `konten` WHERE `judul` LIKE  '%$keyword%'");
						$row          = $query->num_rows;

						if($keyword !== ""){
							for ($x = 0; $x < $row; $x++) { 
								$result2[]     = $query->fetch_assoc();
								?>
								<div class="col-md-4">
									<div class="thumbnail"  >
										<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;"  alt="steamed-and-roast-chicken">
										<div class="caption">
											<h4 class="title"><?php echo $result2[$x]['judul']; ?></h4>
											<p><?php echo $result2[$x]['deskripsi']; ?></p>
											<p><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></p>
											<p><b>Penjual : <a href="?page=seller&user=<?php echo $result2[$x]['user']; ?>"style="color:#F9AE2C"><?php echo $result2[$x]['user'];  ?><a/></b></p>
											<br>
											<p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $x; ?>">Lihat detail »</a></p>
										</div>
									</div>
								</div>
								<?php
							}
							if($query !== ""){
								for ($x = 0; $x < $row; $x++) { 
									$result2[]     = $query->fetch_assoc();
									$seller 	   = $result2[$x]['user'];
									$harga  	   = $result2[$x]['harga'];
									$addtocart 	   = "addtocart".$x;
									$cart		   = "cart".$x;
									$qty 		   = "qty".$x;
									$namemin  = "min" . $x;



									if(isset($_POST[$addtocart])){
										if(!$user->is_loggedin())
										{
											?>

											<script type="text/javascript">
											window.location.href = '?page=login';
											</script><?php
										}else{
											$cart 		   = $_POST[$cart];
										// $qty 		   = $_POST[$qty];
											$qty         = intval($_POST[$qty]);
											$tot         = intval($_POST[$namemin]);
											$pem  = $qty > $tot;
											if($qty > $tot){
												if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
													?>

													<script type="text/javascript">
													window.location.href = '?page=search&carted';
													</script><?php
												}}else{
													echo"
													<script>
													swal(
														'Jumlah lebih sedikit',
														'Tambah Jumlah',
														'error'
														)
</script>";
}
}
}
?>
<div class="modal fade" id="<?php echo "pilihan" . $x; ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Menu</h4>
			</div>

			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-5" style="width:500px">
							<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:480px;">
						</div>
						<div class="col-md-4">
							<h3><?php echo $result2[$x]['judul']; ?></h3>
							<h4 style="color:#F9AE2C"><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?> </b></h4>
							<p><?php echo $result2[$x]['deskripsi']; ?></p>
							<table style="margin:10px; color : #95A5A6 ">
								<tr cellpadding="10" >
									<td style="width:150px">Waktu Antar</td>
									<td><?php echo $result2[$x]['waktu']; ?></td>
								</tr>
								<tr>
									<td>Min Order</td>
									<td><?php echo $result2[$x]['minor']; ?> pcs</td>
								</tr>
								<tr>
									<td>Kategori Makanan</td>
									<td><?php echo $result2[$x]['kategori_makan']; ?></td>
								</tr>
							</table>
							<br>
							<div class="row">
								<form method="post">
									<input type="text" class="hidden" name="<?php echo $cart; ?>" value="<?php echo $result2[$x]['id_konten']; ?>"><br>
									<div class="col-md-2" style="padding-top:10px"><p> Jumlah</p><input class="hidden" name="<?php echo $namemin; ?>" value="<?php echo $result2[$x]['minor']; ?>"></div>
									<div class="col-md-2"><input type="number" class="form-control bfh-number" name="<?php echo $qty; ?>" value="5" style="width:65px"></input></div>
									<div class="col-md-7" style="margin-left:20px">
										<input type="submit" name="<?php echo $addtocart; ?>" class="btn btn-warning" value="Tambahkan ke Keranjang">
									</div>
								</form>
							</div>                    
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?php
}}
}else{?>
</div>
<h1>Data not recorded</h1>

<?php
}
}
if(isset($_POST['btn-fltr']))
{

	$keyword1     = $_POST['category'];
	$keyword2     = $_POST['times'];
	$keyword3     = $_POST['quantity'];
	$query        = $DB_conn->query("SELECT * FROM `konten` WHERE `kategori_makan` LIKE  '$keyword1' and `waktu` LIKE '$keyword2' and `minor` LIKE '$keyword3'");
	$row          = $query->num_rows;

	if($query !== ""){
		for ($x = 0; $x < $row; $x++) { 
			$result2[]     = $query->fetch_assoc();
			?>
			<div class="col-md-4">
				<div class="thumbnail" >
					<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;">
					<div class="caption">
						<h4 class="title"><?php echo $result2[$x]['judul']; ?></h4>
						<p><?php echo $result2[$x]['deskripsi']; ?></p>
						<p><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></p>
									<p><b>Penjual : <a href="?page=seller&user=<?php echo $result2[$x]['user']; ?>" style="color:#F9AE2C"><?php echo $result2[$x]['user']; ?><a/></b></p>
									<br>
									<p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $x; ?>">Lihat detail »</a></p>
								</div>
							</div>
						</div>


						<?php
					}
					if($query !== ""){
						for ($x = 0; $x < $row; $x++) { 
							$result2[]     = $query->fetch_assoc();
							$seller 	   = $result2[$x]['user'];
							$harga  	   = $result2[$x]['harga'];
							$addtocart 	   = "addtocart".$x;
							$cart		   = "cart".$x;
							$qty 		   = "qty".$x;
							$namemin  = "min" . $x;

							if(isset($_POST[$addtocart])){
								if(!$user->is_loggedin())
								{
									?>
									<script type="text/javascript">
									window.location.href = '?page=login';
									</script><?php
								}
								$cart        = $_POST[$cart];
								$qty         = intval($_POST[$qty]);
								$tot         = intval($_POST[$namemin]);
								$pem  = $qty > $tot;

						        // echo var_dump($qty);
						        // echo var_dump($tot);
						        // echo var_dump($pem);

								if($qty > $tot){
									if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
										echo"
										<script>
										swal(
											'Data Ditambahkan ke Keranjang',
											'Alhamdulillah',
											'success'
											)
										</script>";
										}}else{
											echo"
											<script>
											swal(
												'Jumlah lebih sedikit',
												'Tambah Jumlah',
												'error'
												)
										</script>";
										}
										}
										?>

<div class="modal fade" id="<?php echo "pilihan" . $x; ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Menu</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-5" style="width:500px">
							<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:480px;">
						</div>
						<div class="col-md-4">
							<h3><?php echo $result2[$x]['judul']; ?></h3>
							<h4 style="color:#F9AE2C"><b> <?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></h4>
							<p><?php echo $result2[$x]['deskripsi']; ?></p>
							<table style="margin:10px; color : #95A5A6 ">
								<tr cellpadding="10" >
									<td style="width:150px">Waktu Antar</td>
									<td><?php echo $result2[$x]['waktu']; ?></td>
								</tr>
								<tr>
									<td>Min Order</td>
									<td><?php echo $result2[$x]['minor']; ?> pcs</td>
								</tr>
								<tr>
									<td>Kategori Makanan</td>
									<td><?php echo $result2[$x]['kategori_makan']; ?></td>
								</tr>
							</table>
							<br>
							<div class="row">
								<form method="post">
									<input type="text" class="hidden" name="<?php echo $cart; ?>" value="<?php echo $result2[$x]['id_konten']; ?>"><br>
									<div class="col-md-2" style="padding-top:10px"><p> Jumlah</p><input class="hidden" name="<?php echo $namemin; ?>" value="<?php echo $result2[$x]['minor']; ?>"></div>
									<div class="col-md-2"><input type="number" class="form-control bfh-number" name="<?php echo $qty; ?>" value="5" style="width:65px"></input></div>
									<div class="col-md-7" style="margin-left:20px">
										<input type="submit" name="<?php echo $addtocart; ?>" class="btn btn-warning" value="Tambahkan ke Keranjang">
									</div>
								</form>
							</div>                    
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}}
}else{?>
</div>
<h1>Data not recorded</h1>

<?php
}
} 
}else{
	$query        = $DB_conn->query("SELECT * FROM `konten`");
	$row          = $query->num_rows;

	if($query !== ""){
		for ($x = 0; $x < $row; $x++) { 
			$result2[]     = $query->fetch_assoc();
			?>
			<div class="col-md-6 col-md-4">
				<div class="thumbnail"  >
					<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:324px; height:270px;" alt="steamed-and-roast-chicken">
					<div class="caption">
						<h4 class="title"><?php echo $result2[$x]['judul']; ?></h4>
						<p><?php echo $result2[$x]['deskripsi']; ?></p>
						<p><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></p>
						<p><b>Penjual : <a href="?page=seller&user=<?php echo $result2[$x]['user']; ?>" style="color:#F9AE2C"><?php echo $result2[$x]['user']; ?><a/></b></p>
						<br>
						<p><a href="#" class="btn btn-warning" role="button" data-toggle="modal" data-target="<?php echo "#pilihan" . $x; ?>">Lihat detail »</a></p>
					</div>
				</div>
			</div>
			<?php
		} 
		if($query !== ""){
			for ($x = 0; $x < $row; $x++) { 
				$result2[]     = $query->fetch_assoc();
				$seller 	   = $result2[$x]['user'];
				$harga  	   = $result2[$x]['harga'];
				$addtocart 	   = "addtocart".$x;
				$cart		   = "cart".$x;
				$qty 		   = "qty".$x;
				$namemin  = "min" . $x;

				

				if(isset($_POST[$addtocart])){
					if(!$user->is_loggedin())
					{
						?>

						<script type="text/javascript">
						window.location.href = '?page=login';
						</script><?php
					}else{
						$cart 		   = $_POST[$cart];
						$qty         = intval($_POST[$qty]);
						$tot         = intval($_POST[$namemin]);
						$pem  = $qty > $tot;
			     
						if($qty > $tot){
							if($user->addToCart($user_id,$cart,$qty,$user,$harga,$seller)){
								?>

								<script type="text/javascript">
								window.location.href = '?page=search&carted';
								</script><?php
							}}else{
								echo"
								<script>
								swal(
									'Jumlah lebih sedikit',
									'Tambah Jumlah',
									'error'
									)
</script>";
}
}
}
?>
<div class="modal fade" id="<?php echo "pilihan" . $x; ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Menu</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-5" style="width:500px">
							<img src="<?php if($result2[$x]['pict'] != "ImgContent/"){echo $result2[$x]['pict'];}else{ echo "ImgContent/default-pict-menu.jpg";} ?>" style="width:480px;">
						</div>
						<div class="col-md-4">
							<h3><?php echo $result2[$x]['judul']; ?></h3>
							<h4 style="color:#F9AE2C"><b><?php echo "Rp ".number_format($result2[$x]['harga'],0,",","."); ?></b></h4>
							<p><?php echo $result2[$x]['deskripsi']; ?></p>
							<table style="margin:10px; color : #95A5A6 ">
								<tr cellpadding="10" >
									<td style="width:150px">Waktu Antar</td>
									<td><?php echo $result2[$x]['waktu']; ?></td>
								</tr>
								<tr>
									<td>Min Order</td>
									<td><?php echo $result2[$x]['minor']; ?> pcs</td>
								</tr>
								<tr>
									<td>Kategori Makanan</td>
									<td><?php echo $result2[$x]['kategori_makan']; ?></td>
								</tr>
							</table>
							<br>
							<div class="row">
								<form method="post">
									<input type="text" class="hidden" name="<?php echo $cart; ?>" value="<?php echo $result2[$x]['id_konten']; ?>"><br>
									<div class="col-md-2" style="padding-top:10px"><p> Jumlah</p></div><input class="hidden" name="<?php echo $namemin; ?>" value="<?php echo $result2[$x]['minor']; ?>">
									<div class="col-md-2"><input type="number" class="form-control bfh-number" name="<?php echo $qty; ?>" value="5" style="width:65px"></input></div>
									<div class="col-md-7" style="margin-left:20px">
										<input type="submit" name="<?php echo $addtocart; ?>" class="btn btn-warning" value="Tambahkan ke Keranjang">
									</div>
								</form>
							</div>                   
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}}
}else{?>
</div>

<h1>Data not recorded</h1>

<?php
}
}?>

</div>
</div>
</div>
</div>