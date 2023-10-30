<?php

// *Importaciones (BD y modelo)
// *-------------------------------------------------------

include_once "../../../../config/connection.php";
include_once "../../model/empleado.php";

$nombresArchivos = array();

// Conocer la cantidad de archivos
$idRegistro = isset($_POST['id']) ? $_POST['id'] : null;
$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : null;

echo $idRegistro."<br>";
echo $tabla."<br>";

$conexion = new mdlEmpleado();
$resultado = $conexion->eliminarRegistro($tabla, $idRegistro);

if ($resultado === true) {
    echo json_encode(['ok' => true]);
} else {
    echo json_encode(['ok' => false, 'message' => $resultado]);
}

?>