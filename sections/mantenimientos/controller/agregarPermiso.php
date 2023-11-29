<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/permisos.php"; 

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $submodulo = isset($_POST['submodulo']) ? $_POST['submodulo'] : null;


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPermisos();
    $losRegistros = $conexion->agregarPermisos($id,$estado,$submodulo);
    echo json_encode($losRegistros);

?>