<?php
	$user = $_GET["username"];
	include("connection.php");
          $sql1 = "Select pid from item where username ='$user'";
            $res = pg_query($con,$sql1);
            if(!$res){
              echo "query hagli";
            }
            else{
              $row = pg_fetch_all_columns($res);
              print_r($row);
              echo count($row);
              if(!$row){
                echo "<h1>Oops Your Cart is empty</h1>";
              }
              else{
                $date = date("d/m/y");
                $d = pg_escape_literal($date);
                $date1 = date_create_from_format("d/m/y",$d);
              	for($i=0;$i<count($row);$i++){
                  $res3 = pg_query($con,"select * from products where pid='".$row[$i]."'");
                  $row1 = pg_fetch_row($res3);
                  $res4 = pg_query($con,"update products set quantity=quantity-1 where pid='".$row[$i]."'");
              	$sql = "INSERT INTO sale values('".$row[$i]."','$user','".$row1[2]."',".$d.")";
				      $res = pg_query($con,$sql);
				    }
				if(!$res){
					echo "Cannot be inserted";
				}
				else echo "<h1>inserted</h1>";
				}
     }
     $res2 = pg_query($con,"delete from item where username='$user'");
     if(!$res2){
      echo "HOina";
     }
    
?>