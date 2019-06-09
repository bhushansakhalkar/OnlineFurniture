<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
.head{
  height:15vh;
  width:100%;
  text-align: center;

}
.welcome{
  height:7vh;
  width:100%;
  text-align:center;
  color:White; 
  background-color:black; 
}
.leftsidebar{
  border-style:dashed;
  width:20%;
  height: 100vh;
  float: left;
  text-align:center;
  background-color:black;   
}
.main{
  width:58%;
  height: 100vh;
  text-align:center;
  float: left;
}
.rightsidebar{
  width: 20%;
  height:100vh;
  float:right;
  border-style:dashed;
  background-color:black;
}


body{
  background-color:lightblue;
}
  tr:hover {background-color:#f5f5f5;}

</style>
</head>

  <div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <a href="Cart.php" class="w3-bar-item w3-button w3-right">Cart</a>
  <a href="Welcome.php" class="w3-bar-item w3-button ">Home</a>
  </div>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"]?>">
	<div class="head">
  <img src="images.png" height="100px" width="90%">
  </div>
  <div class="welcome">
  	<h1>Welcome &nbsp;<?php session_start(); echo $_SESSION["sfname"]." ".$_SESSION["slname"];?></h1>
  	</div>
  	
  <div class='leftsidebar'>
      </div>


<?php
	if(isset($_GET["search"])){
		$search = $_GET["search"];
              include("connection.php");
              $res = pg_query($con,"select * from products where pname ='".$search."'");
              $row = pg_fetch_row($res);
              echo "<div class='main'>";
              if(!$row){
                echo "<h1 style='text-align:center;'>No such item found</h1>";
                echo "<br><br><br><br><button onclick=location.href='Welcome.php' type='button'
                 	style='text-align:center; font-size:25px;'>Back</button>";
              }
              else{ 
              echo "<table align='center' style='border-collapse: separate; border-spacing: 5px;'>";
              echo "<tr><td><a href='Welcome2.php?id=$row[0]'><img src=".$row[4]." 
              style='width:400px;height:400px;float:left;'></a></td></tr>
              <tr><td><h3 style='text-align:center;'>Price: ".$row[2]." Rs</h3></td></tr>&nbsp";
              echo "<br><br><tr><td><button onclick=location.href='Welcome.php' type='button' style='text-align:center; font-size:20px;'>Back</button></td><tr>";
              echo "</table>";
              }
              echo "</div>";
            }

?>
<div class="rightsidebar">
	</div>