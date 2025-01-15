<!-- //Message could not be sent. Mailer Error: SMTP Error: Could not connect to SMTP host. Failed to connect to serverSMTP server error: 
//Failed to connect to server Additional SMTP info: php_network_getaddresses: getaddrinfo for smtp.gmail.com failed: No such host is known. -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';//
            $mail->SMTPAuth = true;
            $mail->Username = 'josbertaijuka15@gmail.com'; // Your Gmail address
            $mail->Password = 'josbert001.';   // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('josbertaijuka15@gmail.com', 'Josbert Aijuka');

            // Content
            $mail->isHTML(true);
            $mail->Subject = "Form: $name <$email>";
            $mail->Body = nl2br("Name: $name\nEmail: $email\nMessage: $message");

            $mail->send();
            echo "Your message has been sent.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Enter a valid email address!";
    }
} else {
    echo "Email and message field is required.";
}
?>
