


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
  height:8vh;
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
}
.leftsidebar{
  width:20%;
  height: 100vh;
  float: left;
  border-style: dashed;
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
  float:left;
  border-style: dashed;
  background-color:black;
}

body{
  background-color:lightblue;
}
</style>
</head>
<div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <a href="Cart.php" class="w3-bar-item w3-button w3-right">Cart</a>
  <a href="Welcome.php" class="w3-bar-item w3-button ">Home</a>
  </div>
<body>
	<div class="head">
  <img src="images.png" height="100px" width="90%">
  </div>
  <div class="welcome">
  	<h1>Welcome &nbsp;<?php session_start(); echo $_SESSION["sfname"]." ".$_SESSION["slname"];?></h1>
    </div>
    <div class="leftsidebar">
      
    </div>
    <?php
      if(isset($_GET["id"])){
          $id = $_GET["id"];
           include("connection.php");
            $res = pg_query($con,"Select * from products where pid='$id'");
            $row=pg_fetch_row($res); 
              echo "<div class='main'>";
              if($row[6]>0){
              echo "<img src=".$row[4]." style='padding-top:5px; width:500px;height:400px;'>";
              echo "<br><br>";
              echo "<h1>Name:".$row[1]."<br>";
              echo "Price: Rs ".$row[2]."<br>";
              echo "Description:".$row[5]."</h1><br>";
              $user = $_SESSION["username"];
              echo "<button onclick='add_to_cart(\"".$row[0]."\",\"".$user."\")' style='font-size:20px'>Add to cart</button>";
              echo "&nbsp";
              echo "<button onclick=location.href='Welcome.php' type='button' style='font-size:20px'>Keep Shopping</button><br>";
              echo "<button onclick=location.href='Cart.php' type='button' style='font-size:20px'>Go to cart</button>";
            }
            else{
              echo "<h1 style='text-align:center;'>Sorry!!<br> The Product You want is currently out of stock please revisit in a few days</h1><br><br>";
              echo "<button onclick=location.href='Welcome.php' type='button' style='font-size:20px'>Keep Shopping</button><br>";
            }
            echo "</div>";

      }
    ?>
       <div class="rightsidebar">
      
    </div>
    <script>
      function add_to_cart(productName,userName){
        var obj = new XMLHttpRequest();
        obj.open("GET","add_to_cart.php?pid="+productName+"&user="+userName,true);
        obj.send();
        obj.onreadystatechange = function(){
          if(obj.status == 200 && obj.readyState == 4){
            alert("Added to cart");
          }
        }
      }
    </script>