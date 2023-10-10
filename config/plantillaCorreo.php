<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

// Configuración de correo
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'brisaz.hn@gmail.com';
$smtpPassword = 'Brisa1990';
$fromEmail = 'brisaz.hn@gmail.com';
$fromName = 'Brisaz';

// Destinatario
$toEmail = 'brisaida.06@gmail.com';
$toName = 'Brisaida';

// Crea una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = 'tls'; // Puedes cambiar a 'ssl' si prefieres usar el puerto 465
    $mail->Port = 587;

    // Configuración del remitente y destinatario
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail, $toName);

    // Adjuntar un archivo
    $archivoAdjunto = '../assets/images/add-user.png'; // Cambia esto por la ruta a tu archivo
    $mail->addAttachment($archivoAdjunto);

    // Asunto y cuerpo del correo
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body = 'Cuerpo del correo';

    // Envía el correo
    $mail->send();
    echo 'El correo se envió correctamente.';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
