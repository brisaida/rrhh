<?php


    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../../config/connection.php";
    include_once "../../model/empleado.php"; 


    $registro = isset($_POST['id']) ? $_POST['id'] : null;

    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlEmpleado();
    $elRegistro = $conexion->buscarHistoriaFamiliar($registro);
    echo json_encode($elRegistro);
?>