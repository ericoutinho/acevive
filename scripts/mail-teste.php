<?php

    $email      = "contato@acevive.com";
    $subject    = "teste de envio";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$email}" . "\r\n";

    if ( mail($email, $subject, "Teste de envio", $headers) ) {
        echo "Enviou!";
    } else {
        echo "Não enviou!";
    }