<?php require_once 'inc/header.php'; ?>


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
                            Notre compagne à pour objectif <br/>la livraison à domicile des repas frais et  équilibrés.
                             Est parfaite pour ceux qui fuient les produits industriels.<br/>
                             On prend on considération la tendance écologique afin d’éviter le gaspillage alimentaire et protéger la planéte. </p>

            </div>

<!--A propos section Fin-->



<div class="container-fluid">
     <div class="container card-container">
        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])):
            foreach ($_SESSION['messages'] as $type => $mess):
                foreach ($mess as $key => $message):
        ?>

        <div class="alert alert-<?= $type; ?> text-center">
            <p><?= $message; ?></p>
        </div>
        <?php unset($_SESSION['messages'][$type][$key]); ?>
        <?php endforeach; endforeach; endif; ?>


<?php require_once 'inc/footer.php'; ?>





