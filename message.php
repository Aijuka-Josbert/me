<?php
// include("index.html");
//  echo"this msg is send from php file";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if(!empty($email)&& !empty($message)){//if email en message is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//IF email is invalid
        $receiver = "josbertaijuka15@gmail.com";
        $subject = "Form: $name <$email>";//subject of email
        //merging alll users inside body variable
        $body = "Name: $name \nEmail: $email\nMessage: $message";
        $sender = "From: $email"; //sender email
        if(mail($receiver, $subject,$body,$sender)){
            echo "your message has been send";
        // header("Location: index.html");
        }else{
            echo "sorry, failed to send your message";
        }
    }else{
        echo "Enter a valid email Address!";
    }
}else{
    echo "email and password field is required";
}

;


?>  