<?php

    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/accion.php"; 


    $datos = isset($_POST['anios']) ? $_POST['anios'] : null;

    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlAccion();
    $elRegistro = $conexion->cargarVacacionesAcumuladas($datos);
    echo json_encode($elRegistro);
?>