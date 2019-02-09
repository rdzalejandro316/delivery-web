<?php

	require 'conection.php';

	$usuario=$_POST['User'];
	$clave=$_POST['Password'];

	$sql = "SELECT * FROM Mae_Autorizados WHERE cod_autorizado='$usuario' AND clave='$clave'";

	$stmt = sqlsrv_query( $conn, $sql);

	$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
   
   	$idUsu = $row[0];
   	$codPred = $row[4];

	if ($row > 0){		
		session_start();
		$_SESSION['usuario']=$usuario;
		$_SESSION['clave']=$clave;
		$_SESSION['id']= $idUsu;
		$_SESSION['codigo']= $codPred;

		header("location:../App_Views/index.php");
	}else{
		header("location:../App_Validation/denied_User.php");
	}   		
?>