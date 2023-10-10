<?php
    include '../../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';     
    include_once '../../model/empleado.php';
  
     // Creamos el objeto
    $pdf = new PDF();

   

     # caputa e instanciamientos
    $empleados = new mdlEmpleado();
 
    //$idEmpleado = isset($_GET['id']) ? $_GET['id'] : null;
    $idEmpleado = 1;
     
    $datosGenerales = $empleados->buscarDatosGenerales($idEmpleado);
    $nombreCompleto=  $datosGenerales[0]['primerNombre'].' '.$datosGenerales[0]['segundoNombre'].' '.$datosGenerales[0]['primerApellido'].' '.$datosGenerales[0]['segundoApellido'];
    $nombreCompleto=capitalizarPalabras($nombreCompleto);
    
    $pdf->AddPage();

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(18,40);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'FUNDACIÓN COHONDUCAFE' ),0, 0, 'C', 1);
    $pdf->Ln(); 
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(18,47);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'CHECK-LIST' ),0, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(18,55);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre del Colaborador' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$nombreCompleto ), 1, 0, 'l', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(18,61);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Cargo' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'l', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(18,67);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Ingreso' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'l', 1);
    
    
      


 
    $pdf->Output('Carta de autorización '.$nombreCompleto.'.pdf','I');

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
