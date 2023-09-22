<?php


    // *Importaciones (BD y modelo)
    // *-------------------------------------------------------

    include_once "../../../config/connection.php";
    include_once "../model/empleado.php"; 


    // *Captura de la información enviada desde el js.
    // *-------------------------------------------------------

    $generales = isset($_POST['datosGenerales']) ? $_POST['datosGenerales'] : null;
    $datosGenerales = (object) $generales;

    $parentesco = isset($_POST['parentesco']) ? $_POST['parentesco'] : null;
    $datosParentesco = (object) $parentesco;

    $parentescoConocidos = isset($_POST['parentescoConocidos']) ? $_POST['parentescoConocidos'] : null;
    $datosParentescoConocidos = (object) $parentescoConocidos;

    $salud = isset($_POST['salud']) ? $_POST['salud'] : null;
    $datosSalud= (object) $salud;

    $educacion = isset($_POST['educacion']) ? $_POST['educacion'] : null;
    $datosEducacion = (object) $educacion;

    $estudiosActuales = isset($_POST['estudiosActuales']) ? $_POST['estudiosActuales'] : null;
    $datosEstudiosActuales = (object) $estudiosActuales;

    $historialLaboral = isset($_POST['historialLaboral']) ? $_POST['historialLaboral'] : null;
    $datosHistorialLaboral = (object) $historialLaboral;

    $referencias = isset($_POST['referencias']) ? $_POST['referencias'] : null;
    $datosReferencias = (object) $referencias;

    $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : null;
    $datosIdiomas = (object) $idiomas;

    $conocidos = isset($_POST['conocidos']) ? $_POST['conocidos'] : null;

    $actual = isset($_POST['actual']) ? $_POST['actual'] : null;


    // *Instancia al modelo yllamada al método correspondiente
    // *-------------------------------------------------------
    $conexion = new mdlEmpleado();
    $elRegistro = $conexion->agregarRegistro(   $datosGenerales,
                                                $datosParentesco,
                                                $datosParentescoConocidos,
                                                $datosSalud,
                                                $datosEducacion,
                                                $datosEstudiosActuales,
                                                $datosHistorialLaboral,
                                                $datosReferencias,
                                                $datosIdiomas,
                                                $conocidos,
                                                $actual,
                                            ); 
    
?>