<?php
require_once '../inc/header.php';

// Contrôle de la connexion s'il n'est pas l'admin
if (!admin()) {

    // alternative au dysfonctionnement du header
    // echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    header("location:../");
    exit();
}

if (!empty($_POST)) : //Si le formulaire a été soumis

    // on est dans le cas où on souhaite modifier l'image
    if (!empty($_FILES['pictureEdit']['name'])) {
        $picture_name = date_format(new DateTime(), 'dmY') . '_modified_' . $_FILES['pictureEdit']['name'];
        //on modifie le nom pour le rendre unique avec une new DateTime

        $picture_bdd = 'upload/' . $picture_name;
        //Le chemin à suivre pour acceder à notre dossier photo dans notre application:

        copy($_FILES['pictureEdit']['tmp_name'], '../' . $picture_bdd);
        // on déplace notre fichier depuis le dossier temporaire pour le mettre dans le fichier permanent avec le nom adapté.

        unlink('../' . $_POST['picture']);
    }

    // on est dans le cas où l'image n'est pas changée à la modification
    if (empty($_FILES['pictureEdit']['name']) && empty($_FILES['picture']['name'])) {
        $picture_bdd = $_POST['picture'];
    }

    // on est dans le cas d'une insertion d'une image non existante
    if (!empty($_FILES['picture']['name'])) :

        // debug($_FILES);
        // die;

        $picture_name = date_format(new DateTime(), 'dmY') . '_insert_' . $_FILES['picture']['name'];
        //on modifie le nom pour le rendre unique avec une new DateTime

        $picture_bdd = 'upload/' . $picture_name;
        //Le chemin à suivre pour acceder à notre dossier photo dans notre application:

        if (!file_exists('../upload')) {
            mkdir('../upload', 0777, true);
        }



        copy($_FILES['picture']['tmp_name'], '../' . $picture_bdd);
    // on déplace notre fichier depuis le dossier temporaire pour le mettre dans le fichier permanent avec le nom adapté.

    endif;

    // insert en BDD :
    // ordre de la BDD : id, name, price, picture, description, category, etoiles
    $requete = executeRequete("REPLACE INTO product VALUES (:id, :name, :price, :picture, :description, :category, :etoiles)", array(
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':price' => $_POST['price'],
        ':picture' => $picture_bdd,
        ':description' => $_POST['description'],
        ':category' => $_POST['category'],
        ':etoiles' => $_POST['etoiles']
    ));

    if (isset($_FILES['pictureEdit'])) {
        $_SESSION['messages']['success'][] = "Votre article a bien été modifié";
    } else {
        $_SESSION['messages']['success'][] = "Votre article a bien été ajouté";
    }

    // pour la redirection vers le site homepage
    header('location:../');
    exit();
endif;

if (isset($_GET['id'])) {
    $resultat = executeRequete("SELECT * FROM product WHERE id = :id", array(
        ':id' => $_GET['id']
    ));

    $product = $resultat->fetch(PDO::FETCH_ASSOC);

    // test de fonctionnement
    // debug($product);
    // die();
}
?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>

            <input type="hidden" name="id" value="<?= $product['id'] ?? 0; ?>">
            <div class="form-group">
                <label for="InputName" class="form-label mt-4">Nom</label>
                <input type="text" name="name" class="form-control" id="InputName" aria-describedby="emailHelp" placeholder="Entrez le nom" value="<?= $product['name'] ?? ""; ?>">
            </div>

            <div class="form-group">
                <label for="InputPrice" class="form-label mt-4">Prix</label>
                <input type="number" name="price" class="form-control" id="InputPrice" placeholder="Entrez le prix" value="<?= $product['price'] ?? ""; ?>">
            </div>

            <div class="form-group">
                <label for="InputDescription" class="form-label mt-4">Description</label>
                <textarea name="description" class="form-control" id="InputDescription" rows="3"><?= $product['description'] ?? ""; ?></textarea>
            </div>

            <div class="form-group">
                <label for="InputEtoiles" class="form-label mt-4">Nombre d'étoiles</label>
                <input type="number" name="etoiles" class="form-control" id="InputEtoiles" placeholder="Entrez le prix du produit" value="<?= $product['etoiles'] ?? ""; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Catégorie</label>
                <select class="form-select" id="exampleSelect1" name="category" value="<?= $product['category'] ?? ""; ?>">
                    <option value="Menus">Menus</option>
                    <option value="Plats">Plats</option>
                    <option value="Desserts">Desserts</option>
                </select>

            </div>
            <?php if (isset($product)) : ?>
                <div class="form-group">
                    <label for="formFile" class="form-label mt-4">Photo</label>
                    <input name="pictureEdit" class="form-control" type="file" id="formFile">
                </div>
                <input type="hidden" name="picture" value="<?= $product['picture']; ?>">
                <div>
                    <img width="150" src="<?= '../' . $product['picture']; ?>" alt="">
                </div>
            <?php else : ?>
                <div class="form-group">
                    <label for="formFile" class="form-label mt-4">Photo</label>
                    <input name="picture" class="form-control" type="file" id="formFile">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-outline-primary m-3">Enregistrer</button>
        </fieldset>
    </form>
</div>
<?php
//require_once '../inc/footer.php';
?>