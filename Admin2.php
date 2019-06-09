<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<style>
.head{
	height:20vh;
	width:100%;
}

.main{
	width:100%;

	float: left;
	text-align:center; 
}

body{
  background-color:lightblue;
}
</style>
</head>
<body>
    <div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <a href="Admin2.php" class="w3-bar-item w3-button ">Home</a>
  </div>
	<div class="head">
  	<img src="images.png" height="100px" width="100%">
  </div>
<div class="leftsidebar" style="text-align: center;">

</div>
    <div class="main">
        <form action=" ">
        <div class="w3-bar w3-border w3-black">
        <button name="Insert" class="w3-bar-item w3-button w3-left">Insert</button>
        <button name="Delete" class="w3-bar-item w3-button w3-left">Delete</button>
        <button name="Orderdetails" class="w3-bar-item w3-button w3-left">Order Details</button>
        <button name="UpdateQuantity" class="w3-bar-item w3-button w3-left">Update Quantity</button>
        <button name="ProductDetails" class="w3-bar-item w3-button w3-left">Product Details</button>
        </form>
  </div>
    	<form action="Updations.php" style="padding-top: 40px">
    		<?php
                session_start();
    				if(isset($_SESSION["afname"])){
                    	error_reporting(E_ERROR | E_PARSE);
    					if(isset($_GET["Insert"])){
    						echo "<h1>Please Insert the data You wish to add</h1>";
    						echo "<h3>";
    						echo "<label style='width: 240px; display:inline-block;'>Enter product id:<input type='text' name='ipid' ></label><br>";
							echo"<label style='width: 240px; display:inline-block;'>Enter product name:<input type='text' name='ipname'></label><br>";
							echo"<label style='width: 240px; display:inline-block;'>Enter product price:<input type='text' name='ipprice' ></label><br>";
							echo "<label style='width: 240px; display:inline-block;'>Enter product category:<input type='text' name='ipcategory' ></label><br>";
							echo "<label style='width: 240px; display:inline-block;'>Enter image location/name:<input type='text' name='ipimg'></label><br>";
							echo "<label style='width: 240px; display:inline-block;'>Enter product description:<input type='text' name='ipdescription' id='p'></label><br>";
                            echo "<label style='width: 240px; display:inline-block;'>Enter product quantity:<input type='text' name='ipquantity'></label><br>";
							echo "<input type='submit' name='Insert' style='font-size:20px';>";
                            echo "</h3>";
    					}
    					 else if(isset($_GET["Delete"])){
    						echo "<h1>Please enter the product key to delete that product</h1>";
    						echo "<h1><label style='width: 240px; display:inline-block;'>Enter product id:<input type='text' name='dpid' ></label><br></h1>";
    						echo "<input type='submit' name='Insert' style='font-size:20px';>";
    				}
                    else if(isset($_GET["Orderdetails"])){
                        header("location:orderdetails.php");
                        }
                    else if(isset($_GET["UpdateQuantity"])){
                        echo "<h1>Please enter the product id of the product u want to update</h1>";
                            echo "<h1><label style='width: 240px; display:inline-block;'>Enter product id:<input type='text' name='upid' ></label><br></h1>";
                            echo "<h1><label style='width: 240px; display:inline-block;'>Enter the new quantity:<input type='text' name='quantity'></label><br></h1>";
                            echo "<input type='submit' name='Insert' style='font-size:20px';><br>";
                          

                        }else if(isset($_GET["ProductDetails"])){
                            include("connection.php");
                            $res = pg_query($con,"select * from products ");
                            $row = pg_fetch_array($res);
                            $col = pg_fetch_all_columns($res,1);
                            $col1 = pg_fetch_all_columns($res,2);
                            $col2 = pg_fetch_all_columns($res,6);
                            $col3 = pg_fetch_all_columns($res,5);
                            echo "<h2>Product Details are as follows</h1><br><br>";
                            echo "<table border='2' align='center'>";
                            echo "<tr height='35px;'><td><b style='font-size:20px;'>Product Name</b></td><td><b style='font-size:20px;'>Price</b></td><td><b style='font-size:20px;'>Quantity</b></td><td><b style='font-size:20px;'>Description</b></td></tr>";
                            for($i=0;$i<=count($row);$i++){
                                echo "<tr><td>".$col[$i]."</td><td>".$col1[$i]."</td><td>".$col2[$i]."</td><td>".$col3[$i]."</td></tr>";
                            }
                            echo "</table>";
                        }
    			 else 
    				echo "<h1>Please select a category</h1>"; 
            }
            else
                header("location:login2.php");




    		?>
       	</form>
    </div>
</body>
</html>

