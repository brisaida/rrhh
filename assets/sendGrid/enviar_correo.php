<?php

require 'autoload.php'; 

function enviarCorreo($de, $nombreDe, $para, $nombrePara, $asunto, $mensaje) {
    $sendgridApiKey = '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'; 

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($de, $nombreDe);
    $email->setSubject($asunto);
    $email->addTo($para, $nombrePara);
    $email->addContent("text/plain", $mensaje);
    $email->addContent("text/html", $mensaje);

    $sendgrid = new \SendGrid($sendgridApiKey);

    try {
        $response = $sendgrid->send($email);
        if ($response->statusCode() == 202) {
            return "El correo se envió con éxito.";
        } else {
            return "Hubo un error al enviar el correo: " . $response->body();
        }
    } catch (Exception $e) {
        return "Hubo un error al enviar el correo: " . $e->getMessage();
    }
}

// Ejemplo de uso:
$de = "rrhh@honducafeproyectos.com";
$nombreDe = "Recursos Humanos";
$para = "blopez@honducafeproyectos.com";
$nombrePara = "";
$asunto = "Asunto del correo";
$mensaje = "ESTA VIVO!";

$resultado = enviarCorreo($de, $nombreDe, $para, $nombrePara, $asunto, $mensaje);
echo $resultado;

?>
