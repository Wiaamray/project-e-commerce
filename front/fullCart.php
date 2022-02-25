<?php require_once '../inc/header.php';

$details = getFullCart();
$total = getTotal();

if (isset($_GET['add'])) :
    add($_GET['add']);

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . 'front/fullCart.php"' . '</script>';
// header("location:./fullCart.php");
// exit();
endif;

if (isset($_GET['remove'])) :
    remove($_GET['remove']);

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . 'front/fullCart.php"' . '</script>';
// header("location:./fullCart.php");
// exit();
endif;

if (isset($_GET['delete'])) :
    delete($_GET['delete']);

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . 'front/fullCart.php"' . '</script>';
// header("location:./fullCart.php");
// exit();
endif;

if (isset($_GET['destroy'])) :
    destroy();

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
// header("location:../");
// exit();
endif;

if (isset($_GET['order'])) :

    $resultat = executeRequete(
        "INSERT into orders (date, id_user, amount) VALUES (:date, :id_user, :amount)",
        array(
            ':date' => date_format(new DateTime(), 'Y-m-d'),
            ':id_user' => $_SESSION['user']['id'],
            ':amount' => getTotal()

        )
    );
    // debug($resultat);
    // die();
    $id = $resultat;
    foreach (getFullCart() as $item) :

        executeRequete("INSERT into details (quantity, id_product, id_orders) VALUES ( :quantity, :id_product, :id_orders)", array(
            ':quantity' => $item['quantity'],
            ':id_product' => $item['product']['id'],
            ':id_orders' => $id

        ));
        remove($item['product']['id']);
    endforeach;

    $_SESSION['messages']['success'][] = 'Merci pour votre achat, consultez le suivi dans votre onglet "Mes commandes"';

    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
// header("location:../");
// exit();

endif;

if (getQuantity() == 0) :


?>

        <div class="container">
        <h3 class="alert alert-warning text-center align-items-center">Votre panier est vide, allez vite le remplir =>
            <a class="hover" href="<?= SITE; ?>">nos merveilleux plats</a>
        </h3>
    </div>

    <?php else : ?>
<!-- .MAIN-CONTENT -->
<div class="content-full-cart main-content container-fluid">


     <!-- ACHAT-PRODUIT -->
    <div class="achat-produits row mt-3">
    <div class="achats container d-flex justify-content-end">
        <div class="vider">
            <a href="?destroy=1">
                <button class="btn vider btn-outline-info btn-rounded mt-3">Vider le panier</button>
            </a>
        </div>
    </div>
    <?php foreach ($details as $item) : ?>
        <!-- .GRILLE-PRODUIT -->
        <div class="grille-produit"> 

            
                <div class="image-produit">                    
                    <p><img height="40" width="40" src="<?= SITE . $item['product']['picture']; ?>" alt=""></p>
                </div>

                <div class="calcul d-flex flex-column justify-content-center">

                    <div class="product-price d-flex justify-content-between">
                        <p class="product-name"><?= $item['product']['name']; ?></p>

                        <p class="product-total"><?= $item['total']; ?> €</p>
                    </div> 

                    <!-- .PRODUCT-CALCUL -->
                    <div class="product-calcul d-flex justify-content-end">

                        <p class="remove">
                            <a href="?remove=<?= $item['product']['id']; ?>">
                                <button class="btn btn-primary">-</button>
                            </a>
                        </p>
                        <p class="d-flex justify-content-center align-items-center"><?= $item['quantity']; ?></p>
                        <p>
                            <a href="?add=<?= $item['product']['id']; ?>">
                                <button class="btn btn-primary">+</button>
                            </a>
                        </p>
                        <div class="cancel">
                            <p>
                                <a href="?delete=<?= $item['product']['id']; ?>">
                                    <button class="btn btn-outline-danger btn-rounded">Annuler</button>
                                </a>
                            </p>
                        </div>             

                    </div> <!-- /.PRODUCT-CALCUL -->

                </div>


        </div> <!-- / .GRILLE-PRODUIT -->


            <?php endforeach; ?>

        <div class="total-produits d-flex justify-content-end">
            <h4>Total du panier: <?= $total; ?> €</h4>
        </div>

        <div class="execute-command d-flex justify-content-end">

            <?php if (connect()) : ?>
            <a href="?order=1" class="btn btn-success mt-2 mb-5">Passer à la commande</a>
            <?php else : ?>
            <a href="<?= SITE . 'security/login.php'; ?>" onclick="return confirm('Authenfiez-vous pour passer à la commande ')" class="btn btn-success mt-2 mb-5">Passer à
            la commande</a>
            <?php endif; ?>

        </div>


    </div> <!-- ./ ACHAT-PRODUIT -->


</div><!-- / .MAIN-CONTENT -->
<?php endif;
require_once '../inc/footer.php'; ?>