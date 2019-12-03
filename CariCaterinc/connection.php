<?php

session_start();

$host		=	"localhost";
$user		=	"root";
$password	=	"";
$db			=	"caricate_proj";

// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//     echo 'We dont have mysqli!!!';
// } else {
//     echo 'Phew we have it!';
// }

$DB_conn		= new mysqli($host,$user,$password,$db);

if($DB_conn->connect_error){
	die("Connection Field : " . $DB_conn->connect_error);
}else{
	//echo "sukses";
	}
include_once 'function.php';
$user	= new USER($DB_conn);

?>