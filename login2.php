


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="loginadmin.css">
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <a href="Admin2.php" class="w3-bar-item w3-button ">Home</a>
  </div>
	<div class="head">
  	<img src="images.png" height="100px" width="90%">
  	</div>
		<div class="log" id="abc">
		<h1>Access Reserved for Employes Only</h1><br>
		<h2>Login</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
		<label style="width: 240px; display:inline-block;">Enter Employee id:<input type="text" name="aid"></label><br>
		<label style="width: 240px; display:inline-block;">Enter Username:<input type="text" name="alusername"></label><br>
		<label style="width: 240px; display:inline-block;">Enter Password:<input type="password" name="alpassword"></label><br>
		<input type = "submit" name="log"><br><br>
		<a href="login1.php"><h3>Customer ?</h3></a>
		</form>
	</div>

</body>
</html>


<?php
	if(isset($_POST["log"])){
		session_start();
		$username = $_POST["alusername"];
		$password = $_POST["alpassword"];
		$id = $_POST["aid"];
		include("connection.php");
		$res = pg_query($con,"Select * from admin where ausername='$username'");
		$row = pg_fetch_row($res);
		if($row[0]==$id && $row[3]==$username && $row[4]==$password){
			if(!empty($id)&&!empty($username)&&!empty($password)){
			$_SESSION["afname"] = $row[1];
			$_SESSION["ausername"] = $row[3];
			header("location:Admin2.php");
			}
		}else{
			echo "<h1>Access denied</h1>";
		}
	}
?>