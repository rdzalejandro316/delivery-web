<?php require '../App_Validation/redirect.php';?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../App_Styles/usuario/usuario.css">
        <link rel="stylesheet" type="text/css" href="../App_Styles/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

    <div class="menu_p">
        <ul>
            <li class="usuario">usuario: <?php echo "$nom" ?></li>
            <li class="rig"><a href="../App_Validation/exit.php">cerrar sesion</a></li>
            <li class="rig"><a href="./index.php">inicio</a></li>
        </ul>
    </div>

    <div class="contenedor-formulario">
        <div class="wrap">
            <form action="../App_Validation/updatePassword.php" id="myForm" class="formulario" name="formulario_registro" method="post">
                <div>
                    <div class="input-group">
                        <label class="label" for="pass">Nueva Contraseña:</label>
                        <input type="text" id="pass" name="passwordUpdate">
                    </div>

                    <input type="submit" id="btn-submit" value="actualizar">
                </div>
            </form>
        </div>

    </div>


</body>
</html>
