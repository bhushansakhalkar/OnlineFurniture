<?php
	$con = pg_connect("host=localhost port=5432 dbname=project user=postgres password=123");
		if(!$con){
			echo "Database not connected properly";
		}
?>