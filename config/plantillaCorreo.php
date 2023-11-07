<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './assets/PHPMailer/src/Exception.php';
require './assets/PHPMailer/src/PHPMailer.php';
require './assets/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Configuración del servidor
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.office365.com'; // Servidor SMTP de Microsoft
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'blopez@honducafeproyectos.com'; // Tu dirección de correo
    $mail->Password   = 'Lup93130'; // Tu contraseña de correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587; // Puerto para TLS/STARTTLS
                                    

    //Destinatarios
    $mail->setFrom('blopez@honducafeproyectos.com', 'Tu Nombre'); // Tu correo y nombre
    $mail->addAddress('brisaida.06@gmail.com', 'Brisaida'); // Dirección de correo y nombre del destinatario

    //Contenido
    $mail->isHTML(true);                                  
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = 'Este es el cuerpo del mensaje en <b>HTML</b>';
    $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano';

    $mail->send();
    echo 'Mensaje enviado con éxito.';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de PHPMailer: {$mail->ErrorInfo}";
}

?>
