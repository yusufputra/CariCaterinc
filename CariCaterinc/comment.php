<?php
	include_once 'connection.php';
	if(isset($_GET['addComment'])){
		$commentText  = $_GET['addComment'];
		$commentor = $_GET['commentor'];
		$user = $_GET['user'];
		// setlocale(LC_TIME, "fr_FR");
		$date = date('d-m-Y');
		// $date = strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));
		echo $date;
  		$DB_conn->query("INSERT INTO `comment`(`comment`,`commentor`,`user`,  `date`) VALUES ('$commentText','$commentor','$user','$date')");
	}

	if (isset($_GET['aksi']) == "like") {
		$idpos = $_GET['id'];
		$cek = $DB_conn->query("SELECT * FROM `comment` WHERE id_comment='$idpos'");
		$ceks = $cek->fetch_assoc();
		$like  = $ceks['like'] + 1;
		$user = $_GET['user'];
		$DB_conn->query("UPDATE `comment` SET `like`='$like' WHERE id_comment='$idpos'");
		header("Location: javascript:window.history.back()");
	}
?>