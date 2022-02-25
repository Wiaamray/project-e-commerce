<?php
require_once './inc/header.php';

// pour la déconnexion (avec le GET que l'on a inséré sur le bouton dans le header)
if (isset($_GET['unset'])) {
  unset($_SESSION['user']);

  // alternative au dysfonctionnement du header
  echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  // header("location:./");
  // exit();
}

// pour le add (avec le GET que l'on a inséré sur le bouton dans detailPlat.php)
if (isset($_GET['add'])) {
  add($_GET['add']);

  // alternative au dysfonctionnement du header
  echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  // header("location:./");
  // exit();
}

// pour le remove (avec le GET que l'on a inséré sur le bouton dans detailPlat.php)
if (isset($_GET['remove'])) {
  remove($_GET['remove']);

  // alternative au dysfonctionnement du header
  echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  // header("location:./");
  // exit();
}

$resultat = executeRequete("SELECT * FROM product WHERE id=:id", array(
  ':id' => $_GET['id']
));

$product = $resultat->fetch(PDO::FETCH_ASSOC);
// fetch à utiliser systématiquement lorsque l'on a un seul jeu de résultat 
// renvoie un tableau array[]


?>



<!-- .MAIN-CONTENT -->
<div class="content-plat main-content container-fluid">

  <!-- .CARD-CONTAINER -->
  <div class="card-container container">

    <!-- .CARD -->
    <div class="card row">

      <!-- .CLOSE-BUTTON-CONTAINER -->
      <div class="close-button-container d-flex justify-content-end">
        <!-- Bouton fermeture de la page -->
        <button class="" onclick='<?= 'window.location=' . '"' . BASE_URL . '"'; ?>'>
          <span class="croix"></span>
        </button>
      </div>

      <?php $quant = 0;
      foreach ($_SESSION['cart'] as $id => $quantity) :
        if ($product['id'] == $id) :
          $quant = $quantity;
        endif;
      endforeach; ?>


      <!-- .CARD-CONTENT -->
      <div id="card-content" class="card-content d-flex justify-content-between align-items-center">

        <!-- .CARD-LEFT-->
        <div class="card-left">
          <img src="<?= $product['picture']; ?>" class="img-fluid rounded-start" alt="..">
        </div>

        <!-- .CARD-RIGHT-->
        <div class="card-right">

          <div class="product-content">
            <h2 class="product-title"></h2>
            <a href="#" class="product-link"></a>
            <div class="product-rating">
              <?= nbEtoiles($product['etoiles']); ?>
              <span></span>
            </div>

            <div class="product-price">
              <p class="last-price">Prix : <span><?= $product['price']; ?>€</span></p>
              <p class="new-price">Prix Découverte -5% : <span><?= promo($product['price'], 0.05); ?>€</span></p>
            </div>

            <div class="product-detail">
              <h2><?= $product['name']; ?></h2>
              <p><?= $product['description']; ?></p>

              <ul>
                <!-- <li>Filtre:</li> -->
                <li>Categorie: <?= $product['category']; ?></li>
              </ul>

            </div>

            <?php if ($quant == 0) { ?>

              <div class="purchase-info">
                <input type="number" min="0" value="<?= $quant; ?>">
                <a href="<?= 'DetailPlat.php' ?>?add=<?= $product['id']; ?>">
                  <button type="button" class="btn ajouter">
                    Ajouter au panier <i class="fas fa-shopping-cart"></i>
                  </button>
                </a>
              </div>

            <?php } else { ?>

              <div class="purchase-info d-flex align-items-center justify-content-between">
                <div class="moins-plus">
                  <a href="?remove=<?= $product['id']; ?>" class="moins">&ndash;</a>
                  <input class="text-center text-primary pe-0" disabled type="number" value="<?= $quant; ?>">
                  <a href="<?= SITE ?>?add=<?= $product['id']; ?>" class="plus">+</a>
                </div>
              </div>

            <?php } ?>

          </div> <!-- / .CARD-RIGHT -->

        </div><!-- / .CARD-CONTENT -->

      </div> <!-- / .CARD -->

    </div> <!-- / .CARD-CONTAINER -->

  </div> <!-- / .CONTENT-PLAT .MAIN-CONTENT  -->

  <?php require_once 'inc/footer.php'; ?>