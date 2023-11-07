<?php


    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../../config/Connection.php";
    include_once "../../model/historial.php"; 



    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlEmpleado();
    $elRegistro = $conexion->cargarUsuarios();
    echo json_encode($elRegistro);

?>