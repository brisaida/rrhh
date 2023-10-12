<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/notificaciones.php"; 


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlNotificaciones();
    $losRegistros = $conexion->listarCumples();
    echo json_encode($losRegistros);

?>