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

    
    $pdf->Image('../../../assets/images/brand/logo_cohonducafe.png', 20, 8, 80,25 );
    $pdf->Ln(); 

    
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

     /* CORRELATIVO*/
    $pdf->Ln(4);
    $pdf->SetXY(160,18);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(30,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'NO. SOLICITUD'),0,0,'C');
    $pdf->SetXY(165,23);
    $pdf->Cell(20,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatNumber($accionPersonal[0]['idAccionPersonal'])),0,0,'C');

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
    $pdf->Cell(45, 11, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFecha($datosGenerales[0]['ingreso'])), 1, 0, 'C', 1);
    $pdf->Cell(80, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$datosGenerales[0]['nombrePuesto']),1, 0, 'C', 1);
    $pdf->Cell(45, 11,iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe'])),1, 0, 'C', 1);
    $pdf->Ln(); 

    $pdf->SetFillColor(255, 255, 255,0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetXY(65, 81);
    

    
    // Segunda celda con borde inferior y derecho
    $cadena=capitalizarPalabras($datosGenerales[0]['proyecto']) . ' - ' . capitalizarPalabras($datosGenerales[0]['Descripcion']);
    $pdf->Cell(80, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT", $cadena), 'BLR', 0, 'C', 1);

    


    /* TIPO DE ACCIÓN */
    $fila=94;
    $pdf->Ln(4);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'II.   TIPO DE ACCIÓN '));
    
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila+6);
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
    $pdf->SetXY(20,$fila+18);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Días a tomar' ), 1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$accionPersonal[0]['cantidadDias'] ), 1, 0, 'C', 1);

 
    /* RIGE DESDE*/
    $fila=130;
    $pdf->Ln(4);
    $pdf->SetXY(20,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'III.   RIGE DESDE'));

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila+6);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'El día' ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Hora' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",($accionPersonal[0]['desde']) ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'7:00 AM' ), 1, 0, 'C', 1);
 
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,$fila+18);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Reanuda' ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Hora' ),1, 0, 'C', 1);

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->SetX(20);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",($accionPersonal[0]['hasta']) ), 1, 0, 'C', 1);
    $pdf->Cell(85, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'7:00 AM' ), 1, 0, 'C', 1);

 
    /* FIRMAS */


    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,200);
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
     /*$pdf->Ln(4);
    $pdf->SetXY(20,198);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'V.    PARA USO DE RRHH/GERENCIA'));

    if($accionPersonal[0]['tipoAccion']==1){

     $dias=$accionPersonal[0]['cantidadDias'];
    }else{
        $dias=0;
    }

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,205);
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
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$dias),1, 0, 'C', 1);
    $pdf->Cell(56, 6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ),1, 0, 'C', 1);
 */

    /* FIRMAS */
    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(20,240);
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
    $pdf->Cell(60, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['director'])  ), 0, 0, 'C', 1);
    $pdf->Cell(10, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 0, 0, 'C', 1);

    $pdf->SetFont('Arial','I',8);
	$pdf->setxy(20,262);
	$pdf->Cell(20,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Acción de Personal - RRHH'),0,0,'L');
	$pdf->setxy(20,266);
	$pdf->Cell(20,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Versión 1.0 - 01/12/2021'),0,0,'L');


    $pdf->AddPage();

    /* FECHAS*/
    $fila=250; 

    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(40,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Solicitado por:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($accionPersonal[0]['empleado']) ), 'LTB', 0, 'L', 1);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFechaEstampa($accionPersonal[0]['fechaCreado']) ), 'TRB', 0, 'L', 1);


    $fila+=6;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(40,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por jefe:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($datosGenerales[0]['jefe']) ), 'LTB', 0, 'L', 1);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFechaEstampa($accionPersonal[0]['fechaAprobadoN1']) ),'TRB', 0, 'L', 1);

    $fila+=6;
    $pdf->Ln();
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(40,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(45, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por RRHH:' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",capitalizarPalabras($accionPersonal[0]['RHHH']) ), 'LTB', 0, 'L', 1);
    $pdf->Cell(50, 6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",formatearFechaEstampa($accionPersonal[0]['fechaAprobadoN2']) ), 'TRB', 0, 'L', 1);



    
    



 
 
    $nombreArchivo = $accionPersonal[0]['idAccionPersonal'].".pdf";
    $rutaArchivo = "../archivos/" . $nombreArchivo;
    $pdf->Output('F', $rutaArchivo); // Guarda el archivo en el servidor

     

    






    /* Funciones */
    function formatearFecha($fecha) {
        // Intenta establecer la configuración regional en español
        $localeSet = setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'es');
        
        // Verifica si la configuración regional se estableció correctamente
        if (!$localeSet) {
            // Configuración regional no establecida, manejar el error o usar un enfoque alternativo
            return 'Error al establecer la configuración regional';
        }
    
        // Dividir la fecha en componentes (año, mes, día)
        list($año, $mes, $dia) = explode('-', $fecha);
    
        // Obtener el nombre del mes en español
        $nombreMes = strftime("%B", mktime(0, 0, 0, $mes, 1, $año));
    
        // Formatear la fecha en el formato deseado
        $fechaFormateada = $dia . " de " . ucfirst($nombreMes) . " de " . $año;
    
        // Restaurar la configuración regional predeterminada
        setlocale(LC_TIME, '');
    
        return $fechaFormateada;
    }
    
    function formatearFechaHR($fecha) {
        $datetime = new DateTime($fecha);
    
        // Crear el formateador de fecha en español
        $formatter = new IntlDateFormatter(
            'es_ES',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE
        );
    
        // Formatear la fecha
        $fechaFormateada = $formatter->format($datetime);
    
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

    function formatNumber($number) {
        return str_pad($number, 3, "0", STR_PAD_LEFT);
    }
    
    
    
