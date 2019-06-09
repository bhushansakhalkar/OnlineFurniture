<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
	 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<div class="w3-bar w3-border w3-black">
  <a href="index.html" class="w3-bar-item w3-button w3-right">Home</a>
  <a href="?" class="w3-bar-item w3-button w3-right">About</a>
  <a href="?" class="w3-bar-item w3-button w3-right">Faq</a>
  <a href="index.html" class="w3-bar-item w3-button ">Lorenz Furniture</a>
  </div>

<body>
	<div class="head">
  <img src="images.png" height="100px" width="90%">
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
	<h1 style="padding-left: 50px">Select one of the two buttons.</h1> 
	<div class="buttons">
	<div class="SignUp">
		<h3>If you are new to our site please click me</h3>
		<button class="button1 btn-default" onclick="signUp()">SignUp</button>
	</div>
		<div class="Login">
		<h3>If you are a regular click me</h3>
		<button class="button2 btn-default" onclick="login()">Login</button>
	</div>
	</div>
	

<script>
	function login(){
		var form = document.getElementById("abc");
		if(form.style.display== "block"){
			form.style.display= "none";
		}else{
			form.style.display= "block";
		}
	}
</script>
<script>
	function signUp(){
		var form1 = document.getElementById("bcd");
		if(form1.style.display== "block"){
			form1.style.display= "none";
		}else{
			form1.style.display= "block";
		}
	}
</script>
	<div class="container">
	<div class="log" id="abc">
		<h1>Login</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
		<label style="width: 240px; display:inline-block;">Enter Username:<input type="text" name="lusername" placeholder="abc@xyz.com" required></label><br>
		<label style="width: 240px; display:inline-block;">Enter Password:<input type="password" name="lpassword" required></label><br>
		<input type = "submit" name="log">
		</form>
		<a href="Forgot.php">Forgot Password ?</a>
	</div>
	<div class="sign" id="bcd">
	<h1>Sign Up</h1>
	<form onsubmit="return checkPassword(this);" action="<?php echo $_SERVER["PHP_SELF"]?>"  method="POST">
	<label style="width: 240px; display:inline-block;">Enter Your first name:<input type="text" name="sfname" placeholder="Joey" required></label><br>
	<label style="width: 240px; display:inline-block;">Enter Your Last name:<input type="text" name="slname" placeholder="Tribiani" required></label><br>
	<label style="width: 240px; display:inline-block;">Enter Your mobile no:<input type="text" name="smob" placeholder="1122334455" required onchange="mob_verfication(this.value);" id="mob"></label><br>
	<label style="width: 240px; display:inline-block;">Enter Your Address:<input type="text" name="saddress" placeholder="kothrud" required></label><br>
	<label style="width: 240px; display:inline-block;">Enter username:<input type="text" name="susername" placeholder="abc@xyz.com" required></label><br>
	<label style="width: 240px; display:inline-block;">Enter password:<input type="password" name="spassword" id="p" required></label><br>
	<label style="width: 240px; display:inline-block;">Confirm password:<input type="password" name="scpassword" id="c" required></label><br>
		<input type="submit" name="signup">
	</form>
	
	</div>
</div>
<script>
	function checkPassword(theForm){
	if(theForm.spassword.value != theForm.scpassword.value){
		alert('Please enter the correct password');
		return false;
	}else{
		return true;
	}
}
function mob_verfication(val){
	if(val.length!="10"){
		alert("Wrong mobile number format");
	}
	for(var i=0;i<val.length;i++){
		ch = val.charAt(i);
		if(ch>"9" || ch<"0"){
			alert("please enter valid mobile number");
		}
	}
}
</script>
</body>
</html>


<?php
	error_reporting(E_ERROR | E_PARSE);
	session_start();
	$button = $_POST["signup"];
	$button1 = $_POST["log"];
	$fname = $_POST["sfname"];
	$lname = $_POST["slname"];
	$mobile = $_POST["smob"];
	$address = $_POST["saddress"];
	$username = $_POST["susername"];
	$password = $_POST["spassword"];
	$cpassword = $_POST["scpassword"];
		

	if(isset($fname)&&isset($lname)&&isset($mobile)&&isset($address)&&isset($username)&&isset($password)&&isset($cpassword)){
		if(!empty($fname)&&!empty($lname)&&!empty($mobile)&&!empty($address)&&!empty($username)&&!empty($password)&&!empty($cpassword)){
		include("connection.php");
		$ins="INSERT INTO customer1 values('$fname','$lname',$mobile,'$address','$username','$password')";
		$result = pg_query($con,$ins);
		$_SESSION["sfname"]=$fname;
		$_SESSION["slname"]=$lname;
		$_SESSION["mobile"]=$mobile;
		$_SESSION["address"]=$address;
		$_SESSION["username"]=$username;
		if(!$result){
			echo "<h1>Please fill the form first</h1>";
		}
		else
			header("location:Welcome.php");
	}
}
	else if(isset($_POST["lusername"])&&isset($_POST["lpassword"])){
		$loginuname = $_POST["lusername"];
		$loginpassword = $_POST["lpassword"];
		if(!empty($loginpassword)&&!empty($loginuname)){
			if($_POST["lusername"]=="admin" && $_POST["lpassword"]=="admin"){
				header("location:login2.php");
			}
			include("connection.php");
		$res1 = pg_query($con,"Select * from customer1 where username = '$loginuname'");
		$row2=pg_fetch_row($res1);
		if($row2[4]==$loginuname && $row2[5]==$loginpassword){
		$_SESSION["sfname"]=$row2[0];
		$_SESSION["slname"]=$row2[1];
		$_SESSION["mobile"]=$row2[2];
		$_SESSION["address"]=$row2[3];
		$_SESSION["username"]=$row2[4];
		header("location:Welcome.php");
		}
		else 
		echo "<script>alert('Please enter valid username and password');</script>";
	}
	else 
		echo "<script>alert('Please fill the entire form');</script>"; 
}
		
?>