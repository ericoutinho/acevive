<?php

    if (isset($_GET['v'])) {
        $v = filter_input(INPUT_GET, 'v');
        $json = json_decode(file_get_contents('vcards.json'), 1);


        if (isset($json[$v])) {
        // HTML -------------------------->
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vcard+ - <?= $json[$v]['first_name'] . " " . $json[$v]['last_name'] ?></title>
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.8.2/css/pro.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            background-color:#2e3131;;
        }
        .name{
            line-height: 2.5rem;
            font-weight: 700;
            color:#fff;
        }
    </style>

</head>
<body>
    <header class="pt-4" style="background:#6c7a89;">
        <div class="container rounded-top" style="max-width: 575px; background-color:#67809f;">
            <!-- IMAGE PROFILE -->
            <!-- <div class="row">
                <div class="col text-center pt-3">
                    <img src="../assets/team (1).jpg" alt="profile picture" class="rounded-circle image-fluid w-25">
                </div>
            </div> -->

            <!-- PROFILE NAME -->
            <div class="row">
                <div class="col text-center pt-5 pb-3">
                    <h1 class="name"><?= $json[$v]['first_name'] . " " . $json[$v]['last_name'] ?></h1>
                </div>
            </div>
            <hr class="bg-light">
            <!-- PROFILE BUTTONS -->
            <div class="row">
                <div class="col py-3">
                    <div class="row">

                        <!-- CALL BUTTON -->
                        <div class="col p-2 text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center m-auto bg-warning shadow" style="width:70px; height:70px; background:#dadfe1;">
                                <a href="tel:<?= $json[$v]['mobile']?>" class="stretched-link text-center text-decoration-none text-reset">
                                    <i class="fas fa-phone fa-2x"></i>
                                    <div class="w-100"></div>
                                </a>
                            </div>
                            <small class="text-light">chamada</small>
                        </div>

                        <!-- ADD BUTTON -->
                        <div class="col p-2 text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center m-auto bg-danger shadow" style="width:70px; height:70px; background:#dadfe1;">
                                <a href="dovcards.php?v=<?= $_GET['v'] ?>" class="stretched-link text-center text-decoration-none text-reset">
                                    <i class="fas fa-user-plus fa-2x text-light"></i>
                                </a>
                            </div>
                            <small class="text-light">adicionar</small>
                        </div>

                        <!-- SEND BUTTON -->
                        <div class="col p-2 text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center m-auto bg-warning shadow" style="width:70px; height:70px; background:#dadfe1;">
                                <a href="mailto:<?= $json[$v]['email']?>" class="stretched-link text-center text-decoration-none text-reset">
                                    <i class="fas fa-envelope fa-2x"></i>
                                    <div class="w-100"></div>
                                </a>
                            </div>
                            <small class="text-light">mensagem</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- VCARD INFO -->
    <main>
        <section class="contato">
            <div class="container pt-3" style="max-width: 575px; background-color:#ecf0f1;">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <a href="mailto:<?= $json[$v]['email']?>" class="stretched-link"><?= $json[$v]['email']?></a>
                                    <div class="w-100"></div>
                                    <small class="text-muted">E-mail</small>
                                </div>
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-mobile fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <a href="tel:<?= $json[$v]['mobile']?>" class="stretched-link"><?= $json[$v]['mobile']?></a>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Telefone móvel</small>
                                </div>
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <a href="tel:<?= $json[$v]['phone']?>" class="stretched-link"><?= $json[$v]['phone']?></a>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Telefone fixo</small>
                                </div>
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center"><i class="far fa-building fa-fw fa-lg mr-3"></i></div>
                                <div>
                                    <?= $json[$v]['company']?>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Empresa</small>
                                </div>
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-tie fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <?= $json[$v]['title']?>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Cargo</small>
                                </div>
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-globe fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <a href="http://<?= $json[$v]['website'] ?>" target="_blank" class="stretched-link"><?= $json[$v]['website'] ?></a>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Website</small>
                                </div> 
                            </li>
                            <li class="list-group-item py-3 d-flex bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-map-marker-alt fa-fw fa-lg mr-3"></i>
                                </div>
                                <div>
                                    <a href="<?= $json[$v]['maps_link'] ?>" class="stretched-link" target="_blank"><?= $json[$v]['address'] . ' - ' . $json[$v]['city'] . " - " . $json[$v]['state'] . ' - ' . $json[$v]['country'] . ' - ' . $json[$v]['postal_code'] ?></a>
                                    <div class="w-100"></div>
                                    <small class="text-muted">Endereço</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- SOCIAL MIDIA BUTTONS -->
        <section class="social">
            <div class="container py-5 border-top rounded-bottom" style="max-width: 575px; background-color:#fff;">
                <div class="row">
                    <div class="col-4 text-center py-3">
                        <a href="https://www.facebook.com/<?= $json[$v]['facebook'] ?>" class="text-decoration-none">
                            <i class="fab fa-facebook-square fa-fw fa-3x" style="color:#1f3a93;"></i>
                            <div class="w-100"></div>
                            <small class="text-muted">Facebook</small>
                        </a>
                    </div>
                    <div class="col-4 text-center py-3">
                        <a href="https://www.instagram.com/<?= $json[$v]['instagram'] ?>" target="_blank" class="text-decoration-none">
                            <i class="fab fa-instagram fa-fw fa-3x" style="color:#f62459;"></i>
                            <div class="w-10"></div>
                            <small class="text-muted">Instagram</small>
                        </a>
                    </div>
                    <!-- <div class="col-4 text-center py-3">
                        <a href="https://www.twitter.com/" target="_blank" class="text-decoration-none">
                            <i class="fab fa-twitter fa-fw fa-3x" style="color:#4d13d1;"></i>
                            <div class="w-100"></div>
                            <small class="text-muted">Twitter</small>
                        </a>
                    </div> -->
                </div>
            </div>
        </section>
    </main>
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col text-center text-light">
                    <small>powered by ect</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php
        // END HTML <----------------------
        } else {
            echo "Não foram encontrados registros com os dados fornecidos.";
        }
    }

?>