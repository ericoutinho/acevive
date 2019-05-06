<?php

        $email_envio    = "site@acevive.com";

        if (isset($_POST)) {

            $nome       = filter_input(INPUT_POST, "nome");
            $email      = filter_input(INPUT_POST, "email");
            $telefone   = filter_input(INPUT_POST, "telefone");
            $mensagem   = filter_input(INPUT_POST, "mensagem");
            $agora      = date("d/m/Y h:i:s");

            // Email para a empresa

            $destino_emp    = "email_da_empresa <email_da_empresa@acevive.com>";
            $assunto_emp    = "Mensagem de {$nome} <$email>";
            $msg_emp        = "<html>
                                <head>
                                <title>[acevive.com] Envio automático do site acevive.com</title>
                                </head>
                                <body>
                                    <p>Esta é uma mensagem automatizada enviada pelo site <a href='https://acevive.com' target='_blank'>https://acevive.com</a> em {$agora}.</p>\n
                                    <hr/>
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Nome:</span> {$nome}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Email:</span> {$email}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Telefone:</span> {$telefone}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Mensagem:</span></br>\n
                                    {$mensagem}</p>\n
                                </body>
                                </html>";

            // Email para o cliente
            $destino_cli        = "{$nome} <{$email}>";
            $assunto_cli        = "[acevive.com] Envio automático do site acevive.com";
            $msg_cli            = "<html>
                                <head>
                                <title>[acevive.com] Envio automático do site acevive.com</title>
                                </head>
                                <body>
                                    <p style='font-size=1.2em; font-weight: bold;'>Olá, {$nome},</p>\n
                                    <p>Esta é uma mensagem automatizada enviada pelo site <a href='https://acevive.com' target='_blank'>https://acevive.com</a>
                                    em resposta a sua solicitação enviada em {$agora}, conforme a seguir:</p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Nome:</span> {$nome}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Email:</span> {$email}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Telefone:</span> {$telefone}<p>\n
                                    <p><span style='display: inline-block; font-weight: bold; width: 120px; margin-right: 10px;'>Mensagem:</span></br>\n
                                    {$mensagem}</p>\n
                                    <hr/>
                                    <p>Em breve retornaremos com resposta à sua solicitação.<br/>\n
                                    Agradeçemos o seu contato.<br/>\n
                                    Equipe da ACEVIVE</p>\n
                                    <p>+55 27 8888.8888<br/>\n
                                    <a href='mailto:contato@acevive.com'>contato@acevive.com</a></p>
                                </body>
                                </html>";

            $headers_emp     = "MIME-Version: 1.0" . "\r\n";
            $headers_emp    .= "Content-type:text/html; charset=UTF-8" . "\r\n";
            $headers_emp    .= "From: {$email_envio}" . "\r\n";

            // Envio empresa
            if ( mail($destino_emp, $assunto_emp, $msg_emp, $headers_emp) ) {
                echo "Enviado com sucesso"; 
            } else {
                echo "Falhou";
            }

        }