<?php
    include '../../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';     
    include_once '../../model/empleado.php';
  
     // Creamos el objeto
     $pdf = new PDF();

   

     # caputa e instanciamientos
    $empleados = new mdlEmpleado();
 
    //$idEmpleado = isset($_GET['id']) ? $_GET['id'] : null;
    $idEmpleado = 150;
     
    $datosGenerales = $empleados->buscarDatosGenerales($idEmpleado);
    $educacion = $empleados->buscarEducación($idEmpleado);
    $estudios = $empleados->buscarEstudios($idEmpleado);




    if($datosGenerales[0]['genero']==1){
        $genero='Femenino';
    }else{
        $genero='Masculino';
    }
    $edad=calcularEdad($datosGenerales[0]['fechaNacimiento']);

    $nombreCompleto=$datosGenerales[0]['primerNombre'].' '.$datosGenerales[0]['segundoNombre'].' '.$datosGenerales[0]['primerApellido'].' '.$datosGenerales[0]['segundoApellido'];
    /*   $asistenciaTecnica = $asistencias->obtenerDetalle($idCapacitacion);
     $losParticipantes = $participantes->listarRegistros($idAsistencia); */ 
 
      // Adicionamos una página en blanco
      $pdf->AddPage();
      $anchoMaximo = 80;
      
 
     // Contenido del documento (Título)
     $pdf->Ln(4);
     $pdf->SetXY(75,40);
     $pdf->SetFont('Arial','B',13);
     $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'FICHA DE EMPLEADO'));
     // Contenido del documento (Título)
     $pdf->Ln(4);
     $pdf->SetXY(15,50);
     $pdf->SetFont('Arial','B',11);
     $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'I.   DATOS GENERALES'));
   /*   $pdf->Line(15, 59, 195, 59); // H. aariba
     $pdf->Line(15, 150, 195, 150); // H. abaho
     $pdf->Line(15, 59, 15, 150); // V. izquierda
     $pdf->Line(195, 59, 195, 150); // V. derecha
 */
    $pdf->Ln(4);
    $pdf->Image('../../../../sections/empleado/archivos/empleado/'.$datosGenerales[0]['foto'], 15, 62, 40, 50 );;
    $pdf->SetXY(60,59);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'No. de Identidad: '));
    $pdf->Ln(4);
    $pdf->SetXY(93,59);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['DNI']));
    
    $pdf->Ln(4);
    $pdf->Image('../../../../sections/empleado/archivos/empleado/'.$datosGenerales[0]['foto'], 15, 62, 40, 50 );;
    $pdf->SetXY(60,66);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Nombre Completo: '));
    $pdf->Ln(4);
    $pdf->SetXY(96,66);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($nombreCompleto)));
    
    $pdf->SetXY(60,73);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(10,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Fecha de Nacimiento: '));
    $pdf->Ln(4);
    $pdf->SetXY(101,73);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFecha($datosGenerales[0]['fechaNacimiento'])));
    
    $pdf->SetXY(140,73);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(10,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Edad: '));
    $pdf->Ln(4);
    $pdf->SetXY(153,73);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edad));
    
    $pdf->SetXY(60,80);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(101,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Lugar de Nacimiento: '));
    $pdf->Ln(4);
    $pdf->SetXY(100,80);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['lugarNacimiento'])));

    $pdf->SetXY(130,80);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Nacionalidad: '));
    $pdf->Ln(4);
    $pdf->SetXY(156,80);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['nacionalidad'])));

    $pdf->SetXY(60,87);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Genero: '));
    $pdf->Ln(4);
    $pdf->SetXY(76,87);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$genero));
    
    $pdf->SetXY(100,87);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Estado Civil: '));
    $pdf->Ln(4);
    $pdf->SetXY(124,87);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['descEstadoCivil'])));

    $pdf->SetXY(60,94);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'No. de Teléfono: '));
    $pdf->Ln(4);
    $pdf->SetXY(92,94);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['telefono']));
    
    $pdf->SetXY(115,94);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Correo Electronico: '));
    $pdf->Ln(4);
    $pdf->SetXY(152,94);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['email'])));
    
    $pdf->SetXY(60,101);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'No. de Cuenta Bancario (BAC): '));
    $pdf->Ln(4);
    $pdf->SetXY(120,101);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['cuentaBancaria'])));
    
    $pdf->SetXY(15,108);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Dirección:'));
    $pdf->Ln(4);
    $pdf->SetXY(15,115);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['direccion'])));
  
    $pdf->Ln(4);
    $pdf->SetXY(15,125);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'II.   EDUCACIÓN'));

    $pdf->SetTextColor(255); 
    $pdf->SetFillColor(1,64,109); 
    $pdf->SetXY(10,135);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Nivel'), 1, 0, 'C', 1);
    $pdf->Cell(40, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Centro Educativo'), 1, 0, 'C', 1);
    $pdf->Cell(45, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Estudios'), 1, 0, 'C', 1);
    $pdf->Cell(20, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Desde'), 1, 0, 'C', 1);
    $pdf->Cell(20, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Hasta'), 1, 0, 'C', 1);
    $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Lugar'), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);
    $fia=135; 
    foreach ($educacion as $edu) {
        $pdf->Cell(30, 8, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['nivel'] ), 1, 0, 'C', 1);
        $pdf->Cell(40, 8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['centroEducativo'] ),1, 0, 'C', 1);
        $pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['estudio'] ),1, 0, 'L', 1);
        $pdf->Cell(20,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['desde'] ),1, 0, 'C', 1);
        $pdf->Cell(20,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['hasta'] ),1, 0, 'C', 1);
        $pdf->Cell(35,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$edu['lugar'] ),1, 0, 'C', 1);
        $pdf->Ln();
        $fia=+7; 
    } 

    if(count($estudios)>0){
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Estudios en:'));
        $pdf->Ln(4);
        $pdf->SetXY(15,115);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(100,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",($datosGenerales[0]['carrera'])));
    }

    
 
      
 
     $pdf->Output('Ficha empleado '.$nombreCompleto.'.pdf','I');

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
