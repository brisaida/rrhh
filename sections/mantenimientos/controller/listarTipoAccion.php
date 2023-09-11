<?php

   
    include_once "../../../config/Connection.php";
    include_once "../model/accionPersonal.php";

    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlAccionPersonal();
    $losRegistros = $conexion->listarRegistros();
    echo json_encode($losRegistros);

?>