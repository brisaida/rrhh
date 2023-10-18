<?php
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/puestos.php"; 

    $registro = isset($_POST['id']) ? $_POST['id'] : null;


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPuestos();
    $losRegistros = $conexion->listarPuestosTecnicos($registro);
    echo json_encode($losRegistros);

?>