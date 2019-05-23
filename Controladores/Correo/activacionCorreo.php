<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

session_start();
// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$codigo = $_SESSION['codAleatorio'];

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;smtp.live.com';         // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hector.naer@gmail.com';                // SMTP username
    $mail->Password   = 'Hector_2807';                           // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    
    //if(strpos($_SESSION['email'],"@gmail"))
        $mail->Port   = 587;                                    // TCP port to connect to
    /*else if(strpos($_SESSION['email'],"@hotmail"))
        $mail->Port   = 465;*/
    //Recipients
    $mail->setFrom('hector.naer@gmail.com', 'Belegui');
    $mail->addAddress($_SESSION['email'], $_SESSION['nombre']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmacion de correo';
    $mail->Body    = "BIENVENIDO!\nPara poder utilizar tu cuenta, pulsa este enlace: http://localhost/activacionCorreo.php?id=$codigo";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    header("Location:/");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}