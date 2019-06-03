<?php

        require("PHPMailer/Exception.php");
        require("PHPMailer/OAuth.php");
        require("PHPMailer/PHPMailer.php");
        require("PHPMailer/SMTP.php");

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\OAuth;

        if (isset($_POST)){

            $nome       = strtoupper(filter_input(INPUT_POST, 'nome'));
            $email      = filter_input(INPUT_POST, 'email');
            $telefone   = filter_input(INPUT_POST, 'telefone');
            $mensagem   = strtoupper(filter_input(INPUT_POST, 'mensagem'));

            $assunto        = "[acevive.com] Mensagem de {$nome} <{$email}>";
            $agora          = date('d/m/Y h:i:s');
            $mensagem       = "<h3>Mensagem enviada automaticamente do site https://www.acevive.com</h3>\n
                               <p>De: {$nome} - {$email}<br>\n
                               <p>Em: {$agora}<br>\n
                               <p>Telefone: {$telefone}</p>\n
                               <hr>\n
                               <p>{$mensagem}</p>\n";
            
            $mail = new PHPMailer();
            
            
            
            $mail->setFrom('website@acevive.com', 'Website ACEVIVE');
            $mail->addAddress('contato@acevive.com', 'ACEVIVE');
            
            $mail->isHTML(true);
            
            $mail->Subject      = $assunto;
            $mail->Body         = nl2br($mensagem);
            $mail->AltBody      = nl2br(strip_tags($mensagem));
            
            if(!$mail->send()) {
                echo "fail";
            } else {
                echo "success";
            }

        } else {
            echo "fail";
        }