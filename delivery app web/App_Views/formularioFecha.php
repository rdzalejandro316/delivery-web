<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="../App_Styles/reporte/reporte.css" rel="stylesheet" />
    <link href="../App_Styles/reset.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">      
</head>
<body>        
    <?php include './menu.php';?>
    <div class="cont_con">
	<form action="./reporte.php" method="post" class="formCons">
		<div class="tiit">
			<h1>generar consulta</h1>
		</div>
		<div>
			<label>fecha inicial</label>
			<input type="date" name="fechaIni">	
		</div>
		<div>
			<label>fecha final</label>
			<input type="date" name="fechaFin">
		</div>
		<div>
			<input type="submit" name="botonEnvio" value="iniciar la consulta">	
		</div>		
		
	</form>

	<form action="./reporte.php" method="post" class="formConsTodo">		
		<div class="tiit">
			<h1>traer todos los registros</h1>
		</div>
		<div >
			<input type="checkbox" name="todo" value="todo" >aceptar<br>				
		</div>
		<div >
			<input type="submit" name="botonEnvio" value="traer todo los registros">					
		</div>
		
	</form>
	</div>

</body>
