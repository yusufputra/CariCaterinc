<?php
	require_once('../function.php');
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['page']) && $_GET['page']=="deletepromo") 	
	{
		$id		= $_GET['id'];
		$user->deletePromo($id); ?>
		
		<script type="text/javascript">
		window.location.href = '?page=promo';
		</script><?php
	}
?>