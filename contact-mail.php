<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /* Exception class. */
    require './assets/vendor/PHPMailer/src/Exception.php';

    /* The main PHPMailer class. */
    require './assets/vendor/PHPMailer/src/PHPMailer.php';

    /* SMTP class, needed if you want to use SMTP. */
    require './assets/vendor/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    $senderEmail = 'business@distric.studio';
    $senderPass = 'Gwyndolin69!';

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $senderEmail; // Your Mailtrap username
        $mail->Password = $senderPass; // Your Mailtrap password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Sender and recipient settings
        $mail->setFrom('info@mailtrap.io', 'Mailtrap');
        $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
        $mail->addAddress('dandidaro@gmail.com', 'Tim'); // Primary recipient
        
        // CC and BCC
        // $mail->addCC('cc1@example.com', 'Elena');
        // $mail->addBCC('bcc1@example.com', 'Alex');

        // Adding more BCC recipients
        // $mail->addBCC('bcc2@example.com', 'Anna');
        // $mail->addBCC('bcc3@example.com', 'Mark');

        // Email content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "PHPMailer SMTP test";
        $mail->Body = '<h1>Send HTML Email using SMTP in PHP</h1><p>This is a test email I\'m sending using SMTP mail server with PHPMailer.</p>'; // Example HTML body
        $mail->AltBody = 'This is the plain text version of the email content';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>