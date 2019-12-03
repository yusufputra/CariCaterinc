<?php
	require_once('../function.php');
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['page']) && $_GET['page']=="delete-buyer") 	
	{
		$id		= $_GET['id'];
		$user->deleteUser($id); ?>
		<script type="text/javascript">
		window.location.href = '?page=pembeli';
		</script><?php
	}
?>