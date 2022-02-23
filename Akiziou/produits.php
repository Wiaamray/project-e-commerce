<?php require_once 'inc/header.php';

    $category = null;
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } 
    //var_dump($category);
    $resultat=executeRequete("SELECT * FROM product WHERE category like '$category%' ");
    $products = $resultat->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($products);

?>
<div class="container">

    <div class="row">
    <?php foreach ($products as $product): ?>

    <div class="col-sm-3">
        <div class="card">
            <img class="card-img-top" src="<?= $product['picture']; ?>" alt="Card image cap">
            <div class="card-body">
                <div class="product-price">
                    <p class="last-price">Prix: <span><?= $product['price']; ?>€</span></p>
                </div>
                <h2><?= $product['name']; ?></h2>
                <p><?= $product['description']; ?></p>

                <ul>
                <!-- <li>Filtre:</li> -->
                <li>Categorie: <?= $product['category']; ?></li>
                </ul>
                <!--<h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
    </div>

<?php endforeach; ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>