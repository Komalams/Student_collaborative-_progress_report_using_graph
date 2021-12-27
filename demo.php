<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php

        class Demo {
            public function sendmail($message , $email) {
                require_once './PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer();
                $mail->isSMTP();
                //$mail->SMTPDebug = 2;
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = TRUE;
                $mail->Username = "info.mail.noreply.com@gmail.com";
                $mail->Password = "noreply19";
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('info.mail.noreply.com@gmail.com', 'info');
                $mail->addAddress("$email", '');     // Add a recipient
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->isHTML(true);
                $mail->Subject = "RESULT ANNOUNCEMENT";
                $mail->Body = "$message";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    //echo 'Message has been sent';
                }
            }

        }
        ?>

    </body>
</html>

