<?php

// *Importaciones (BD y modelo)
// *-------------------------------------------------------

include_once "../../../../config/connection.php";
include_once "../../model/empleado.php";

$nombresArchivos = array();

// Conocer la cantidad de archivos
$idRegistro = isset($_POST['idHistorial']) ? $_POST['idHistorial'] : null;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$empleado = isset($_POST['idRegistro']) ? $_POST['idRegistro'] : null;

$conexion = new mdlEmpleado();
$resultado = $conexion->actualizarRetiroHistortial($fecha, $idRegistro,$usuario);
$resultado = $conexion->eliminarRegistro("empleados", $empleado,"idEmpleado");

if ($resultado === true) {
    echo json_encode(['ok' => true]);
} else {
    echo json_encode(['ok' => false, 'message' => $resultado]);
}

?>