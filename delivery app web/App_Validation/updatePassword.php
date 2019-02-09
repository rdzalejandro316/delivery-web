<?php
	
	$pass=$_POST['passwordUpdate'];

	require './redirect.php';
	require './conection.php';

	
	

	try{
		$update = "UPDATE Mae_Autorizados SET clave='$pass' WHERE idrow='$id'";
		$stmt = sqlsrv_query( $conn, $update);
		echo"
		<!DOCTYPE html><html><head><meta charset='utf-8'></head><body></body>
		<script type='text/javascript'>
			alert('su contraseña se actualizo exitosamente tu nueva contraseña es $pass');        
			    function load() {
                    window.location.assign('../App_Views/index.php');
            	}
            window.onload = load;  
		</script>
		</html>
		";		

	}catch(Exception $e){
		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	}

	
?>