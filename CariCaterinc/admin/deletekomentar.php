<?php
	require_once('../function.php');
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['page']) && $_GET['page']=="deletekomentar") 	
	{
		$id		= $_GET['id'];
		$user->deleteKomentar($id); ?>
		
		<script type="text/javascript">
		window.location.href = '?page=komentar&deleted';
		</script><?php
	}
?>