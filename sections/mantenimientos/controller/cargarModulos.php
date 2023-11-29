<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/permisos.php"; 




    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPermisos();
    $losRegistros = $conexion->cargarModulos();
    echo json_encode($losRegistros);

?>