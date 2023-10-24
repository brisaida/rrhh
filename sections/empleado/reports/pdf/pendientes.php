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
     
    $datosGenerales = $empleados->pendientes();
    

  
    
    
    
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
    $pdf->SetXY(15,$fila);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(7,6, iconv("UTF-8","ISO-8859-1//TRANSLIT", 'No'), 1, 0, 'C', 1);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(22,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(30,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DNI' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(70,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'NOMBRE COMPLETO' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(75,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'PROYECTO' ), 1, 0, 'C', 1);
    $fila+=6;

    $i=0;
    $x=0;
    foreach ($datosGenerales as $datosGenerales) {
        $i++;
        $x++;
        $pdf->Ln(); 
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(15,$fila);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(7,6, iconv("UTF-8","ISO-8859-1//TRANSLIT", $i), 1, 0, 'C', 1);
        $pdf->SetXY(22,$fila);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales['dni']), 1, 0, 'C', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(70,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '   '. capitalizarPalabras( $datosGenerales['nombre']) ), 1, 0, 'l', 1);
        if ($datosGenerales['viverista']==1){
            $pdf->SetTextColor(92, 179, 119,);
        }else{
            $pdf->SetTextColor(0,0,0);
        }
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(75,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", $datosGenerales['proyecto']), 1, 0, 'l', 1);
        $fila+=6;
        if($x==34){
            $pdf->AddPage();
            $fila=50;
            $x=0;
        }

    }

       

 
    $pdf->Output('ListadoEmpleadosActivos.pdf','I');


    function capitalizarPalabras($cadena) {
        // Utilizar ucwords para capitalizar la primera letra de cada palabra
        $cadenaCapitalizada = ucwords(strtolower($cadena));
        return $cadenaCapitalizada;
    }