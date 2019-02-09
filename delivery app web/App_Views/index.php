<?php require '../App_Validation/redirect.php';?>
<!DOCTYPE HTML>
<html>
<head>
    <title>index</title>
    <meta charset='utf-8'>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../App_Styles/index/index.css">
    <link rel="stylesheet" type="text/css" href="../App_Styles/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body class="cuerpo">

    <div class="menu_p">

        <ul>
            <li class="usuario">usuario: <?php echo "$nom" ?></li>
            <li class="rig"><a href="../App_Validation/exit.php">cerrar sesion</a></li>
            <li class="rig"><a href="./index.php">inicio</a></li>
        </ul>
    </div>

    <ul class="content">
        <li class="menu">
            <ul>
                <li class="button"><a href="./formularioFecha.php">generar reporte<span class="icon"> </span></a></li>
            </ul>
        </li>
        <li class="menu">
            <ul>
                <li class="button"><a href="./usuario.php">cambiar contraseña<span class="icon stat"> </span></a></li>
            </ul>
        </li>
        <li class="menu">
            <ul>
                <li class="button"><a href="./contacto.php">contacto<span class="icon msg"> </span></a></li>
            </ul>
        </li>
        <li class="menu info">
            <ul>
                <li class="button"><a href="../App_Validation/exit.php">salir<span class="icon signout"> </span> </a></li>
            </ul>
        </li>
    </ul>

</body>
</html>
