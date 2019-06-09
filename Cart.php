<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
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
    <div class="leftsidebar">
      
    </div>
    <div class="main">
    	<?php
      error_reporting(E_ERROR | E_PARSE);
          $total=null;
          echo "<h1>Order Summary</h1>";
           include("connection.php");
            $name = $_SESSION['username'];
            $addr = $_SESSION['address'];
            $sql = "Select pid from item where username ='$name'";
            $res = pg_query($con,$sql);
            if(!$res){
              echo "query hagli";
            }
            else{
              $row = pg_fetch_all_columns($res);
              if(!$row){
                echo "<h1>Oops Your Cart is empty</h1>";
              }
              else{
                echo "<table border='4' border-style='solid' align='center' width=300 height=300>";
                echo "<tr><td height='30px'><b style='font-size:20px;'>Product Name</b></td><td><b style='font-size:20px;'>Price</b></td><td></td></tr>";
                for($i=0;$i<count($row);$i++){
                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                $row1 = pg_fetch_row($res1);
                echo "<tr><b>";
                echo "<td height='40px'><br>".$row1[1]."&nbsp</td>";
                echo "<td height='40px'>".$row1[2]."</td><td border-style='none' height='20px'><button onclick=remove(\"".$row1[0]."\") type='button' style='font-size:20px'>remove</button></td></tr>";
                $total = $total+$row1[2];
              }
              echo "<br><tr><td height='10px'>Total bill</td><td>".$total."</td><td></td></tr>";
              echo "</b></table><br><br>";
              echo "<h3>Please confirm Your address</h3>";
              echo "<h4>The Current address is ".$addr."</h4>";
              echo "";
              ?>
              <h3><input type="radio" name="cash" id="cash">Cash on delivery</h3><br><br>
            <?php
              echo "<button onclick=location.href='Welcome.php' type='button' style='font-size:20px'>Keep Shopping</button>&nbsp&nbsp";
              echo "<button onclick=order(\"".$name."\") type='button' style='font-size:20px'>Place order</button>";
          }

            }
     
    	?>
    </div>
    <div class="rightsidebar">
      
    </div>
</form>
</body>
</html>

<script>
  function refresh(){
    location.replace("Cart.php");
  }

  function remove(productId){
    var obj = new XMLHttpRequest();
    obj.open("GET","remove.php?product="+productId,true);
    obj.send();
    obj.onreadystatechange = function(){
      if(obj.readyState == 4 && obj.status==200){
        refresh();

      }
    }
  }
  function order(userName){
     if(document.getElementById("cash").checked == false){
      alert("please select the payment method");
    }
    else{
    var obj1 = new XMLHttpRequest();
    obj1.open("GET","order.php?username="+userName,true);
    obj1.send();
    obj1.onreadystatechange = function(){
      if(obj1.readyState == 4 && obj1.status==200) {
        alert("Your order has been placed");
        refresh();
      }
    }
  }
}
</script>