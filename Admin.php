<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
  <style>
.head{
	height:20vh;
	width:100%;
}
.leftsidebar{
	width:20%;
	height: 100vh;
	float: left;   
}
.main{
	width:78%;
	height: 100vh;
	float: left;
}

body{
  background-color:lightblue;
}
</style>
</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"]?>">
	<div class="head">
  	<img src="images.png" height="100px" width="90%">
  	</div>
 	<div class="leftsidebar">
      <form>
    		<h1>Select the category you want to view</h1>
            <select name='category' style='font-size:30px;'>
            <option>sofa</option>
            <option>table</option>
            <option>bed</option>
            </select><br><br><br><br><br>
            <input type='submit' style='font-size:20px;'>
       </form>
    </div>
<?php
            error_reporting(E_ERROR | E_PARSE);
            $con = pg_connect("host=localhost port=5432 dbname=project user=postgres password=123");
            if(!$con){
            echo "Not Connected";
            }
            if($_GET["category"]=="sofa"){
              $res = pg_query("Select * from products where pcategory='sofa'");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
          }
          else if($_GET["category"]=="table"){
              $res = pg_query("Select * from products where pcategory='table'");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);              
          }
          /*else if($_GET["category"]=="bed"){
              $res = pg_query("Select * from bed");
              $column = pg_fetch_all_columns($res,2);
          }*/
          else
            {
              $res = pg_query("Select * from products");
              $column = pg_fetch_all_columns($res,4);
              $column2 = pg_fetch_all_columns($res,0);
            } 
              
      


?>
<div class="main">
      <?php
            for($i=0;$i<count($column);$i++){
              echo "<a href='Admin2.php'><img src=".$column[$i]." 
              style='width:200px;height:200px;float:left;'></a>";          }
    echo "</div>";
    ?>