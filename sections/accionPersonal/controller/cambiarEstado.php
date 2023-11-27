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
if ($estado == 4) {
    $elRegistro = $conexion->cancelarSolicitud($id, $estado, $comentarios);
    echo json_encode($elRegistro);
} else {
    $elRegistro = $conexion->cambiarEstado($id, $estado, $comentarios);
    echo json_encode($elRegistro);
}
