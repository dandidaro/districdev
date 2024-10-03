<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /* Exception class. */
    require '../assets/vendor/PHPMailer/src/Exception.php';

    /* The main PHPMailer class. */
    require '../assets/vendor/PHPMailer/src/PHPMailer.php';

    /* SMTP class, needed if you want to use SMTP. */
    require '../assets/vendor/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    $senderEmail = 'info@distric.studio';
    $senderPass = 'Gwyndolin69!';

    $clientName = $_POST['name'];
    $clientEmail = $_POST['email'];
    $clientPhone = $_POST['phone'];
    $clientSubject = $_POST['subject'];
    $clientText = $_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = $senderEmail;
        $mail->Password = $senderPass;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Sender and recipient settings
        $mail->setFrom('dandidaro@gmail.com', 'no-reply distric');
        $mail->addReplyTo($clientEmail, $clientName);
        $mail->addAddress('business@distric.studio', 'Distric Studio - Business');
        
        // CC and BCC
        // $mail->addCC('cc1@example.com', 'Elena');
        // $mail->addBCC('bcc1@example.com', 'Alex');

        // Email content
        // Set email format to HTML
        // $mail->isHTML(true); 
        $mail->Subject = "New Opportunity from " . $clientName;
        $mail->Body = 'Name: ' . $clientSubject . PHP_EOL .
                      'Email: ' . $clientEmail . PHP_EOL .
                      'Phone Number: ' . $clientPhone . PHP_EOL .
                      'Subject/Project: ' . $clientSubject . PHP_EOL .
                      'Message: ' . $clientText;

        if(!$mail->send()) {
            // echo 'Message could not be sent.';
            header("Location: ../contact/failed.html");
        } else {
            // echo 'Message has been sent';
            header("Location: ../contact/success.html");
        }
    } catch (Exception $e) {
        header("Location: ../contact/failed.html");
    }

?>