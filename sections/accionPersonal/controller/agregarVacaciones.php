<?php


    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/accion.php"; 


    // *Captura de la información enviada desde el js.
    // *-------------------------------------------------------

    $datos = isset($_POST['datos']) ? $_POST['datos'] : null;
    $losDatos = (object) $datos;

 


    // *Instancia al modelo yllamada al método correspondiente
    // *-------------------------------------------------------
    $conexion = new mdlAccion();
    $elRegistro = $conexion->agregarVacaciones($losDatos); 
    
    if ($elRegistro === true) {
        echo json_encode(['ok' => true]);
    } else {
        echo json_encode(['ok' => false, 'message' => $elRegistro]);
    }
    
?>