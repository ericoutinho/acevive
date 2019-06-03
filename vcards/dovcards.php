<?php

    use JeroenDesloovere\VCard\VCard;
    require("vendor/autoload.php");


    if (isset($_GET['v'])) {
        $v = filter_input(INPUT_GET, 'v');
        $persons = json_decode(file_get_contents("vcards.json"), 1);

        if (isset($persons[$v])) {

             // define vcard
            $vcard = new VCard();

            // define variables
            $lastname = $persons[$v]['last_name'];
            $firstname = $persons[$v]['first_name'];
            $additional = '';
            $prefix = '';
            $suffix = '';

            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

            // add work data
            $vcard->addCompany($persons[$v]['company']);
            $vcard->addJobtitle($persons[$v]['title']);
            //$vcard->addRole('Data Protection Officer');
            $vcard->addEmail($persons[$v]['email']);
            $vcard->addPhoneNumber($persons[$v]['mobile'], 'PREF;celular');
            $vcard->addPhoneNumber($persons[$v]['phone'], 'comercial');
            $vcard->addAddress(null, null, $persons[$v]['address'], $persons[$v]['city'], $persons[$v]['state'], $persons[$v]['postal_code'], $persons[$v]['country']);
            $vcard->addLabel("{$persons[$v]['address']}, {$persons[$v]['city']} / $persons[$v]['state'] - {$persons[$v]['country']} - {$persons[$v]['postal_code']}");
            $vcard->addURL($persons[$v]['website']);

            //$vcard->addPhoto(__DIR__ . '/landscape.jpeg');

            // return vcard as a string
            //return $vcard->getOutput();

            // return vcard as a download
            return $vcard->download();

            // save vcard on disk
            //$vcard->setSavePath('/path/to/directory');
            //$vcard->save();

        }
    }






    // header('Content-Type: text/x-vcard');
