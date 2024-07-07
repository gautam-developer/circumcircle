<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

/* Exception class. */
// require 'C:\vikas\www\rubiktek\PHPMailer\src\Exception.php';

// /* The main PHPMailer class. */
// require 'C:\vikas\www\rubiktek\PHPMailer\src\PHPMailer.php';

// /* SMTP class, needed if you want to use SMTP. */
// require 'C:\vikas\www\rubiktek\PHPMailer\src\SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];


    // SMTP configuration
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'test@testt.com'; // Your SMTP username
        $mail->Password = 'your_email_password'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 25; // TCP port to connect to

        // Recipients
        $mail->setFrom('test@testt.com', 'Mailer');
        $mail->addAddress('test@testt.com', 'Recipient Name'); // Add a recipient



        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong> $message</p>
        ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request method';
}
?>
