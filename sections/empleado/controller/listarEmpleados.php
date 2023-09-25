<?php

    
    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/empleado.php"; 


    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlEmpleado();
    $losRegistros = $conexion->listarTodo();
    echo json_encode($losRegistros);

?>