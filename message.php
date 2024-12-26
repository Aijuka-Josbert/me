<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if(!empty($email) && !empty($message)) { // Check if email and message are not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validate email
        $receiver = "josbertaijuka15@gmail.com";
        $subject = "Form: $name <$email>"; // Subject of email
        $body = "Name: $name\nEmail: $email\nMessage: $message"; // Email body
        $sender = "From: $email"; // Sender email
        if(mail($receiver, $subject, $body, $sender)) {
            echo "Your message has been sent.";
        } else {
            echo "Sorry, failed to send your message.";
        }
    } else {
        echo "Enter a valid email address!";
    }
} else {
    echo "Email and message fields are required.";
}
?>