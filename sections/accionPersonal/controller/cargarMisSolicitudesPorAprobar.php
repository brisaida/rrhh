<?php

    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/accion.php"; 


    $registro = isset($_POST['id']) ? $_POST['id'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlAccion();
    $elRegistro = $conexion->cargasMisSolicitudesPorAprobar($registro,$estado);
    echo json_encode($elRegistro);

?>