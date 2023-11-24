<?php

    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/accion.php"; 


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlAccion();
    $elRegistro = $conexion->verTodas();
    echo json_encode($elRegistro);
?>