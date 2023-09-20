<?php


    // Importaciones(BD y modelo)
/*     include_once "../../../../config/connection.php";
    include_once "../../models/archivosProductor.php";
 */
    // Creación de arreglo para almacenar los nombres de los archivos
    $nombresArchivos = array();

    // Conocer la cantidad de archivos
    $conteo = count($_FILES["archivos"]["name"]);
    $idRegistro = isset($_POST['idRegistro']) ? $_POST['idRegistro'] : null;


    for ($i = 0; $i < $conteo; $i++) {

        $fileTmpPath = $_FILES['archivos']['tmp_name'][$i];
        $fileName = $_FILES['archivos']['name'][$i];
        $fileSize = $_FILES['archivos']['size'][$i];
        $fileType = $_FILES['archivos']['type'][$i];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));


        #Reestrucutrando nombre del archivo
        $nombreArchivo = md5(time() . $fileName) . '.' . $fileExtension;

     
        $uploadFileDir = '../archivos/empleado/';
        $dest_path = $uploadFileDir . $nombreArchivo;

        // Mover del temporal al directorio actual
        move_uploaded_file($fileTmpPath, $dest_path);

/*         // Añadimos el nuevo nombre del archivo al array
        array_push($nombresArchivos, $nombreArchivo);  */
    }
   
    
    
   

/*     // Convertir conjunto de datos a objeto
    $losNombres = (object) $nombresArchivos;
 
   

    // Instanciamos el modelo y llamamos al método correspondiente
     $conexion = new mdlArchivosProductor();
    $nombres = $conexion->agregarFotoRTN($losNombres,$idRegistro);  */
?>