<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize user inputs to prevent XSS attacks
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $messageText = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();                                      
        $mail->CharSet = 'UTF-8';                            
        $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'ssaaiiffjjaammaall@gmail.com';    
        $mail->Password = 'llgz pmgh wflx nycj';             
        $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                   // TCP port to connect to

        // Email content settings
        $mail->setFrom($email, $name);                        
        $mail->addAddress('ssaaiiffjjaammaall@gmail.com');    
        $mail->Subject = "New message from your website";    
        $mail->Body    = "Name: $name\nEmail: $email\nMessage:\n$messageText"; // 

        // Send the email
        $mail->send();

        // Success message for the user
        echo "  Your message has been sent successfully, thank you $name!";
    } catch (Exception $e) {
        // Error message if the email fails to send
        echo "  Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Handle invalid request methods (not POST)
    echo "  Invalid request method. Please submit the form.";
}
