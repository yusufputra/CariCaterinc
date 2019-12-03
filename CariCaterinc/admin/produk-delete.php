<?php
	//require_once('../function.php');
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['page']) && $_GET['page']=="delete-product") 	
	{
		$id			= $_GET['id'];
		$query		= $DB_conn->query("SELECT * FROM `konten` WHERE `id_konten` = '$id'");
		$result[]	= $query->fetch_assoc();

		// echo "<pre>";
		// echo var_dump($result);
		// echo "</pre>";
		$judulmenu	= $result[1]['judul'];
		$user->deleteMenu($judulmenu); ?>
		<script type="text/javascript">
		window.location.href = '?page=produk';
		</script><?php
	}
?>