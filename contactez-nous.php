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
    <!-- liens css dont le chemin est dans l'url racine -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/contact.css">

</head>

<body>

    <?php require_once 'inc/init.php';

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
        
        <a class="navbar-brand" href="<?= SITE; ?>">
            <div class="logo">
                <h2>Panier Vert</h2>
            </div>
            </a>
            <!-- <p>des plats sains toute l'année</p> -->
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

        <div class="container">
            <div class="contact-form-group">
                <div class="contact-info">
                    <h3 class="title">Contactez-nous</h3>
                    <!-- <p class="text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                        dolorum adipisci recusandae praesentium dicta!
                    </p> -->

                    <div class="info">
                        <div class="information">
                            <i class="fas fa-address-card" class="icon"></i>
                            <p>6 rue de l'invention 75007 Paris</p>
                        </div>
                        <div class="information">
                            <i class="fa fa-envelope" aria-hidden="true" class="icon"></i>
                            <p>DeliveryFood@gmail.com</p>
                        </div>
                        <div class="information">
                            <i class="fa-solid fa-phone" class="icon"></i>
                            <p>55-55-55-55</p>
                        </div>
                    </div>
                </div>


                <div class="contact-form">


                    <form action="contact.php" method="post" enctype="multipart/form-data">
                        <h3 class="title"></h3>
                        <div class="input-container">
                            <input type="text" name="nom" id="name" class="contact-input" placeholder="Votre Nom" />
                            <label for="nom"></label>

                        </div>
                        <div class="input-container">
                            <input type="email" name="email" id="email" class="contact-input" placeholder="Votre Email" />
                            <label for="email"></label>

                        </div>
                        <div class="input-container">
                            <input type="text" name="sujet" id="sujet" class="contact-input" placeholder=" Sujet de votre message" />
                            <label for="sujet"></label>

                        </div>
                        <div class="input-container textarea">
                            <textarea name="message" id="message" class="contact-input" placeholder="Ecrire un message"></textarea>
                            <label for="message"></label>

                        </div>
                        <input type="submit" name="submit" value="Envoyer" class="contact-btn" />
                    </form>
                </div>
            </div>
        </div>
</body>

</html>