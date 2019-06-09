
	<?php
	if(isset($_GET["ipid"])&&isset($_GET["ipname"])&&isset($_GET["ipprice"])&&isset($_GET["ipcategory"])&&isset($_GET["ipimg"])&&isset($_GET["ipdescription"])){
		$pid = $_GET["ipid"];
	     $pprice = $_GET["ipprice"];
             $pname = $_GET["ipname"];
		$pcategory = $_GET["ipcategory"];
 		$pimg = $_GET["ipimg"];
		$pdescription = $_GET["ipdescription"];
            $pquantity = $_GET['ipquantity'];
		include("connection.php");
            $res = pg_query("insert into products values('$pid','$pname',$pprice,'$pcategory','$pimg','$pdescription','$pquantity')");
            if(!$res){
		echo "Not inserted";
            }
		else
		echo "<h3>Product inserted</h3>";
	}
      if(isset($_GET["dpid"])){
            if(!empty($_GET["dpid"])){
                  $did = $_GET["dpid"];
                  include("connection.php");
                  $res = pg_query($con,"Delete from products where pid='$did'");
                  if(!$res){
                        echo "Record not deleted";
                  }
                  else
                        echo "<h1>The product has been deleted</h1>";
            }else
                  echo "Form cannot be empty";
      }
      if(isset($_GET["upid"])&& isset($_GET["quantity"])){
            if(!empty($_GET["upid"])&& !empty($_GET["quantity"])){
                  $upid = $_GET["upid"];
                  $quant = $_GET["quantity"];
                  include("connection.php");
                  $res1 = pg_query($con,"Update products set quantity=".$quant."where pid='$upid'");
                  if(!$res1){
                        echo "Record not updated";
                  }
                  else
                        echo "<h1>The product has been updated</h1>"; 
            }else
                   echo "Please fill the form";
      }
      

	?>
      <!DOCTYPE html>
      <html>
      <head>
            <title></title>
      </head>
      <body>
            <button onclick=location.href='Admin2.php' type='button' style='font-size:20px'>Back</button>
      </body>
      </html>