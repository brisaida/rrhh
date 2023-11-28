<?php

// *Importaciones (BD y modelo)
// *-------------------------------------------------------

include_once "../../../config/connection.php";
include_once "../model/accion.php";


$id = isset($_POST['id']) ? $_POST['id'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : null;

// Instanciamos el modelo y llamamos al método correspondiente
$conexion = new mdlAccion();
    $elRegistro = $conexion->cancelarSolicitudVacaciones($id, $estado, $comentarios);
    echo json_encode($elRegistro);

