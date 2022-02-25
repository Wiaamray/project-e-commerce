<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet e-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css"
          integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,900;1,800&family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet"> 
    
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
        
    <a class="navbar-brand" href="<?= SITE ; ?>">
        <div class="logo">
            <h2>Panier Vert</h2>
        </div>
        </a>
    </div>


<!-- .TOP-NAVIGATION -->

<nav class="top-navigation container-fluid mb-5">

        <ul class="navbar-nav d-flex flex-row justify-content-end align-items-baseline me-auto">

            <?php if (!admin() && !connect()) { ?>
                    <li class=""><a href="<?= SITE . 'security/login.php#login-card'; ?>" class="connection nav-link" >connection</a></li>
                <?php } else { ?>
                    <li><a href="<?= SITE; ?>?unset=1" class="deconnection nav-link"><i class="fa-solid fa-power-off fa-2x"></i></a>
                <?php } ?>


            <li class="">
                <a href="<?= SITE . 'front/fullCart.php'; ?>" class="basket nav-link" >
                    <button type="button" class="btn position-relative p-2">
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

                <li class="">
                    <a class="nav-link active" href="<?= SITE; ?>">Accueil</a>
                </li>
                <li class="">
                    <a class="nav-link" href="<?= SITE; ?>#">Les menus</a>
                </li>
                <li class="">
                    <a class="nav-link" href="<?= SITE; ?>#cartes">Les plats</a>
                </li>
                <li class="">
                    <a class="nav-link" href="<?= SITE; ?>#apropos">A propos</a>
                </li>
                <li class="">
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


