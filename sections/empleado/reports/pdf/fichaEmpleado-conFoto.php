<?php

    ini_set('max_execution_time', 1200);
    include '../../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';     
    include_once '../../model/empleado.php';
  
     // Creamos el objeto
    $pdf = new PDF();
   

     # caputa e instanciamientos
    $empleados = new mdlEmpleado();
 
    $idEmpleado = isset($_GET['id']) ? $_GET['id'] : null;
    //$idEmpleado = 160;
     
    $datosGenerales = $empleados->buscarDatosGenerales($idEmpleado);
    $educacion = $empleados->buscarEducación($idEmpleado);
    $estudios = $empleados->buscarEstudios($idEmpleado);
    $estudiosActuales = $empleados->buscarEstudios($idEmpleado);
    $historiaFam = $empleados->buscarHistoriaFamiliar($idEmpleado);
    $salud = $empleados->buscarInfoSalud($idEmpleado);
    $antecedentes = $empleados->buscarAntecedentes($idEmpleado);
    $referencias = $empleados->buscarReferencias($idEmpleado);
    $conocidos = $empleados->buscarConocidos($idEmpleado);
    

    // *Tipo de sangre
    switch ($salud[0]['tipoSangre']) {
        case 'AP':  $tipoSangre='A+';  break;
        case 'AN':  $tipoSangre='A-';  break;
        case 'BP':  $tipoSangre='B+';  break;
        case 'BN':  $tipoSangre='B-';  break;
        case 'ABP': $tipoSangre='AB+';  break;
        case 'ABN': $tipoSangre='AB-';  break;
        case 'OP':  $tipoSangre='O+';  break;
        case 'ON':  $tipoSangre='O-';  break;
        default:
            
    }

    //*Estudios actuales
    if (!($estudiosActuales)) {
        $actual= "";
    } else {
        $actual= "X";
    }

    //*Estudios actuales
    if (!($conocidos)) {
        $tieneConocidos= "";
    } else {
        $tieneConocidos= "X";
    }
    
    // *Genero
    if($datosGenerales[0]['genero']==1){
        $genero='Femenino';
    }else{
        $genero='Masculino';
    }

    // *Identificar licencia
    if($datosGenerales[0]['vencimientoLicencia']=='1900-01-01' || empty( $datosGenerales[0]['vencimientoLicencia'])){
        $carro='';
        $fechaCarro='';
    }else{
        $carro='X';
        $fechaCarro=$datosGenerales[0]['vencimientoLicencia'];
    }

    if($datosGenerales[0]['vencimientoLicenciaMoto']=='1900-01-01' || empty( $datosGenerales[0]['vencimientoLicenciaMoto'])){
        $moto='';
        $fechaMoto='';
    }else{
        $moto='X';
        $fechaMoto=$datosGenerales[0]['vencimientoLicenciaMoto'];
    }
    if($datosGenerales[0]['vencimientoPasaporte']=='1900-01-01' || empty( $datosGenerales[0]['pasaporte'])){
        $fechaVPasaporte='';
        $pasaporte='';
    }else{
        $pasaporte='X';
        $fechaVPasaporte=$datosGenerales[0]['vencimientoPasaporte'];
    }



    $edad=calcularEdad($datosGenerales[0]['fechaNacimiento']);
   
    //*Imagenes
    // Ruta de la imagen original
    $imagePath = '../../../../sections/empleado/archivos/empleado/' . $datosGenerales[0]['foto'];
    $dniFront="../../../../sections/empleado/archivos/dni/".$datosGenerales[0]['dniFront'];
    $dniBack="../../../../sections/empleado/archivos/dni/".$datosGenerales[0]['dniBack'];
    $carroFront="../../../../sections/empleado/archivos/licencia_carro/".$datosGenerales[0]['licenciaCarroFront'];
    $carroBack="../../../../sections/empleado/archivos/licencia_carro/".$datosGenerales[0]['licenciaCarroBack'];
    $motoFront="../../../../sections/empleado/archivos/licencia_moto/".$datosGenerales[0]['licenciaMotoFront'];
    $motoBack="../../../../sections/empleado/archivos/licencia_moto/".$datosGenerales[0]['licenciaMotoBack'];
    $pasaporteFoto="../../../../sections/empleado/archivos/pasaporte/".$datosGenerales[0]['pasaporte'];  

    $nombreCompleto=$datosGenerales[0]['primerNombre'].' '.$datosGenerales[0]['segundoNombre'].' '.$datosGenerales[0]['primerApellido'].' '.$datosGenerales[0]['segundoApellido'];


    $pdf->AddPage();


    
    // Mostrar la imagen
    convertirPNG($pdf,$imagePath,20,60,30,33);
    
     // Contenido del documento (Título)
     $pdf->Ln(4);
     $pdf->SetXY(75,40);
     $pdf->SetFont('Arial','B',13);
     $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'FICHA DE EMPLEADO'));
     // Contenido del documento (Título)
     $pdf->Ln(4);
     $pdf->SetXY(15,50);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'I.   DATOS GENERALES '));
    $pdf->Line(15, 59, 195, 59); // H. aariba
     $pdf->Line(15, 59, 15, 110); // V. izquierda // V. derecha

    $pdf->Ln(4);

    $pdf->Line(55, 100, 55, 59);
    $pdf->Line(15, 106, 55, 106); 

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(55,59);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'No. de Identidad' ), 1, 0, 'C', 1);
    $pdf->Cell(100, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre Completo' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(55);
    $pdf->Cell(40, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['DNI']), 1, 0, 'C', 1);
    $pdf->Cell(100, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($nombreCompleto)),1, 0, 'C', 1);

    
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(55,71);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Lugar de Nacimiento' ), 1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Nacimiento' ),1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nacionalidad' ),1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(55);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['lugarNacimiento'] ), 1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFecha($datosGenerales[0]['fechaNacimiento']) ),1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['nacionalidad'] ),1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(55,83);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Género' ), 1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Estado civil' ),1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'No. de Telefono' ),1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(55);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['descEstadoCivil'] ), 1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$genero),1, 0, 'C', 1);
    $pdf->Cell(50,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['telefono'] ),1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,95);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Código Empleado' ), 1, 0, 'C', 1);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'No. de Cuenta BAC' ), 1, 0, 'C', 1);
    $pdf->Cell(34,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Pasaporte' ), 1, 0, 'C', 1);
    $pdf->Cell(33,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Vehiculo' ),1, 0, 'C', 1);
    $pdf->Cell(33,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Moto' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'C', 1);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['cuentaBancaria'] ), 1, 0, 'C', 1);
    $pdf->Cell(7,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$pasaporte  ), 1, 0, 'C', 1);
    $pdf->Cell(27,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fechaVPasaporte  ), 1, 0, 'C', 1);
    $pdf->Cell(7,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$carro),1, 0, 'C', 1);
    $pdf->Cell(26,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fechaCarro),1, 0, 'C', 1);
    $pdf->Cell(7,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$moto ), 1, 0, 'C', 1);
    $pdf->Cell(26,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fechaMoto ), 1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,107);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Correo Electronico' ), 1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['email'] ), 1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Dirección' ), 1, 0, 'C', 1);

    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['direccion'] ), 1, 0, 'C', 1);



    $pdf->Ln(4);
    $pdf->SetXY(15,132);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'II.   HISTORIAL ACADÉMICO'));

    
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,140);
    $pdf->SetFont('Arial','B',9);
    $col_widths = array(20, 55, 85, 10, 10);
    $headers = array('Nivel', 'Centro Educativo', 'Estudios', 'Desde', 'Hasta');
    for ($i = 0; $i < count($headers); $i++) {
        $pdf->Cell($col_widths[$i], 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT", $headers[$i]), 1, 0, 'C', 1);
    }
    $pdf->Ln();
    $fila = 146;
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',8);
    
    foreach ($educacion as $edu) {
        $x = 15;
        $y = $fila;
    
        $lines = array(
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $edu['nivel']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $edu['centroEducativo']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $edu['estudio']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $edu['desde']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $edu['hasta'])
        );
    
        $max_height = 6; // Altura mínima
        foreach ($lines as $index => $line) {
            $max_height = max($max_height, $pdf->NbLines($col_widths[$index], $line) * 6);
        }
    
        foreach ($lines as $index => $line) {
            $pdf->SetXY($x, $y);
            $pdf->MultiCell($col_widths[$index], $max_height / $pdf->NbLines($col_widths[$index], $line), $line, 1, 'C');
            $x += $col_widths[$index];
        }
        $fila += $max_height;
    }
    
    
    if($actual=='X'){
        $pdf->Ln();
        $pdf->SetFillColor(209, 209, 209);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'¿Estudia Actualmente?' ), 1, 0, 'C', 1);

        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetX(75);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(15,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$actual ), 1, 0, 'C', 1);
        
        $pdf->Ln();
        $pdf->SetFillColor(209, 209, 209);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(90,$fila);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(35,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT","Carrera/Diplimado"), 1, 0, 'C', 1);

        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetX(125);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(70,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$estudiosActuales[0]['carrera']), 1, 0, 'L', 1);
        $fila+=9;
    
    }
  
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'III. HISTORIA FAMILIAR DIRECTA'));
    $fila+=7;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $col_widths = array(20, 40, 15, 20, 85);
    $headers = array('Parentesco', 'Nombre', 'Edad', 'Teléfono', 'Dirección');
    for ($i = 0; $i < count($headers); $i++) {
        $pdf->Cell($col_widths[$i], 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT", $headers[$i]), 1, 0, 'C', 1);
    }
    $fila+=6;
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);

    foreach ($historiaFam as $fam) {
        $x = 15;
        $y = $fila;

        $lines = array(
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $fam['parentesco']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $fam['nombre']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", calcularEdad($fam['fechaNacimiento'])),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $fam['telefono']),
            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $fam['direccion'])
        );

        $max_height = 6; // Altura mínima
        foreach ($lines as $index => $line) {
            $max_height = max($max_height, $pdf->NbLines($col_widths[$index], $line) * 6);
        }

        foreach ($lines as $index => $line) {
            $pdf->SetXY($x, $y);
            $pdf->MultiCell($col_widths[$index], $max_height / $pdf->NbLines($col_widths[$index], $line), $line, 1, 'C');
            $x += $col_widths[$index];
        }
        $fila += $max_height;
    }


    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'IV.   DATOS MEDICOS'));
    $pdf->Ln();
    $fila+=7;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'1. Contacto de Emergencia' ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ),1, 0, 'C', 1);
    $pdf->Cell(55,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'2. Contacto de Emergencia' ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ),1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['contactoEmergencia1'] ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['tel1'] ),1, 0, 'C', 1);
    $pdf->Cell(55,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['contactoEmergencia2'] ),1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['tel2'] ),1, 0, 'C', 1);
 
    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Médico de cabecera' ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ),1, 0, 'C', 1);
    $pdf->Cell(55,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Centro Medico preferido' ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tipo de Sangre' ),1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(55,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['medico'] ), 1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['telMedico'] ),1, 0, 'C', 1);
    $pdf->Cell(55,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['centroMedico'] ),1, 0, 'C', 1);
    $pdf->Cell(35,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$tipoSangre),1, 0, 'C', 1);
 
    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(55,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Enferemdades de base' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(125,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$salud[0]['enfermedades'] ), 1, 0, 'l', 1);


    //* SEGUNDA PAGINA
    $pdf->AddPage();

    $fila=40;
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'V.   ANTECEDENTES LABORALES'));


    $pdf->Ln();
    $fila+=10;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'ÚLTIMO TRABAJO' ), 1, 0, 'C', 1);
    $pdf->Ln();

    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre de la empresa' ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tipo de Empresa' ),1, 0, 'C', 1);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['empresa'] ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['tipoEmpresa'] ),1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['telefono'] ),1, 0, 'C', 1);

    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Dirección' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['direccion'] ), 1, 0, 'l', 1);

    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Último puesto' ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre del jefe' ),1, 0, 'C', 1);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['ultimoPuesto'] ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['jefeInmediato'] ),1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['telJefe'] ),1, 0, 'C', 1);
    $pdf->Ln();

    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Ingreso' ), 1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Retiro' ),1, 0, 'C', 1);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Sueldo Inicial' ), 1, 0, 'C', 1);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Sueldo Final' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['ingreso'] ), 1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['retiro'] ),1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",number_format($antecedentes[0]['sueldoInicial'] , 2, '.', ',')),1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",number_format($antecedentes[0]['sueldoFinal'] , 2, '.', ',')),1, 0, 'C', 1);

    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Causas de Retiro' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(135,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['causaRetiro'] ), 1, 0, 'l', 1);

    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Descripción del Puesto' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(60,$fila);
    $pdf->SetFont('Arial','',9);
  //  $pdf->Cell(135,6,), 1, 0, 'l', 1);
    $pdf->MultiCell(135, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[0]['obligaciones'] ), 1, 'L', 1);

    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(180,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'PENULTIMO TRABAJO' ), 1, 0, 'C', 1);
    $pdf->Ln();

    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre de la empresa' ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tipo de Empresa' ),1, 0, 'C', 1);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['empresa'] ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['tipoEmpresa'] ),1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['telefono'] ),1, 0, 'C', 1);

    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Dirección' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['direccion'] ), 1, 0, 'l', 1);

    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Último puesto' ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre del jefe' ),1, 0, 'C', 1);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['ultimoPuesto'] ), 1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['jefeInmediato'] ),1, 0, 'C', 1);
    $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['telJefe'] ),1, 0, 'C', 1);
    $pdf->Ln();

    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Ingreso' ), 1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Retiro' ),1, 0, 'C', 1);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Sueldo Inicial' ), 1, 0, 'C', 1);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Sueldo Final' ), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['ingreso'] ), 1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['retiro'] ),1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",number_format($antecedentes[1]['sueldoInicial'] , 2, '.', ',')),1, 0, 'C', 1);
    $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",number_format($antecedentes[1]['sueldoFinal'] , 2, '.', ',')),1, 0, 'C', 1);


    $pdf->Ln();
    $fila+=12;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Causas de Retiro' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(135,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['causaRetiro'] ), 1, 0, 'l', 1);

    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Descripción del Puesto' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(135,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$antecedentes[1]['obligaciones'] ), 1, 0, 'l', 1);

    
  $fila+=6;
    if($tieneConocidos=='X'){
        
        $pdf->Ln(4);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'CONOCIDOS DENTRO DE LA EMPRESA'));
    
        $fila+=7;
        $pdf->Ln();
        $pdf->SetFillColor(209, 209, 209);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre' ), 1, 0, 'C', 1);
        $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Parentesco' ), 1, 0, 'C', 1);
        $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tiempo en Conocerlo' ), 1, 0, 'C', 1);
        $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Empresa en que labora' ), 1, 0, 'C', 1);
        $pdf->Ln();
        $fila+=6;
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','',8);
        foreach ($conocidos as $cono) {
            $pdf->SetX(15);
            $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$cono['nombre'] ),1,0, 'C');
            $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$cono['parentesco'] ),1,0, 'C');
            $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$cono['tiempoConocerlo'] ),1,0, 'L');
            $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$cono['empresaLabora'] ),1,0, 'C');
            $pdf->Ln();
            $fila+=7; 
        }
    }
    

    $fila+=3;
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'VI.   REFERENCIAS PERSONALES'));


    $fila+=10;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre' ), 1, 0, 'C', 1);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Profesión' ), 1, 0, 'C', 1);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Dirección' ), 1, 0, 'C', 1);
    $pdf->Cell(30,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Teléfono' ), 1, 0, 'C', 1);
    $pdf->Ln();
    $fila+=6;
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','',8);
    foreach ($referencias as $ref) {
        $pdf->SetX(15);
        $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$ref['nombre'] ),1,0, 'C');
        $pdf->Cell(45,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$ref['profesion'] ),1,0, 'C');
        $pdf->Cell(60,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$ref['direccion'] ),1,0, 'L');
        $pdf->Cell(30,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$ref['telefono'] ),1,0, 'C');
        $pdf->Ln();
        $fila+=7; 
    }

    $fila+=10;
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Declaro que la información aqui sumisnistrada es fidedigna y faculto a su posterior comprobación.'));
    $fila+=13;
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(180,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Firma:__________________________ Lugar y Fecha: __________________________________________________________'));

    $pdf->AddPage();
    
    $fila=50;
    $pdf->Ln(4);
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(170,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'TARJETA DE IDENTIDAD'),0,0,'C');
    
    

    $pdf->SetLineWidth(0.5); // Ancho del borde en puntos
    $pdf->Rect(54, 69, 87, 58, 'D');
    $pdf->Rect(54, 149, 87, 58, 'D');
    convertirPNG($pdf,$dniFront,55, 70, 85, 55);
    convertirPNG($pdf,$dniBack, 55, 150, 85, 55);


  if(($carro=='X')){
        $pdf->AddPage();
        $fila=50;
        $pdf->Ln(4);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(170,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'LICENCIA VEHÍCULO'),0,0,'C');
        $pdf->SetLineWidth(0.5); // Ancho del borde en puntos
        $pdf->Rect(54, 69, 87, 58, 'D');
        $pdf->Rect(54, 149, 87, 58, 'D');
        convertirPNG($pdf,$carroFront,55, 70, 85, 55);
        convertirPNG($pdf,$carroBack, 55, 150, 85, 55);
    }
    if(($moto=='X')){
            $pdf->AddPage();
            $fila=50;
            $pdf->Ln(4);
            $pdf->SetXY(15,$fila);
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(170,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'LICENCIA MOTOCICLETA'),0,0,'C');
            $pdf->SetLineWidth(0.5); // Ancho del borde en puntos
            $pdf->Rect(54, 69, 87, 58, 'D');
            $pdf->Rect(54, 149, 87, 58, 'D');
 /*            convertirPNG($pdf,$motoFront, 55, 70, 85, 55);
            convertirPNG($pdf,$motoBack, 55, 150, 85, 55); */
        }

    if($pasaporte=='X'){
        $pdf->AddPage();
        $fila=50;
        $pdf->Ln(4);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(170,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'PASAPORTE'),0,0,'C');
        $pdf->SetLineWidth(0.5); // Ancho del borde en puntos
        $pdf->Rect(54, 69, 87, 58, 'D');
        
        convertirPNG($pdf,$pasaporteFoto, 55, 70, 85, 55);
    }
  

  
     

    $pdf->Output('Ficha empleado '.$nombreCompleto.'.pdf','I');






    /* Funciones */
    function formatearFecha($fecha) {
        // Establecer la configuración regional en español
        setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'es');
    
        // Dividir la fecha en componentes (año, mes, día)
        list($año, $mes, $dia) = explode('-', $fecha);
    
        // Obtener el nombre del mes en español
        $nombreMes = strftime("%B", mktime(0, 0, 0, $mes, 1, $año));
    
        // Formatear la fecha en el formato deseado
        $fechaFormateada = $dia . " de " . $nombreMes . " de " . $año;
    
        // Restaurar la configuración regional predeterminada
        setlocale(LC_TIME, '');
    
        return $fechaFormateada;
    }
    function capitalizarPalabras($cadena) {
        // Utilizar ucwords para capitalizar la primera letra de cada palabra
        $cadenaCapitalizada = ucwords(strtolower($cadena));
        return $cadenaCapitalizada;
    }
    function calcularEdad($fechaNacimiento) {
        // Convertir la fecha de nacimiento en un objeto DateTime
        $fechaNacimiento = new DateTime($fechaNacimiento);
        
        // Obtener la fecha actual como un objeto DateTime
        $fechaActual = new DateTime();
        
        // Calcular la diferencia entre las dos fechas
        $diferencia = $fechaNacimiento->diff($fechaActual);
        
        // Obtener la edad en años
        $edad = $diferencia->y;
        
        return $edad;
    }

    function convertirPNG($pdf, $imagePath, $x, $y, $width, $height) {
        if (extension_loaded('gd') && file_exists($imagePath)==true) {
            
            $originalImage = imagecreatefromjpeg($imagePath);
            $pngImage = imagecreatetruecolor(imagesx($originalImage), imagesy($originalImage));
    
            // Generar un nombre de archivo temporal único
            $pngImagePath = tempnam(sys_get_temp_dir(), 'temp_image_') . '.png';
    
            imagecopy($pngImage, $originalImage, 0, 0, 0, 0, imagesx($originalImage), imagesy($originalImage));
            imagepng($pngImage, $pngImagePath);
    
            $pdf->Image($pngImagePath, $x, $y, $width, $height, 'PNG');
    
            imagedestroy($originalImage);
            imagedestroy($pngImage);
    
            // No es necesario eliminar el archivo temporal, ya que se eliminará automáticamente
            // cuando el script termine o cuando el archivo ya no esté en uso.
        } else {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 10, '', 0, 1);
        }
    }


    
    
