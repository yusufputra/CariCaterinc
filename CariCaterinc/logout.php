<?php
	require_once('function.php');
		
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user->doLogout();
		$user->redirect('/CariCaterinc');
	}
?>