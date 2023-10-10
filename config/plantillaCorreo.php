<?php 

// Este $emailusername podria ser el $to
$emailusername= 'blopez@honducafeproyectos.com';
$cc= 'brisaida.06@gmail.com';

 $body = 'Esto es una prueba ';
   // i'm running windows, so i had to update this:
    ini_set("SMTP", "smtp.gmail.com");


 echo sendEmail($emailusername,'brisaz.hn@gmail.com', 'Successful Charge!', $body, true);


   function sendEmail($to, $from, $subject, $body, $isHtml) {
    $message = '<html><body>';
    $message .= $body;
    $message .= '</body></html>';

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    //$headers .= "Cc: \r\n";

    if ($isHtml) {
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    }

    echo mail($to, $subject, $message, $headers);
}
    

// $isHtml se usa cuando incluis HTML en el correo



?>