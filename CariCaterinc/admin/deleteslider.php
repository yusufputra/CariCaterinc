<?php
	require_once('../function.php');
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['page']) && $_GET['page']=="deleteslider") 	
	{
		$id		= $_GET['id'];
		$user->deleteslider($id); ?>
		<script type="text/javascript">
		window.location.href = '?page=slider&deleted';
		</script><?php
	}
?>