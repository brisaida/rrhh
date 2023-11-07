<?php
    include '../../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';     
    include_once '../../model/empleado.php';
  
     // Creamos el objeto
    $pdf = new PDF();

   

     # caputa e instanciamientos
    $empleados = new mdlEmpleado();
 
    $idEmpleado = isset($_GET['id']) ? $_GET['id'] : null;
   // $idEmpleado = 4;
     
    $datosGenerales = $empleados->buscarDatosGenerales($idEmpleado);
    $historial = $empleados->buscarHistorial($idEmpleado);
    $historialDetalle = $empleados->buscarHistorialDetalle($historial[0]['idHistorial']);
    $nombreCompleto=  $datosGenerales[0]['primerNombre'].' '.$datosGenerales[0]['segundoNombre'].' '.$datosGenerales[0]['primerApellido'].' '.$datosGenerales[0]['segundoApellido'];
    $nombreCompleto=capitalizarPalabras($nombreCompleto);

    if(!$historial){
        $fecha='-';
    }else{
        $fecha=formatearFecha($historial[0]['ingreso']);
    }

    if(!$historialDetalle){
        $cargo='-';
    }else{
        $cargo=$historialDetalle[0]['nombrePuesto'];
    }

    $documentos = array(
        "Contrato laboral y acuerdo de confidencialidad",
        "Fotografía tamaño carnet",
        "Solicitud de empleo",
        "Croquis domicilio",
        "Cuenta bancaria y carta de autorización",
        "Copia de DNI",
        "Copia de licencia - Fecha de Vencimiento: _____________________",
        "Correo de oferta laboral y aceptación",
        "Antecedentes Penales",
        "Antecedentes Policiales",
        "Tarjeta de salud (tipo de sangre)",
        "Carnet de vacuna COVID-19",
        "Formato de evaluación de candidatos",
        "Política de ética",
        "Política de uso de vehículo e incidencia",
        "Currículum Vitae",
        "Copia de título",
        "Referencia Personal"
    );

    $informacionEmpleado = array(
        "e.idEmpleado",
        "DNI",
        "primerNombre",
        "segundoNombre",
        "primerApellido",
        "segundoApellido",
        "telefono",
        "fechaNacimiento",
        "lugarNacimiento",
        "nacionalidad",
        "estadoCivil",
        "descripcion as descEstadoCivil",
        "genero",
        "email",
        "cuentaBancaria",
        "vencimientoLicencia",
        "vencimientoLicenciaMoto",
        "vencimientoPasaporte",
        "direccion",
        "zona",
        "latitud",
        "longitud",
        "foto",
        "dniFront",
        "dniBack",
        "cv",
        "pasaporte",
        "licenciaCarroFront",
        "licenciaCarroBack",
        "licenciaMotoFront",
        "licenciaMotoBack",
        "penales",
        "policiales"
    );
    
    
    
    $pdf->AddPage();

    
    $fila=33;

    $pdf->Ln(); 
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(18,$fila);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'FUNDACIÓN COHONDUCAFE' ),0, 0, 'C', 1);
    $pdf->Ln(); 
    $fila+=6;
    $pdf->SetFont('Arial','B',12);
	$pdf->SetXY(18,$fila);
	$pdf->Cell(175, 7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'CHECK-LIST' ),0, 0, 'C', 1);
    $fila+=10;

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(30,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Nombre del Colaborador' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(95,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$nombreCompleto ), 1, 0, 'l', 1);
    $fila+=6;

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(30,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Cargo' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(95,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$cargo), 1, 0, 'l', 1);
    $fila+=6;

    $pdf->Ln(); 
    $pdf->SetFillColor(209, 209, 209);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(30,$fila);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Fecha de Ingreso' ), 1, 0, 'C', 1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(95,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fecha ), 1, 0, 'l', 1);
    $fila+=10;

    foreach ($documentos as $documento) {
        
        $pdf->Ln(); 
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(40,$fila);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'' ), 1, 0, 'C', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(160,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '   '.$documento ), 'L', 0, 'l', 1);
        $fila+=8;
    }

        $fila+=2;
        $pdf->Ln(); 
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(40,$fila);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,5, iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Comentarios' ), 0, 0, 'C', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(105,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '' ), 'B', 0, 'C', 1);
        $fila+=6;
        $pdf->SetXY(42,$fila);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(128,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '' ), 'B', 0, 'C', 1);
       

        $fila+=30;
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(30,$fila);
        $pdf->Cell(80, 5,iconv("UTF-8", "ISO-8859-1//TRANSLIT","Revisado por"),0, 0, 'C', 1);
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(133,$fila);
        $pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Aprobado por'),0, 0, 'C', 1);
        $fila+=5;
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(30,$fila);
        $pdf->Cell(80, 5,iconv("UTF-8", "ISO-8859-1//TRANSLIT","Sania Alvarenga"),0, 0, 'C', 1);
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(133,$fila);
        $pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Hugo Ávila'),0, 0, 'C', 1);
      
        $fila+=5;
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(30,$fila);
        $pdf->Cell(80, 5,iconv("UTF-8", "ISO-8859-1//TRANSLIT","Contador"),0, 0, 'C', 1);
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(133,$fila);
        $pdf->MultiCell(180,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'Director de Proyecto'),0, 0, 'C', 1);
      


 
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
