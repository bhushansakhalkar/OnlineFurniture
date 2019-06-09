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
  width:20%;
  float: left;
  text-align:center;  
}
.main{
  width:79%;
  height: 100vh;
  float: right;
}
body{
  background-color:lightblue;
}
  tr:hover {background-color:#f5f5f5;}

</style>
</head>

  <div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <input type="text" name="t1" placeholder="search" class="w3-bar-item" style="margin-right: auto; margin-left: auto; display:block;" onblur="search(this.value);">
  <!--<input type="text" name="t1" class="w3-bar-item" placeholder="search">-->
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
            <h3>Please Select a category from below</h3>
            <br>
            <form>
            <select name='category' style='font-size:20px;'>
            <option>sofa</option>
            <option>table</option>
            <option>bed</option>
            </select><br><br>
            <input type='submit' style='font-size:15px;'>
             </form><br><br><br><br><br><br><br>
             <form action=" ">
              <h3>Please select a price range</h3><br>
              <input type="range" style="float: left; font-size: 40px; " min="100" value="50" max="15000" name="ran"  id="scroll" oninput="myFunction(this.value);"><p id="op" style="float: left; font-size: 20px;"></p>
              <br><br>
              <input type="submit" style="font-size:15px;">
             </form>
      </div>

    <script>
      function myFunction(val){
       //var val = document.getElementById("scroll").value;
       document.getElementById("op").innerHTML = ""+val+"rs";
      }
      function search(val){
        //var val = document.getElementById("t1").value;
        
        var obj = new XMLHttpRequest();
        obj.open("GET","search.php?search="+val,true);
        obj.send();
        obj.onreadystatechange = function(){
          if(obj.status == 200 && obj.readyState == 4){
            document.write(obj.responseText);
          }
        }
      }
    </script>
<?php
            if(isset($_SESSION["sfname"]) && isset($_SESSION["slname"])){
            error_reporting(E_ERROR | E_PARSE);
            include("connection.php");
            if($_GET["category"]=="sofa"){
              $res = pg_query("Select * from products where pcategory='sofa'");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
              $column3 = pg_fetch_all_columns($res,2);
          }
          else if($_GET["category"]=="table"){
              $res = pg_query("Select * from products where pcategory='table'");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
              $column3 = pg_fetch_all_columns($res,2);              
          }
          else if($_GET["category"]=="bed"){
              $res = pg_query("Select * from products where pcategory='bed'");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
              $column3 = pg_fetch_all_columns($res,2);
          }
          else
            {
              $res = pg_query("Select * from products");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
              $column3 = pg_fetch_all_columns($res,2);
            }

            if(isset($_GET["ran"])){
              $ran = $_GET["ran"];
              $res = pg_query($con,"select * from products where pprice <=".$ran."");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
              $column3 = pg_fetch_all_columns($res,2);
            }
            echo "<div class='main'>";
            for($i=0;$i<count($column);$i++){
              echo "<table style='float:left;  border-collapse: separate; border-spacing: 5px;'>";
              echo "<tr><td><a href='Welcome2.php?id=$column2[$i]'><img src=".$column[$i]." 
              style='width:190px;height:190px;float:left;'></a></td></tr>
              <tr><td><h3 style='text-align:center;'>Price: ".$column3[$i]."Rs</h3></td></tr>&nbsp";        
              echo "</table>";
            }
    echo "</div>";
}
  else
    header("location:login1.php");
    ?>