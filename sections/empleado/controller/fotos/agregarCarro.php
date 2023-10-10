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
$nombreArchivo = md5(time() . $fileName) . '.png'; // Cambiamos la extensión a .png

$uploadFileDir = '../../archivos/licencia_carro/';
$dest_path = $uploadFileDir . $nombreArchivo;

// Verificar el tipo de archivo antes de la conversión
if (in_array($fileType, array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'))) {
    // Intentar cargar la imagen según su tipo
    switch ($fileType) {
        case 'image/jpeg':
        case 'image/jpg':
            $sourceImage = imagecreatefromjpeg($fileTmpPath);
            break;
        case 'image/png':
            $sourceImage = imagecreatefrompng($fileTmpPath);
            break;
        case 'image/gif':
            $sourceImage = imagecreatefromgif($fileTmpPath);
            break;
    }

    if ($sourceImage !== false) {
        // Convertir la imagen a formato PNG
        imagepng($sourceImage, $dest_path);

        // Liberar la memoria de la imagen original
        imagedestroy($sourceImage);

        // Instanciamos el modelo y llamamos al método correspondiente
        $conexion = new mdlEmpleado();
        $nombres = $conexion->licenciaFront($nombreArchivo, $idRegistro);
    } else {
        echo "Error al procesar la imagen.";
    }
} else {
    echo "Tipo de archivo no admitido.";
}

?>