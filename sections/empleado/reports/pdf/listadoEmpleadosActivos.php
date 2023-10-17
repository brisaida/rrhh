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
     
    $datosGenerales = $empleados->listarTodoReporte();
    

  
    
    
    
    $pdf->AddPage();

    
    $fila=40;

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(18,$fila);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'FUNDACIÓN COHONDUCAFE' ),0, 0, 'C', 1);
    $pdf->Ln(); 
    $fila+=6;
    $pdf->SetFont('Arial','B',10);
	$pdf->SetXY(18,$fila);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Empleados activos' ),0, 0, 'C', 1);
    $fila+=10;

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(10,6, iconv("UTF-8","ISO-8859-1//TRANSLIT", 'No'), 1, 0, 'C', 1);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(30,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DNI' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'NOMBRE COMPLETO' ), 1, 0, 'C', 1);
    $fila+=6;

    $i=0;
    foreach ($datosGenerales as $datosGenerales) {
        $i++;
        $pdf->Ln(); 
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(20,$fila);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,6, iconv("UTF-8","ISO-8859-1//TRANSLIT", $i), 1, 0, 'C', 1);
        $pdf->SetXY(30,$fila);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales['DNI']), 1, 0, 'C', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '   '. capitalizarPalabras( $datosGenerales['nombreCompleto']) ), 1, 0, 'l', 1);
        $fila+=6;

    }

       

 
    $pdf->Output('ListadoEmpleadosActivos.pdf','I');

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
