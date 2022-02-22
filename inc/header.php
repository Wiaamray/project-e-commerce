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
</head>
<body>

<?php require_once 'init.php';

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= SITE; ?>">DeliveryFood</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= SITE; ?>">Accueil

                    </a>
                </li>
                <?php if (admin()):

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE . 'admin/ajoutProduit.php'; ?>">Ajout produit</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Toutes les offres</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Promotions</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= SITE . 'front/fullCart.php'; ?>">
                        <button type="button" class="rounded btn btn-outline-warning position-relative p-2 ">
                            <i class="fa-solid fa-cart-arrow-down fa-2xl "></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
    <?=  getQuantity() ; ?>+

  </span>
                        </button>
                    </a>
                </li>
            </ul>
            
            <?php if (!connect()):
                ?>
                <div class="text-center flex ">
                    <a href="<?= SITE . 'security/login.php'; ?>" class="btn btn-secondary">Se connecter</a>
                    <a href="<?= SITE . 'security/register.php'; ?>" class="btn btn-primary ">S'inscrire</a>
                </div>
           

     <!--Main Navigation-->
     <header>


            <!-- Links -->

            <!-- Social Icon  -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-facebook fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-twitter fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-instagram fa-2x"></i></a>
                </li>
            </ul>
        </div>
   
    </div>

</nav>


<div id="header" class="view">
                </div>



</header>

<!-- Fin de header-->


 <!--A propos section-->

 <main class="mt-5">
<div class="container">

    
    <section id="best-features" class="text-center">

        
        <h2 class="mb-5 font-weight-bold">DeliveryFood</h2>

        <!--Grid row-->
        <div class="row d-flex justify-content-center mb-4">

            <!--Grid column-->
            <div class="col-md-8">

                <!-- Description -->
                <p class="grey-text">
                            Notre compagne à pour objectif <br/>la livraison à domicile des repas frais et  équilibrés.
                             Est parfaite pour ceux qui fuient les produits industriels.<br/>
                             On prend on considération la tendance écologique afin d’éviter le gaspillage alimentaire et protéger la planéte. </p>

            </div>

                         <!--A propos section Fin-->


<!--Section Card-->

<div class="row justify-content-around">
    <H1> Les Menus </H1>

    <div class="card my-2" style="width: 18rem;">
        <img src="upload/M3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Toaste Avocat</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>16€ </span>
      
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
        
      </div>

      <div class="card my-2" style="width: 18rem;">
        <img src="upload/M4.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Aubergine Farcie</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>13 € </span>
          
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
      </div>

      <div class="card my-2" style="width: 18rem;">
        <img src="upload/M5.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bowl Salade</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>16 € </span>
         
          
        
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
      </div>

      <div class="card my-2" style="width: 18rem;">
        <img src=upload/M2.png class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bowl Légumes</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>16 € </span>
         
          
        
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
      </div>

      <div class="card my-2" style="width: 18rem;">
        <img src="upload/M3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Toaste Avocat</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>16 € </span>
         
          
        
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
      </div>


      <div class="card my-2" style="width: 18rem;">
        <img src="upload/M6.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Salade Fraiche</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class="star mt-3 align-items-center">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
          <div class="cost mt-3 text-dark">
            <span>16 € </span>
         
          
        
    </div>
          <a href="#" class="btn btn-primary">Ajouter à la carte</a>
        </div>
      </div>



     




  

  

   

</div>

<!--Fin section card-->


<?php else: ?>
                <div class="text-center ">
                    <a href="<?= SITE . '?unset=1'; ?>" class="btn btn-primary mt-1"><i
                                class="fa-solid fa-power-off"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])):
        foreach ($_SESSION['messages'] as $type => $mess):
            foreach ($mess as $key => $message):
                ?>

                <div class="alert alert-<?= $type; ?> text-center">
                    <p><?= $message; ?></p>
                </div>
                <?php unset($_SESSION['messages'][$type][$key]); ?>
            <?php endforeach; endforeach; endif; ?>



