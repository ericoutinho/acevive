<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST)){
        $mail_sender    = filter_input(INPUT_POST, 'mail_sender');
        $name_sender    = filter_input(INPUT_POST, 'name_sender');
        $phone_sender   = filter_input(INPUT_POST, 'phone_sender');
        $to             = 'feedback@acevive.com';
        $subject        = "[FEEDBACK] " . filter_input(INPUT_POST, 'subject');
        $message        = filter_input(INPUT_POST, 'message');
        $sender         = $name_sender . "<{$mail_sender}>";
        $headers = "De:". "site@acevive.com";

        $time = date("d/m/Y h:i:s");

        $message = "Mensagem enviada por: {$sender}<br>\n
                    Telefone: {$phone_sender}<br>\n
                    E-mail: {$mail_sender}
                    Em: {$time}<br\n
                    <hr>
                    Mensagem:<br>\n
                    {$message}<br>\n
                    <hr>
                    Esta mensagem foi gerada automaticamente pelo site acevive.com";

        // envio para acevive
        mail($to, $subject, $message, $headers);
        
        // envio para usuário
        $message = "Olá {$name_sender}, <br>\n
                    Recebemos sua mensagem e em breve retornaremos com sua solicitação.<br>\n
                    Agradecemos o seu contato. <br>\n
                    Equipe ACEVIVE<br>\n
                    <br>\n
                    Esta mensagem foi gerada automaticamente pelo site <a href='https://acevive.com'>https://acevive.com</a>";
        $subject = "Resposta automática do site acevive.com";
        $headers = "De:" . $mail_sender;
        $to      = $mail_sender;

        mail($to, $subject, $message, $header);

        echo "A mensagem de e-mail foi enviada.";

    } else {
        return false;
    }

?>