<?php require '../App_Validation/redirect.php';?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="../App_Styles/contacto/contacto.css" rel="stylesheet" />
    <link rel="stylesheet"  href="../App_Styles/reset.css">
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

    <div class="contenedor">
        <div class="con-contac">
            <div class="con-title">
                <p class="con-title-parrafo">contacto con siasoftplus sas</p>
            </div>
            <div class="con-conten">
                <div class="con-menu">
                    <ul>
                        <p>CORREO</p>
                        <li>comercial@siasoftsas.com</li>
                        <p>TELEFONO</p>
                        <li>+57 (1) 7046116</li>
                        <li>3126702644</li>
                        <p>DIRECCION</p>
                        <li>CRR 15 #15-105 CHIA-NOGAL 10</li>
                        <button>
                            <a href="http://www.siasoftsas.com/site/site/contactenos.html">link pagina</a>
                        </button>
                    </ul>
                </div>

                <div class="con-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>

    </div>
</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYe5YQQJ_LTjf4R2MwkY3J7zijtAG1LDo&callback=initMap">
</script>

<script>
    function initMap() {
        var myLatLng = { lat: 4.86719559, lng: -74.06385822 };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'SIASOFTPLUS SA'
        });
    }

</script>
</html>
