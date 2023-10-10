<?php 
$para = "brisaida.06@gmail.com";
$asunto = "Asunto del correo";
$mensaje = "Este es el contenido del correo.";

// Cabeceras del correo
$cabeceras = "From: blopez@honducafeproyectos.com" . "\r\n" .
             "Reply-To: blopez@honducafeproyectos.com" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

// Envío del correo
if (mail($para, $asunto, $mensaje, $cabeceras)) {
    echo "Correo enviado con éxito";
} else {
    echo "Error al enviar el correo";
}

?>