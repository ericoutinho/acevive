<?php

    if (isset($_GET['s'])) {
        $s = filter_input(INPUT_GET, 's');
        $data = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/vcards/vcards.json"), 1);
        if (isset($data[$s])) {
        // HTML --------------------------->
        ?>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Assinatura</title>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap" rel="stylesheet">
        </head>
        <body style="font-family: 'Open Sans', Arial, Tahoma, sans-serif;font-weight: 400;font-size: 15px;color: #2e3131;">
            <div class="sign-content" style="margin: 0;width: 100%;display:block;">
                <div class="sign-row" style="margin: 0;">
                    <div class="sign-brand" style="margin: 0;display: inline-block;max-width:100px;width:25%;min-height: 200px;text-align: center;">
                        <img src="assets/logo-acevive.png" style="width: 100%;height: auto;">
                    </div>
                    <div class="sign-data" style="margin: 0;padding-left: 20px;display: inline-block;vertical-align: top;max-width:70%;">
                        <h3 class="name" style="margin: 0;padding: 0;font-family: 'Open Sans', Arial, Tahoma, sans-serif"><?= $data[$s]['first_name'] . ' ' . $data[$s]['last_name'] ?></h3>
                        <p class="title" style="color:#6c7a89;font-family: 'Open Sans', Arial, Tahoma, sans-serif;margin: 0;padding: 0;font-style: italic;font-size: 0.8em;margin-bottom: 10px;"><?= $data[$s]['title'] ?></p>
                        <p class="tel" style="margin: 0;padding: 0;font-family: 'Open Sans', Arial, Tahoma, sans-serif"><a href="tel:<?= $data[$s]['mobile'] ?>" class="link" style="text-decoration: none;font-weight: 700;color: inherit;"><img class="icon" src="assets/icon-whatsapp.png" style="display: inline-block;height: 20px;width: auto;vertical-align: middle;"> <?= $data[$s]['mobile'] ?></a></p>
                        <p class="tel" style="margin: 0;padding: 0;font-family: 'Open Sans', Arial, Tahoma, sans-serif"><a href="tel:<?= $data[$s]['phone'] ?>" class="link" style="text-decoration: none;font-weight: 700;color: inherit;"><img class="icon" src="assets/icon-phone.png" style="display: inline-block;height: 20px;width: auto;vertical-align: middle;"> <?= $data[$s]['phone'] ?></a></p>
                        <p class="address" style="margin: 0;padding: 0;font-size: 0.8em;margin-top: 15px;font-family: 'Open Sans', Arial, Tahoma, sans-serif; color:#6c7a89;"><?= "{$data[$s]['address']}<br>
                        {$data[$s]['city']}/{$data[$s]['state']} - {$data[$s]['country']} - CEP: {$data[$s]['postal_code']}" ?></p>

                        <div class="ms" style="margin: 0;padding: 10px 0;margin-top: 10px;border-top: solid thin #ddd;">
                            <a href="https://www.acevive.com/vcards?v=<?= $_GET['s'] ?>" class="link" target="_blank" title="V-card" style="text-decoration: none;"><img src="assets/icon-vcard.png" class="icon-2x" style="display: inline-block;height: 30px;width: auto;vertical-align: middle;margin-right: 10px;"></a>
                            <a href="https://www.acevive.com" class="link" target="_blank" title="acevive.com" style="text-decoration: none;"><img src="assets/icon-web.png" class="icon-2x" style="display: inline-block;height: 30px;width: auto;vertical-align: middle;margin-right: 10px;"></a>
                            <a href="https://instagram.com/acevive.vix" class="link" target="_blank" title="instagram.com" style="text-decoration: none;"><img src="assets/icon-instagram.png" class="icon-2x" style="display: inline-block;height: 30px;width: auto;vertical-align: middle;margin-right: 10px;"></a>
                            <a href="https://facebook.com/acevive.vix" class="link" target="_blank" title="facebook.com" style="text-decoration: none;"><img src="assets/icon-facebook.png" class="icon-2x" style="display: inline-block;height: 30px;width: auto;vertical-align: middle;margin-right: 10px;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        // FIM DE HTML <--------------------------
        }
    } else {
        echo("Impossível exibir a página.");
    }


?>

