<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/puestos.php"; 


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPuestos();
    $losRegistros = $conexion->listarProyectos();
    echo json_encode($losRegistros);

?>