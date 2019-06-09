<?php
	$pid = $_GET["pid"];
	$user =$_GET["user"];
	include("connection.php");
	$sql = "INSERT INTO item values('$pid','$user')";
	$res = pg_query($con,$sql);
	if(!$res){
		echo "Cannot be inserted";
	}
	else echo "<h1>inserted</h1>";
?>