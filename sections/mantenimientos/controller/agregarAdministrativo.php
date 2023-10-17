<?php


    // Importaciones (BD y modelo)
    include_once "../../../config/Connection.php";
    include_once "../model/puestos.php";

    // Obtener los datos para almacenar
    $registro = isset($_POST['admin']) ? $_POST['admin'] : null;
    // Convertir conjunto de datos a objeto
    $losDatos = (object) $registro;

    // Instanciamos el modelo y llamamos al método correspondiente
    $conexion = new mdlPuestos();
    $proyecto = $conexion->agregarAdmin($losDatos);


?>