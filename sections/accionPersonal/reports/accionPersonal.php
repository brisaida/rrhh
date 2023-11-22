<?php

    include '../../../reportes/pdf/plantilla2.php';
    include_once '../../../config/Connection.php';     
    include_once '../model/accion.php';
  
     // Creamos el objeto
    $pdf = new PDF();

    if (!isset($_SESSION)) {
        session_start();	
    }
        
     # caputa e instanciamientos
    $accion = new mdlAccion();

    $idAccionPersonal = $_GET['id'];
    $empleado = $_GET['idE'];
     
    $datosGenerales = $accion->buscarInfo($empleado);
    $accionPersonal = $accion->cargarSolicitudesPorId($idAccionPersonal);

 
    $pdf->AddPage();


    
     // Contenido del documento (Título)
     $pdf->Ln(4);
     $pdf->SetXY(85,40);
     $pdf->SetFont('Arial','B',13);
     $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'ACCIÓN DE PERSONAL'));

     /* DATOS GENERALES */
    $pdf->Ln(4);
    $pdf->SetXY(20,48);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'I.   DATOS GENERALES '));

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,54);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Código de Empleado' ), 1, 0, 'C', 1);
    $pdf->Cell(80, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre Completo' ),1, 0, 'C', 1);
    $pdf->Cell(45, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Solicitud' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(45, 10, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['codigoEmpleado'] ), 1, 0, 'C', 1);
    $pdf->Cell(80, 10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['nombreCompleto'])),1, 0, 'C', 1);
    $pdf->Cell(45, 10,iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFecha($accionPersonal[0]['fechaSolicitud'])),1, 0, 'C', 1);

 
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,70);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de ingreso' ), 1, 0, 'C', 1);
    $pdf->Cell(80, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Cargo' ),1, 0, 'C', 1);
    $pdf->Cell(45, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Jefe Inmediato' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(45, 11, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['ingreso']), 1, 0, 'C', 1);
    $pdf->Cell(80, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['nombrePuesto']),1, 0, 'C', 1);
    $pdf->Cell(45, 11,iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe'])),1, 0, 'C', 1);
    $pdf->Ln(); 

    $pdf->SetFillColor(255, 255, 255,0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetXY(65, 81);
    

    
    // Segunda celda con borde inferior y derecho
    $pdf->Cell(80, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT", capitalizarPalabras($datosGenerales[0]['proyecto']) . ' - ' . capitalizarPalabras($datosGenerales[0]['Descripcion'])), 'BLR', 0, 'C', 1);

    


    /* TIPO DE ACCIÓN */
    $pdf->Ln(4);
    $pdf->SetXY(20,90);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'II.   TIPO DE ACCIÓN '));
    
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,96);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Tipo de Acción' ), 1, 0, 'C', 1);
    $pdf->Cell(125, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Comentarios' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(45,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$accionPersonal[0]['accion'] ), 1, 0, 'C', 1);
    $pdf->MultiCell(125, 18,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$accionPersonal[0]['comentarios']),1, 'C', 1);

    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,108);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Días a tomar' ), 1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$accionPersonal[0]['cantidadDias'] ), 1, 0, 'C', 1);

 
    /* RIGE DESDE*/
    $pdf->Ln(4);
    $pdf->SetXY(20,123);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'III.   RIGE DESDE'));

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,129);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'El día' ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Hora' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFechaHR($accionPersonal[0]['desde']) ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",obtenerHora($accionPersonal[0]['desde']) ), 1, 0, 'C', 1);
 
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,141);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Reanuda' ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Hora' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFechaHR($accionPersonal[0]['hasta']) ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",obtenerHora($accionPersonal[0]['hasta']) ), 1, 0, 'C', 1);

 
    /* FIRMAS */


    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,185);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Solicitado por' ), 'T', 0, 'C', 1);
    $pdf->Cell(30, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por Jefe' ),'T', 0, 'C', 1);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);


    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($accionPersonal[0]['empleado']) ), 0, 0, 'C', 1);
    $pdf->Cell(30, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe'])  ), 0, 0, 'C', 1);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
 
  

 
    /* VACAIONES */
    $pdf->Ln(4);
    $pdf->SetXY(20,203);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'V.    PARA USO DE RRHH/GERENCIA'));

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,210);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(56, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Vacaciones Acumuladas' ), 1, 0, 'C', 1);
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Días a cuenta de Vacaciones' ),1, 0, 'C', 1);
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Vacaciones Disponibles' ),1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetX(20);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(56, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'C', 1);
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ),1, 0, 'C', 1);
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ),1, 0, 'C', 1);


    /* FIRMAS */
    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,250);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Recursos Humanos' ), 'T', 0, 'C', 1);
    $pdf->Cell(30, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Director' ),'T', 0, 'C', 1);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);


    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Dania Nohemy Perdomo' ), 0, 0, 'C', 1);
    $pdf->Cell(30, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe'])  ), 0, 0, 'C', 1);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);


    $pdf->AddPage();

    /* FECHAS*/
    $fila=50; 

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Solicitado por:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(110, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($accionPersonal[0]['empleado']).' - '.formatearFechaEstampa($accionPersonal[0]['fechaCreado']) ), 1, 0, 'L', 1);


    $fila+=6;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por jefe:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(110, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe']).' - '.formatearFechaEstampa($accionPersonal[0]['fechaAprobadoN1']) ), 1, 0, 'L', 1);

    $fila+=6;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por RRHH:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(110, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'L', 1);
    



 
 
    

     

    $pdf->Output('Acción de Personal - '.$nombreCompleto.'.pdf','I');






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
    function formatearFechaHR($fecha) {
        // Crea un objeto DateTime a partir de la cadena de fecha
        $datetime = new DateTime($fecha);
    
        // Formatea la fecha como "d de F del Y"
        $fechaFormateada = $datetime->format('d \d\e F \d\e\l Y');
    
        return $fechaFormateada;
    }
    function formatearFechaEstampa($fecha) {
        // Crea un objeto DateTime a partir de la cadena de fecha
        $datetime = new DateTime($fecha);
    
        // Formatea la fecha como "d-m-Y H:i:s"
        $fechaFormateada = $datetime->format('d-m-Y H:i:s');
    
        return $fechaFormateada;
    }
    
    function capitalizarPalabras($cadena) {
        // Utilizar ucwords para capitalizar la primera letra de cada palabra
        $cadenaCapitalizada = ucwords(strtolower($cadena));
        return $cadenaCapitalizada;
    }
    function obtenerHora($fecha) {
        // Crea un objeto DateTime a partir de la cadena de fecha
        $datetime = new DateTime($fecha);
    
        // Formatea la hora como "h:i A" (formato de 12 horas con AM/PM)
        $horaFormateada = $datetime->format('h:i A');
    
        return $horaFormateada;
    }

    
    
