<?php
    include '../../../reportes/pdf/plantilla.php';
    include_once '../../../../config/Connection.php';
    include_once '../../models/asistenciaTecnica.php';
    include_once '../../models/participantes.php';

    

   
    // Creamos el objeto
    $pdf = new PDF();

   

    # caputa e instanciamientos
    $asistencias = new mdlAsistenciaTecnica();
    $participantes =  new mdlParticipante();

    $idCapacitacion = isset($_GET['idC']) ? $_GET['idC'] : null;
    $idAsistencia   = isset($_GET['idA']) ? $_GET['idA'] : null;

    $laAsistencia = $asistencias->obtenerRegistro($idAsistencia);
    $asistenciaTecnica = $asistencias->obtenerDetalle($idCapacitacion);
    $losParticipantes = $participantes->listarRegistros($idAsistencia);

     // Adicionamos una página en blanco
     $pdf->AddPage();

    // Contenido del documento (Título)
    $pdf->Ln(4);
    $pdf->SetXY(75,30);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(100,10,utf8_decode('Control de asistencias técnicas'));


    $pdf->Ln();
    $pdf->Line(10, 50, 210-10,50);
    $pdf->SetXY(10,40);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,utf8_decode('Datos generales'),0,0,'L');

    #línea divisora
    $pdf->SetLineWidth(0.5);
    $pdf->SetDrawColor(150,152,154);




    // Contenido del documento (Cuerpo)
    $pdf->Ln(12);
    $pdf->SetXY(10,50);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,utf8_decode('Fecha:'),0,0,'L');

    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(38,50);
    $pdf->Cell(100,10,utf8_decode($laAsistencia[0]['fecha']));


    $pdf->SetXY(10,58);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Ubicación:'));

    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->SetXY(38,58);
    $pdf->Cell(50,10,utf8_decode('Departamento:'));
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(68,58);
            $pdf->Cell(50,10,utf8_decode($laAsistencia[0]['nombreDepartamento']));
            $valorX =$pdf->getX();

    $pdf->SetFont('Arial','I',12);
    $pdf->SetXY($valorX+5,58);
    $pdf->Cell(15,10,utf8_decode('Municipio:'));
                    $valorX2 =$pdf->getX();
                    $pdf->SetFont('Arial','',12);
                    $pdf->SetXY($valorX2+5,58);
                    $pdf->Cell(100,10,utf8_decode($laAsistencia[0]['nombreMunicipio']));
                    

    $pdf->SetXY(10,66);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Dirección:'));

    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(38,66);
    $pdf->Cell(100,10,utf8_decode($laAsistencia[0]['direccion']));

    $pdf->SetXY(10,74);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Técnico responsable:'));

    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(55,74);
    $pdf->Cell(100,10,utf8_decode($laAsistencia[0]['nombreTecnico']));


    $pdf->SetXY(10,84);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Motivo:'));

    $pdf->SetXY(38,84);
    $pdf->SetFont('Arial','',12);    
    $pdf->Multicell(163,7,utf8_decode($asistenciaTecnica[0]['motivoAsistencia']));

    # obtnemos el valor de la posición final de y para continuar con la escritura
    $valorY = $pdf->getY() +2;
    $pdf->Line(10, $valorY, 210-10,$valorY);
    $pdf->Ln();

    $pdf->SetXY(10,$valorY+5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Hallazgos:'));

    $pdf->SetXY(38,$valorY+6);
    $pdf->SetFont('Arial','',12);    
    $pdf->Multicell(163,7,utf8_decode($asistenciaTecnica[0]['hallazgos']));

    $valorY = $pdf->getY();


    $pdf->SetXY(10,$valorY+5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Recomendación:'));

    $pdf->SetXY(48,$valorY+6);
    $pdf->SetFont('Arial','',12);    
    $pdf->Multicell(150,7,utf8_decode($asistenciaTecnica[0]['recomendaciones']));

    $valorY = $pdf->getY();


    $pdf->SetXY(10,$valorY+5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Observación:'));

    $pdf->SetXY(38,$valorY+6);
    $pdf->SetFont('Arial','',12);    
    $pdf->Multicell(163,7,utf8_decode($asistenciaTecnica[0]['observaciones']));

    $valorY = $pdf->getY();
    


    $pdf->SetXY(10,$valorY);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,utf8_decode('Participantes'),0,0,'L');
    

    $pdf->SetXY(10,$valorY+6);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Mujeres :'));

    $pdf->SetXY(30,$valorY+6);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,number_format($laAsistencia[0]['totalMujeres'],0));


    $pdf->SetXY(80,$valorY+6);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Hombres :'));

    $pdf->SetXY(105,$valorY+6);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,number_format($laAsistencia[0]['totalHombre'],0));

    $pdf->SetXY(140,$valorY+6);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,utf8_decode('Total participantes :'));

    $pdf->SetXY(185,$valorY+6);
    $pdf->SetFont('Arial','',12);
    $totalParticipante = intval($laAsistencia[0]['totalMujeres']) + intval($laAsistencia[0]['totalHombre']);
    $pdf->Cell(100,10,number_format($totalParticipante,0));


    #Impresión de la tabla de participantes
    # verificamos si hay participantes para imprimir
    if(count($losParticipantes)>0){
        $pdf->SetTextColor(255); 
        $pdf->SetFillColor(1,64,109); 
        $pdf->SetXY(10,$valorY+30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 8, utf8_decode('N°'), 1, 0, 'C', 1);
        $pdf->Cell(40, 8, utf8_decode('Identidad'), 1, 0, 'C', 1);
        $pdf->Cell(100, 8, utf8_decode('Nombre'), 1, 0, 'C', 1);
        $pdf->Cell(40, 8, utf8_decode('Télefono'), 1, 0, 'C', 1);
        
        $pdf->Ln();
        $pdf->SetFillColor(255,255,255); 
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',12);
        $i=1;

        foreach ($losParticipantes as $participante) {
            $pdf->Cell(10, 8, utf8_decode($i), 1, 0, 'C', 1);
            $pdf->Cell(40, 8,utf8_decode($participante['identidad']),1, 0, 'C', 1);
            $pdf->Cell(100,8,utf8_decode($participante['nombre']),1, 0, 'L', 1);
            $pdf->Cell(40,8,utf8_decode($participante['telefono']),1, 0, 'C', 1);
            $i =$i+1;
            $pdf->Ln();
        }
    
    }
    
  
    



    
    
     

    $pdf->Output('capacitacion.pdf','I');
?>