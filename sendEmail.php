<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



class SendEmail
{

    function sendemail($email, $code)
    {

        require 'PHPMailer/Exception.php';

        require 'PHPMailer/PHPMailer.php';

        require 'PHPMailer/SMTP.php';


        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';
            $mail->isHTML = (true);


            $mail->Username = 'adityakumarsingh95093@gmail.com';
            $mail->Password = 'yntc qtwj swag vcum';
            $mail->setFrom('adityakumarsingh95093@gmail.com', "Aditya Singh");
            $mail->addAddress($email);

            //$mail->addReplyTo('adityakumarsingh@gmail.com', "Aditya Singh");

            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $mail->Subject = 'Email Verification';



            $mail->Body = "Thanks for registration!
            Click this button to verify your account 
            <a href=http://localhost/Loginsystem/verify.php?email=$email&code=$code>Verify</a>";
            $mail->send();
            echo "message has been sent";

        } catch (Exception $e) {
            echo 'message could not be sent. Mailer Error:', $mail->ErrorInfo;
        }
    }

}


function sendPasswordResetEmail($reset_email, $reset_link)
{
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->isHTML(true);

        $mail->Username = 'adityakumarsingh95093@gmail.com';
        $mail->Password = 'yntc qtwj swag vcum';
        $mail->setFrom('adityakumarsingh95093@gmail.com', 'Aditya Singh');
        $mail->addAddress($reset_email);

        $mail->Subject = 'Password Reset';
        $mail->Body = "Click the following link to reset your password: $reset_link";

        $mail->send();
        echo "<div class='alert alert-success'>Password reset link has been sent to your email.</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Email sending failed: {$mail->ErrorInfo}</div>";
    }
}

?>