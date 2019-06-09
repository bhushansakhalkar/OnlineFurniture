<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
.head{
	height:20vh;
	width:100%;
}
</style>
</head>
<body>
	<div class="head">
  	<img src="images.png" height="100px" width="90%">
  	</div>
  	<form action="">
  		<h1>Please enter your username</h1>
  		<input type="text" name="user"><br>
  		<h1>Please Enter your mobile no</h1>
  	<input type="text" name="mobile"><br><br><br>
  	<input type="submit">
  </form>
</body>
</html>




<?php
		if(isset($_GET["mobile"])&&isset($_GET["user"])){
			if(!empty($_GET["mobile"])&&!empty($_GET["user"])) {
				include("connection.php");
		$res = pg_query($con,"Select * from customer1 where username='".$_GET["user"]."'and mobile=".$_GET["mobile"]);
		$row = pg_fetch_row($res);
		if(!$row){
		echo "<h1>Inavlid username or mobile no.</h1><br>";
		echo "<h3>Please re-enter your correct username and mobile no</h3><br>";
		}
		else{
			echo "<h1>Your password is ".$row[5]."</h1>";
			echo "<button onclick=location.href='login1.php' type='button' style='font-size:15px;'>Back</button>";
		} 
			}else
				echo "Please fill the entire form";
		}
		
?>