<?php require_once 'inc/header.php';

// pour la déconnexion (avec le GET que l'on a inséré sur le bouton dans le header)
if (isset($_GET['unset'])) {
    unset($_SESSION['user']);

    // alternative au dysfonctionnement du header
    // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    header("location:./");
    exit();
}

// pour le add (avec le GET que l'on a inséré sur le bouton dans l'index.php)
if (isset($_GET['add'])) {
    add($_GET['add']);

    // alternative au dysfonctionnement du header
    // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    header("location:./");
    exit();
}

// pour le remove (avec le GET que l'on a inséré sur le bouton dans l'index.php)
if (isset($_GET['remove'])) {
    remove($_GET['remove']);

    // alternative au dysfonctionnement du header
    // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    header("location:./");
    exit();
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
    // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    header("location:./");
    exit();
}


?>

<div class="container-fluid">
    <!--A propos section-->
    <div class="container">

        <section id="best-features" class="text-center">

            <h2 class="mb-5 font-weight-bold">DeliveryFood</h2>

            <!--Grid row-->
            <div class="row d-flex justify-content-center mb-4">
                <!--Grid column-->
                <div class="col-md-8">
                    <!-- Description -->
                    <p class="grey-text">
                        Notre compagnie a pour objectif <br />la livraison à domicile des repas frais et équilibrés.
                        Est parfaite pour ceux qui fuient les produits industriels.<br />
                        On prend on considération la tendance écologique afin d’éviter le gaspillage alimentaire et protéger la planète. </p>

                </div>

                <!--A propos section Fin-->



                <!-- Affichage des cards -->
                <div class="row justify-content-around">
                    <?php foreach ($products as $product) : ?>
                        <?php $quant = 0;
                        foreach ($_SESSION['cart'] as $id => $quantity) :
                            if ($product['id'] == $id) :
                                $quant = $quantity;
                            endif;
                        endforeach; ?>
                        <div class="card card-container" style="max-width: 15rem;">
                            <a class="text-decoration-none" href="<?= 'DetailPlat.php?id=' . $product['id']; ?>" target="_blank">
                                <div class="card-header text-center">
                                    <img width="150" src="<?= $product['picture']; ?>" alt="">
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
                                <a href="<?= SITE . 'admin/admin.php?id=' . $product['id']; ?>" class="btn btn-primary">Modifier</a>
                                <a href="?id=<?= $product['id']; ?>" onclick='return confirm("Êtes-vous sûr de supprimer cet article ?")' class="btn btn-danger">Supprimer</a>
                            <?php } elseif ($quant == 0) { ?>
                                <div class="text-center mb-3">
                                    <a href="<?= SITE ?>?add=<?= $product['id']; ?>" class="btn btn-primary">Ajouter au panier</a>
                                </div>
                            <?php } else { ?>
                                <div class="text-center mb-3">
                                    <a href="?remove=<?= $product['id']; ?>" class="btn btn-primary">-</a>
                                    <input class="text-center text-primary ps-3 pe-0" disabled style="width: 15%" type="number" value="<?= $quant ?? 0; ?>">
                                    <a href="<?= SITE ?>?add=<?= $product['id']; ?>" class="btn btn-primary">+</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>


                <?php require_once 'inc/footer.php'; ?>