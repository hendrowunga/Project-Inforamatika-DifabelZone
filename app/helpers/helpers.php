<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* SEND EMAIL FUNCTION USING PHPMAILER LIBRARY */

if (
    !function_exists('sendEmail')
) {
    function sendEmail($mailConfig)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        // $mail->Host = env('EMAIL_HOST');
        // $mail->SMTPAuth = true;
        // $mail->Username = env('EMAIL_USERNAME');
        // $mail->Password = env('EMAIL_PASSWORD');
        // $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
        // $mail->Port = env('EMAIL_PORT');
        $mail->Host = getenv('EMAIL_HOST');
        $mail->Username = getenv('EMAIL_USERNAME');
        $mail->Password = getenv('EMAIL_PASSWORD');
        $mail->SMTPSecure = getenv('EMAIL_ENCRYPTION');
        $mail->Port = getenv('EMAIL_PORT');

        $mail->setFrom('difabelzone@gmail.com', 'Difabel Zone');
        $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body = $mailConfig['mail_body'];
        // if ($mail->send()) {
        //     return true;
        // } else {
        //     return false;
        // }
        try {
            if ($mail->send()) {
                return true;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
