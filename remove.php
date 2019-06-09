<?php
	$id = $_GET["product"];
	include("connection.php");
	session_start();
	$uname = $_SESSION["username"];
	$sql = "DELETE FROM item where pid ='$id' and username ='$uname'";
	$res = pg_query($con,$sql);
	if(!$res){
		echo "Cannot be deleted";
	}else
		header("location:Cart.php");

?>