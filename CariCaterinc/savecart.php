<?php
	require_once('function.php');
		
	if($user->is_loggedin()!="")
	{
		$user->redirect('home.php');
	}
	if(isset($_GET['user']) && $_GET['judul'])
	{
		$user 	= $_GET['user'];
		$judul 	= $_GET['judul'];
		$user->addToCart($user,$judul);
	}
?>