<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {
    //Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'magdal.sen@gmail.com';                     // SMTP username
    $mail->Password   = 'Padre999';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('magdal.sen@gmail.com', 'Magdalena Senger');
    $mail->addAddress($_POST['email'], $_POST['imie']);     // Add a recipient

    $body = '<p><strong>Witam serdecznie</strong>, udało Ci się poprawnie zarejestrować! Twoje dane logowania: Email: '.$_POST['email'].' i Hasło: '.$_POST['haslo'].'</p>';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Witaj, '.$_POST['imie'].' '.$_POST['nazwisko'];

    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Dane logowania wysłano na maila podanego podczas rejestracji.'."<br/>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"."<br/>";
}