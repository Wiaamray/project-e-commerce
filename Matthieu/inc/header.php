<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet e-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Mystery+Quest" rel="stylesheet">

    <?php

    // pour récupérer le chemin et le nom de fichier actuel
    $url = explode('/', $_SERVER['PHP_SELF']);
    $urlFin = array_pop($url);
    if ($urlFin == 'index.php' || $urlFin == 'DetailPlat.php') {
    ?>

        <!-- liens css dont le chemin est dans l'url racine -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">

    <?php } else { ?>

        <!-- liens css dont le chemin est dans un sous-dossier de l'url racine -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">

    <?php } ?>

    <!-- liens css indépendants -->
    <link rel="stylesheet" href="../css/formulaire.css">
    <link rel="stylesheet" href="./css/details.css">
    <link rel="stylesheet" href="./css/contact.css">
</head>

<body>

    <?php require_once 'init.php';

    ?>
    <!-- .SITE-HEADER -->
    <div class="site-header">

        <!-- . SOCIAL-MENU -->
        <div class="social-menu">

            <ul class="navbar-nav nav-flex-icons">
                <li class="">
                    <a class="nav-link" href="#"><i class="fab fa-facebook fa-2x"></i></a>
                </li>
                <li class="">
                    <a class="nav-link" href="#"><i class="fab fa-twitter fa-2x"></i></a>
                </li>
                <li class="">
                    <a class="nav-link" href="#"><i class="fab fa-instagram fa-2x"></i></a>
                </li>
            </ul>

        </div>
        <!-- / .SOCIAL-MENU -->

        <!-- .LOGO-CONTAINER -->
        <div class="logo-container">
            <h2>
                <a class="navbar-brand" href="">Au Bon Goût</a>
            </h2>
            <p>des plats sains toute l'année</p>
        </div>

        <!-- .TOP-NAVIGATION -->

        <!-- <nav class=" navbar navbar-expand-lg navbar-light bg-light mb-5"> -->
        <nav class="top-navigation container-fluid mb-5">

            <ul class="navbar-nav d-flex flex-row justify-content-end align-items-baseline me-auto">

                <?php if (!admin() && !connect()) { ?>
                    <li class=""><a href="<?= './security/login.php'; ?>" class="">connection</a></li>
                <?php } else { ?>
                    <!-- <li><a href="/projet/security/logout.php" class="">déconnection</a></li> -->
                    <li><a href="<?= './'; ?>?unset=1" class=""><i class="fa-solid fa-power-off fa-2x"></i></a>
                    <?php } ?>
                    <li class="">
                        <a class="basket nav-link" href="<?= SITE . 'front/fullCart.php'; ?>">
                            <button type="button" class="btn position-relative p-2 ">
                                <i class="fas fa-shopping-basket fa-2xl"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"></span>
                            </button>
                        </a>
                    </li>

            </ul>

        </nav>
        <!-- / .TOP-NAVIGATION -->


        <!-- .MAIN-NAVIGATION -->
        <nav class="main-navigation navbar navbar-expand-lg mb-5">
            <div class="container-fluid">
                <ul class="navbar-nav d-flex justify-content-center me-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Les menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cartes">Les plats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#apropos">A propos</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="">Mes commandes</a>
                </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE; ?>contactez-nous.php" target="_blank">Contact</a>
                    </li>

                </ul>

            </div>
        </nav> <!-- / .MAIN-NAVIGATION -->


        <!-- .SEARCH-CONTAINER -->
        <div class="search-container">

            <ul class="navbar-nav me-auto">
                <li>
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="text" placeholder="Rechercher">
                        <button class="my-2 my-sm-0" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>

                        </button>
                    </form>
                </li>
            </ul>

        </div>
        <!-- / .SEARCH-CONTAINER -->


    </div>
    <!-- / SITE-HEADER -->