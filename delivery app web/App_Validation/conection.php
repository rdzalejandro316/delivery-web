<?php
	
	$serverName = "64.250.116.210,8333"; 
	$connectionInfo = array( "Database"=>"Delivery", "UID"=>"wilmer1104@yahoo.com", "PWD"=>"Q1w2e3r4*/*");
	$conn = sqlsrv_connect( $serverName, $connectionInfo)or die("error en la conexion con la base de datos");	
?>