<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/permisos.php"; 

    
    $registro = isset($_POST['id']) ? $_POST['id'] : null;

    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPermisos();
    $losRegistros = $conexion->cargarPermisos( $registro );
    echo json_encode($losRegistros);

?>