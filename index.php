<?php require_once 'inc/header.php'; ?>

<?php
// pour la déconnexion (avec le GET que l'on a inséré sur le bouton dans le header)
if (isset($_GET['unset'])) {
    unset($_SESSION['user']);

    //alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    // header("location:./");
    // exit();
}

// pour le add (avec le GET que l'on a inséré sur le bouton dans l'index.php)
if (isset($_GET['add'])) {
    add($_GET['add']);

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '#card'. $_GET['add'] . '"' . '</script>';
    // header("location:./");
    // exit();
}

// pour le remove (avec le GET que l'on a inséré sur le bouton dans l'index.php)
if (isset($_GET['remove'])) {
    remove($_GET['remove']);

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '#card'. $_GET['remove'] . '"' . '</script>';
    // header("location:./");
    // exit();
}

$resultat = executeRequete("SELECT * FROM product");

$products = $resultat->fetchAll(PDO::FETCH_ASSOC);
// fetchAll à utiliser systématiquement lorsque l'on a un jeu de résultat > 1
// renvoie un tableau array[]

// debug($products);
// die();

// pour suppression de l'article
if (isset($_GET['id'])) {
    executeRequete("DELETE FROM product WHERE id=:id", array(
        ':id' => $_GET['id']
    ));

    $_SESSION['messages']['success'][] = "Votre article a bien été supprimé";

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    // header("location:./");
    // exit();
}

?>

<!-- .MAIN-CONTENT -->
<div class="content-index main-content container-fluid">

    <!-- #APROPOS -->
    <div id="apropos" class="row text-center justify-content-center">

            <h2 class="">Nos valeurs</h2>

            <p class="col-md-8">
                Notre compagnie a pour objectif la vente de repas frais et équilibrés. 
                Parfait pour ceux qui fuient les produits industriels. 
                Nous prenons on considération l'impact écologique afin d’éviter le gaspillage alimentaire et protéger la planète. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quam animi illo blanditiis numquam dolorem consequatur quis excepturi iste ipsa! Laboriosam molestias recusandae eligendi magnam assumenda sequi, dolorem doloremque ipsa?
            </p>

    </div> <!-- / #APROPOS --> 

    <!-- Affichage des cards -->
    <!-- .CARTES -->
    <div class="cartes" id="cartes">
        
        <?php foreach ($products as $product) : ?>
            <?php $quant = 0;
            foreach ($_SESSION['cart'] as $id => $quantity) :
                if ($product['id'] == $id) :
                    $quant = $quantity;
                endif;
            endforeach; ?>

        <!-- .CARD -->
        <div id="card<?= $product['id']; ?>" class="card card-container">
        <a class="text-decoration-none" href="<?= 'DetailPlat.php?id=' . $product['id'] . '#card-content'; ?>">
            <div class="card-header text-center">
                <div class="card-header-content">
                    <div class="ratio-box">
                        <img width="<?= $product['width']; ?>" height="<?= $product['height']; ?>" src="<?= $product['picture']; ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="card-body">

                <h5 class="card-title"><?= $product['name']; ?></h5>
                <p class="card-text text-center"><?= $product['description']; ?></p>
                <div class="star mt-3 align-items-center">
                    <?= nbEtoiles($product['etoiles']); ?>
                </div>
                <h4 class="cost card-title">
                    <span><?= $product['price']; ?> €</span>
                </h4>
            </div>
        </a>
            <?php if (admin()) { ?>
                <a href="<?= SITE . 'admin/admin.php?id=' . $product['id']; ?>" class="btn">Modifier</a>
                <a href="?id=<?= $product['id']; ?>" onclick='return confirm("Êtes-vous sûr de supprimer cet article ?")' class="btn btn-danger">Supprimer</a>
            <?php } elseif ($quant == 0) { ?>
                <div class="text-center mb-3">
                    <a href="<?= SITE ?>?add=<?= $product['id']; ?>" class="btn ajouter">Ajouter au panier</a>
                </div>
            <?php } else { ?>
                <div class="text-center mb-3">
                    <div class="moins-plus">
                        <a href="?remove=<?= $product['id']; ?>" class="moins">&ndash;</a>
                        <input class="text-center text-primary pe-0" disabled type="number" value="<?= $quant; ?>">
                        <a href="<?= SITE ?>?add=<?= $product['id']; ?>" class="plus">+</a>
                    </div>
                </div>
            <?php } ?>

        </div><!-- / .CARD -->

        <?php endforeach; ?>

    </div><!-- / .CARTES -->


</div> <!-- .CONTENT-INDEX .MAIN-CONTENT -->

<?php require_once 'inc/footer.php'; ?>





