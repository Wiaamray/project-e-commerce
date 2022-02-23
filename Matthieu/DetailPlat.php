<?php
require_once './inc/header.php';

// pour la déconnexion (avec le GET que l'on a inséré sur le bouton dans le header)
if (isset($_GET['unset'])) {
  unset($_SESSION['user']);

  // alternative au dysfonctionnement du header
  // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  header("location:./");
  exit();
}

// pour le add (avec le GET que l'on a inséré sur le bouton dans detailPlat.php)
if (isset($_GET['add'])) {
  add($_GET['add']);

  // alternative au dysfonctionnement du header
  // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  header("location:./");
  exit();
}

// pour le remove (avec le GET que l'on a inséré sur le bouton dans detailPlat.php)
if (isset($_GET['remove'])) {
  remove($_GET['remove']);

  // alternative au dysfonctionnement du header
  // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
  header("location:./");
  exit();
}

$resultat = executeRequete("SELECT * FROM product WHERE id=:id", array(
  ':id' => $_GET['id']
));

$product = $resultat->fetch(PDO::FETCH_ASSOC);
// fetch à utiliser systématiquement lorsque l'on a un seul jeu de résultat 
// renvoie un tableau array[]


?>
<div class="container">

  <div class="card row">
    <!-- Bouton fermeture de la page -->
    <i class="fa-solid fa-xmark fa-2x d-flex justify-content-end" onclick=window.close()></i>


    <?php $quant = 0;
    foreach ($_SESSION['cart'] as $id => $quantity) :
      if ($product['id'] == $id) :
        $quant = $quantity;
      endif;
    endforeach; ?>
    <!--card Left-->

    <div class="mb-3 col-md-6" style="max-width: 540px;">
      <img src="<?= $product['picture']; ?>" class="img-fluid rounded-start" alt="...">
    </div>




    <!--card right-->

    <div class="mb-3 col-md-4" style="max-width: 540px;">
      <div class="product-content">
        <h2 class="product-title"></h2>
        <a href="#" class="product-link"></a>
        <div class="product-rating">
          <?= nbEtoiles($product['etoiles']); ?>
          <span></span>
        </div>

        <div class="product-price">
          <p class="last-price">Prix: <span><?= $product['price']; ?>€</span></p>
          <p class="new-price">Prix Découverte 5%: <span><?= promo($product['price'], 0.05); ?>€</span></p>
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
            <a href="<?= SITE . 'DetailPlat.php' ?>?add=<?= $product['id']; ?>">
              <button type="button" class="btn">
                Ajouter au panier <i class="fas fa-shopping-cart"></i>
              </button>
            </a>
          </div>
        <?php } else { ?>
          <div class="purchase-info d-flex align-items-center justify-content-between">
            <a class="text-decoration-none" href="<?= SITE . 'DetailPlat.php'; ?>?remove=<?= $product['id']; ?>">
              <button type="button" class="btn">Retirer</button>
            </a>
            <input type="number" min="0" value="<?= $quant; ?>">
            <a class="text-decoration-none" href="<?= SITE . 'DetailPlat.php'; ?>?add=<?= $product['id']; ?>">
              <button type="button" class="btn">Ajouter</button>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>





  </div>
</div>


















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>