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


<!-- .MAIN-CONTENT -->
<div class="content-full-cart main-content container-fluid">

    <div class="container">
        <h3 class="alert alert-warning text-center align-items-center">Votre panier est vide, allez vite le remplir =>
            <a class="hover" href="<?= SITE; ?>">Nos Bijoux</a>
        </h3>
    </div>

    <?php else : ?>

    <div class="container d-flex justify-content-end">
        <a href="?destroy=1">
            <button class="btn vider btn-outline-info btn-rounded mt-3">Vider le panier</button>
        </a>
    </div>

    <table class="row table mt-3">

        <thead class="thead-dark text-center">
            <tr>
                <th>Nom</th>
                <th>Photo</th>
                <th>Prix Total</th>
                <th>
                    <button class="btn btn-primary">Retirer</button>
                </th>
                <th>Quantité</th>
                <th>
                    <button class="btn btn-primary">Ajouter</button>
                </th>
                <th>Annuler</th>
            </tr>
        </thead>

        <tbody class="text-center">

            <?php foreach ($details as $item) : ?>
                <tr>
                    <td><?= $item['product']['name']; ?></td>
                    <td><img height="40" width="40" src="<?= SITE . $item['product']['picture']; ?>" alt=""></td>

                    <td><?= $item['total']; ?> €</td>
                    <td>
                        <a href="?remove=<?= $item['product']['id']; ?>">
                            <button class="btn btn-primary text-white">-</button>
                        </a>
                    </td>
                    <td><?= $item['quantity']; ?></td>
                    <td>
                        <a href="?add=<?= $item['product']['id']; ?>">
                            <button class="btn btn-primary text-white">+</button>
                        </a>
                    </td>

                    <td>
                        <a href="?delete=<?= $item['product']['id']; ?>">
                            <button class="btn btn-outline-danger btn-rounded">Annuler</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>

    <div class="mt-3">
        <h4>Total du panier: <?= $total; ?> €</h4>
    </div>

    <?php if (connect()) : ?>
        <a href="?order=1" class="btn btn-success mt-2 mb-5">Passer à la commande</a>
    <?php else : ?>
        <a href="<?= SITE . 'security/login.php'; ?>" onclick="return confirm('Authenfiez-vous pour passer à la commande ')" class="btn btn-success mt-2 mb-5">Passer à
            la commande</a>
    <?php endif; ?>

</div><!-- / .MAIN-CONTENT -->
<?php endif;
require_once '../inc/footer.php'; ?>