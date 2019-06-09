<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
.head{
    height:20vh;
    width:100%;
}

body{
  background-color:lightblue;
}
</style>
<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-border w3-black">
  <a href="LogOut.php" class="w3-bar-item w3-button w3-right">LogOut</a>
  <a href="Admin2.php" class="w3-bar-item w3-button ">Home</a>
  </div>
<div class="head">
    <img src="images.png" height="100px" width="100%">
  </div>

<?php
                    error_reporting(E_ERROR | E_PARSE);
                        session_start();
                        $fname = $_SESSION["fname"];
                        $lname = $_SESSION["lname"];
                        include("connection.php");
                        $sql = "Select * from sale";
                        $res = pg_query($con,$sql);
                        if(!$res){
                        echo "query hagli";
                        }
                        else{
                        $row = pg_fetch_all_columns($res);
                        $res2 = pg_query($con,"Select username from sale");
                        $row2 = pg_fetch_all_columns($res2);
                        if(!$row){
                        echo "guu";
                        }
                        else{
                            echo "<h1 style='text-align:center'>Total Sale</h1>";
                            $cdate = date("d/m/y");
                            $ccdate = date_create_from_format("d/m/y",$cdate);
                            for($i=0;$i<count($row);$i++){ 
                                $row4 = pg_fetch_all_columns($res,3);
                                $dat =array();                  
                                $dat[$i]=$row4[$i];
                                $date = date($dat[$i]);
                                $ddate = date_create_from_format("d/m/y",$date);
                                $datedif = date_diff($ddate,$ccdate);
                                $ddatedif = $datedif->format("%a days");
                                $dd = array();
                                $dd[$i] = $ddatedif;
                                if($dd[$i]==0){
                                                echo "<h1 style='text-align:center;'>Today</h1>";
                            echo "<table border=7 align=center style='padding-top:0px;'><tr><td>NAME</td><td>LASTNAME</td><td>PRODUCTNAME</td><td>PRICE</td></tr>";
                                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                                $row1 = pg_fetch_row($res1);
                                $res3 = pg_query($con,"Select * from customer1 where username ='$row2[$i]'");
                                $row3 = pg_fetch_row($res3);
                                $date1 = date_create_from_format("d/m/y",$d);
                                echo "<tr><td>".$row3[0]."</td> ";
                                echo "<td>".$row3[1]."</td> ";
                                echo "<td>".$row1[1]."</td>";
                                echo "<td>".$row1[2]."</td></tr>";
                            echo "</table><br>";
                                            }
                                            else if($dd[$i]<8 && $dd[$i]>0){
                                                echo "<h1 style='text-align:center;'>one week old</h1>";
                            echo "<table border=7 align=center style='padding-top:0px;'><tr><td>NAME</td><td>LASTNAME</td><td>PRODUCTNAME</td><td>PRICE</td></tr>";
                                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                                $row1 = pg_fetch_row($res1);
                                $res3 = pg_query($con,"Select * from customer1 where username ='$row2[$i]'");
                                $row3 = pg_fetch_row($res3);
                                $date1 = date_create_from_format("d/m/y",$d);
                                echo "<tr><td>".$row3[0]."</td> ";
                                echo "<td>".$row3[1]."</td> ";
                                echo "<td>".$row1[1]."</td>";
                                echo "<td>".$row1[2]."</td></tr>";
                            echo "</table><br>";
                                            }
                                            else if($dd[$i]<15 && $dd[$i]>8){
                                                echo "<h1 style='text-align:center;'>2 weeks old</h1>";
                            echo "<table border=7 align=center style='padding-top:0px;'><tr><td>NAME</td><td>LASTNAME</td><td>PRODUCTNAME</td><td>PRICE</td></tr>";
                
                                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                                $row1 = pg_fetch_row($res1);
                                $res3 = pg_query($con,"Select * from customer1 where username ='$row2[$i]'");
                                $row3 = pg_fetch_row($res3);
                                $date1 = date_create_from_format("d/m/y",$d);
                                echo "<tr><td>".$row3[0]."</td> ";
                                echo "<td>".$row3[1]."</td> ";
                                echo "<td>".$row1[1]."</td>";
                                echo "<td>".$row1[2]."</td></tr>";
                            echo "</table><br>";
                                            }
                                            else if($dd[$i]<=22 && $dd[$i]>15){
                                                echo "<h1 style='text-align:center;'>3 weeks old</h1>";
                            echo "<table border=7 align=center style='padding-top:0px;'><tr><td>NAME</td><td>LASTNAME</td><td>PRODUCTNAME</td><td>PRICE</td></tr>";
                                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                                $row1 = pg_fetch_row($res1);
                                $res3 = pg_query($con,"Select * from customer1 where username ='$row2[$i]'");
                                $row3 = pg_fetch_row($res3);
                                $date1 = date_create_from_format("d/m/y",$d);
                                echo "<tr><td>".$row3[0]."</td> ";
                                echo "<td>".$row3[1]."</td> ";
                                echo "<td>".$row1[1]."</td>";
                                echo "<td>".$row1[2]."</td></tr>";
                            echo "</table><br>";
                            
                                            }
                                            else{
                                                echo "<h1 style='text-align:center;'>few weeks ago</h1>";
                            echo "<table border=7 align=center style='padding-top:0px;'><tr><td>NAME</td><td>LASTNAME</td><td>PRODUCTNAME</td><td>PRICE</td></tr>";
                
                                $res1 = pg_query($con,"Select * from products where pid = '$row[$i]'");
                                $row1 = pg_fetch_row($res1);
                                $res3 = pg_query($con,"Select * from customer1 where username ='$row2[$i]'");
                                $row3 = pg_fetch_row($res3);
                                $date1 = date_create_from_format("d/m/y",$d);
                                echo "<tr><td>".$row3[0]."</td> ";
                                echo "<td>".$row3[1]."</td> ";
                                echo "<td>".$row1[1]."</td>";
                                echo "<td>".$row1[2]."</td></tr>";
                            echo "</table><br><br><br>";
                            
                                            }    
                            }
                            echo "<button onclick=location.href='Admin2.php' style='font-size:20px; text-align:center; margin:auto; display:block;'>Back</button>";

                          }
                        }

?>
</body>
</html>