<?php

// *Importaciones (BD y modelo)
// *-------------------------------------------------------

include_once "../../../../config/connection.php";
include_once "../../model/empleado.php";

$nombresArchivos = array();

// Conocer la cantidad de archivos
$idRegistro = isset($_POST['id']) ? $_POST['id'] : null;
$campo = isset($_POST['campo']) ? $_POST['campo'] : null;
$campo2 = isset($_POST['campo2']) ? $_POST['campo2'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$valor2 = isset($_POST['valor2']) ? $_POST['valor2'] : null;
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : null;


$conexion = new mdlEmpleado();
$resultado = $conexion->actualizarEmpleado2($campo, $valor,$campo2, $valor2, $idRegistro,$usuario,$tabla);

if ($resultado === true) {
    echo json_encode(['ok' => true]);
} else {
    echo json_encode(['ok' => false, 'message' => $resultado]);
}

?>