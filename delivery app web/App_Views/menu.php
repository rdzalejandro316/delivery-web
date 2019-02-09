<?php require '../App_Validation/redirect.php';?>
<?php require '../App_Validation/conection.php';?>

<?php            
	echo "
	<div class='menu_p'>
		<ul>
    		<li class='usuario'>usuario: ".$nom." </li>
            <li class='rig'><a href='../App_Validation/exit.php'>cerrar sesion</a></li>
            <li class='rig'><a href='./index.php'>inicio</a></li>
        </ul>
	</div>	
    ";
?>