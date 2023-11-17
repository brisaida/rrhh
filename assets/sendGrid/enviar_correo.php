<?php

require 'autoload.php'; 

function enviarCorreo($de, $nombreDe, $para, $nombrePara, $asunto,$nombreEmpleado,$motivo,$fechaDesde,$fechaHasta,$fechaSolicitud,$dias) {
   

    $mensaje='  <h3><strong style="text-align:center">Solicitud de permiso</strong></h3>
                <p>Los detalles de la solicitud son los siguientes:</p>
                <ul>
                <li><strong>Empleado: </strong>'.$nombreEmpleado.'. </li>
                <li><strong>Tipo de Permiso: </strong>'.$motivo.'</li>
                <li><strong>Cantidad de Días Solicitados: </strong>'.$dias.' días</li><br>
                <li><strong>Fecha de Inicio de Vacaciones: </strong>'.$fechaDesde.'</li>
                <li><strong>Fecha de Retorno Estimada: </strong>'.$fechaHasta.'</li>
                <li><strong>Fecha de Solicitud: </strong>'.$fechaSolicitud.'</li>
                </ul>
                Esta solicitud se ha generado de acuerdo con las políticas y procedimientos internos de la empresa. <br>
                <p>No se requiere ninguna acción adicional por parte del empleado hasta recibir una confirmación o instrucciones adicionales.<br><br>
                
               ';

    $sendgridApiKey = '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'; 

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($de, $nombreDe);
    $email->setSubject($asunto);
    $email->addTo($para, $nombrePara);
    //$email->addContent("text/plain", $mensaje);
    $email->addContent("text/html", $mensaje);

    $sendgrid = new \SendGrid($sendgridApiKey);

    try {
        $response = $sendgrid->send($email);
        if ($response->statusCode() == 202) {
            return true;
        } 
    } catch (Exception $e) {
        return  $e->getMessage();
    }
}


?>
