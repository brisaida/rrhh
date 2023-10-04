<?php
    include '../../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';     
    include_once '../../model/empleado.php';
  
     // Creamos el objeto
    $pdf = new PDF();

   

     # caputa e instanciamientos
    $empleados = new mdlEmpleado();
 
    $idEmpleado = isset($_GET['id']) ? $_GET['id'] : null;
    //$idEmpleado = 150;
     
    $datosGenerales = $empleados->buscarDatosGenerales($idEmpleado);
    $nombreCompleto=  $datosGenerales[0]['primerNombre'].' '.$datosGenerales[0]['segundoNombre'].' '.$datosGenerales[0]['primerApellido'].' '.$datosGenerales[0]['segundoApellido'];
    $nombreCompleto=capitalizarPalabras($nombreCompleto);
    
    $pdf->AddPage();

    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(150,53);
	$pdf->MultiCell(100,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'San Pedro Sula, Cortés'));
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(155,60);
	$pdf->MultiCell(60,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFecha( date("Y") . "-" . date("m") . "-" . date("d"))));
    
    
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(15,67);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Señores'));
	$pdf->SetXY(15,74);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'FUNDACIÓN COHONDUCAFE')); 
	$pdf->SetXY(15,81);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Oficina Principal SPS')); 
	$pdf->SetXY(15,95);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Atención: R.R.H.H')); 


    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(15,109);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Por este medio hago constar que yo, '.$nombreCompleto.', número de identidad '.$datosGenerales[0]['DNI'].', mantengo una relación de cuentahabiente con la institución bancaria BAC con una cuenta de ahorro con la siguiente información:')); 

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(40,140);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'No. de Cuenta' ), 1, 0, 'C', 1);
    $pdf->Cell(40, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tipo de Cuenta' ),1, 0, 'C', 1);
    $pdf->Cell(40, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Moneda' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',11);
    $pdf->SetX(40);
    $pdf->Cell(40, 7, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['cuentaBancaria']), 1, 0, 'C', 1);
    $pdf->Cell(40, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Ahorro'),1, 0, 'C', 1);
    $pdf->Cell(40, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Lempiras'),1, 0, 'C', 1);

    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(15,165);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Así mismo autorizo a Fundación COHONDUCAFE a ligar mi cuenta a los planes de la organización para pago de salarios, reembolsos de gastos y prestaciones laborales y demás acciones que se requieran.'));
    
    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(15,200);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Atentamente,'));


    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(30,235);
	$pdf->Cell(80, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre del empleado' ),0, 0, 'C', 1);
	$pdf->SetXY(120,235);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Firma del Jefe Inmediato'));
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(30,242);
	$pdf->Cell(80, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$nombreCompleto),0, 0, 'C', 1);
    $pdf->SetFont('Arial','',12);
	$pdf->SetXY(133,242);
	$pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Autorizado'));

      


 
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
