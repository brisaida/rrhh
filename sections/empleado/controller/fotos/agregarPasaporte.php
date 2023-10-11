<?php

// *Importaciones (BD y modelo)
// *-------------------------------------------------------

include_once "../../../../config/connection.php";
include_once "../../model/empleado.php";

$nombresArchivos = array();

// Conocer la cantidad de archivos
$conteo = count($_FILES["archivos"]["name"]);
$idRegistro = isset($_POST['idRegistro']) ? $_POST['idRegistro'] : null;

$fileTmpPath = $_FILES['archivos']['tmp_name'][0];
$fileName = $_FILES['archivos']['name'][0];
$fileSize = $_FILES['archivos']['size'][0];
$fileType = $_FILES['archivos']['type'][0];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));


#Reestrucutrando nombre del archivo
$nombreArchivo = md5(time() . $fileName) . '.png';

$uploadFileDir = '../../archivos/pasaporte/';
$dest_path = $uploadFileDir . $nombreArchivo;

// Mover del temporal al directorio actual
move_uploaded_file($fileTmpPath, $dest_path);

// Instanciamos el modelo y llamamos al método correspondiente
$conexion = new mdlEmpleado();
$nombres = $conexion->actualizarPasaporte($nombreArchivo, $idRegistro);

?>
