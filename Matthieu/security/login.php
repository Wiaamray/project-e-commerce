<?php
require_once '../inc/header.php';

if (connect()) :
    // alternative au dysfonctionnement du header
    echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
    // header('location:../');
    // exit();
endif;



if (!empty($_POST)) :

    $resultat = executeRequete("SELECT * FROM user WHERE email=:email", array(
        ':email' => $_POST['email']
    ));


    if ($resultat->rowCount() == 1) :

        $user = $resultat->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'], $user['password'])) :




            $_SESSION['user'] = $user;
            $_SESSION['messages']['success'][] = "Bienvenue " . $user['nickname'];


            // alternative au dysfonctionnement du header
            echo '<script>window.location=' . '"' . BASE_URL . '"' . '</script>';
            // header('location:../');
            //   exit();

        else :
            $_SESSION['messages']['danger'][] = "Erreur sur le mot de passe";

            // alternative au dysfonctionnement du header
            echo '<script>window.location=' . '"' . BASE_URL . 'security/login.php"' . '</script>';
            // header('location:./login.php');
            // exit();

        endif;

    elseif ($resultat->rowCount() == 0) :

        $_SESSION['messages']['danger'][] = "Aucun compte n'est existant à cette adresse mail";

        // alternative au dysfonctionnement du header
        echo '<script>window.location=' . '"' . BASE_URL . 'security/login.php"' . '</script>';
        // header('location:./login.php');
        // exit();


    elseif ($resultat->rowCount() > 1) :
        $_SESSION['messages']['danger'][] = "Une erreur est survenue, merci de contacter l'administrateur du site";

        // alternative au dysfonctionnement du header
        echo '<script>window.location=' . '"' . BASE_URL . 'security/login.php"' . '</script>';
        // header('location:./login.php');
        // exit();

    endif;



endif;

?>



<form method="post" action="">

    <section class="h-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-5">Déjà inscrit ?<br>Connectez-vous !</h2>

                                <!-- input pour l'email -->
                                <label for="inputEmail">Email</label>
                                <div class="icone">
                                    <input type="text" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" placeholder="Adresse email">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div>
                                    <span id="errorEmail"></span>
                                </div>

                                <!-- input pour le mot de passe -->
                                <label for="inputPassword" class="mt-3">Mot de passe</label>
                                <div class="icone">
                                    <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" placeholder="Mot de passe (minimum 6 caractères)">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <i class="far fa-eye" id="togglePassword"></i>
                                </div>
                                <div>
                                    <span id="errorPassword"></span>
                                </div>


                                <button class="btn mb-2 mt-3 mb-md-0 btn-outline-secondary btn-block" type="submit">
                                    Se connecter
                                </button>
                                <hr class="mb-3">
                                <h6 class="text-center mb-1">Vous n'avez pas de compte ? <a href="<?= "./register.php"; ?>">Inscrivez-vous !</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</form>




<!-- début script formulaire -->
<script src="../js/formLogin.js"></script>


<?php require_once '../inc/footer.php' ?>