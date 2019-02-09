<?php 
    session_start();
    $nom=$_SESSION['usuario'];
    $id = $_SESSION['id'];
    $codigo = $_SESSION['codigo'];

    if (strlen($nom) <= 0) {
        header("location:../Default.php");
    }
?>