<?php
require_once '../inc/header.php';
if (connect()):
header('location:../');
exit();
endif;



if (!empty($_POST)) :

    function password_strength_check($password, $min_len = 6, $max_len = 20, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1)
    {
        // Build regex string depending on requirements for the password
        $regex = '/^';
        if ($req_digit == 1) {
            $regex .= '(?=.*\d)';
        }              // Match at least 1 digit
        if ($req_lower == 1) {
            $regex .= '(?=.*[a-z])';
        }           // Match at least 1 lowercase letter
        if ($req_upper == 1) {
            $regex .= '(?=.*[A-Z])';
        }           // Match at least 1 uppercase letter
        if ($req_symbol == 1) {
            $regex .= '(?=.*[^a-zA-Z\d])';
        }    // Match at least 1 character that is none of the above
        $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

        if (preg_match($regex, $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    $resultat = executeRequete("SELECT * FROM user WHERE email=:email", array(
        ':email' => $_POST['email']
    ));

    if ($resultat->rowCount() !== 0):
        $_SESSION['messages']['danger'][] = "Un compte est déjà existant à cette adresse mail";

        header('location:./register.php');
        exit();
    endif;

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
        $_SESSION['messages']['danger'][] = "email invalide";

        header('location:./register.php');
        exit();
    endif;

    if(!password_strength_check($_POST['password'])):

        $_SESSION['messages']['danger'][] = "Votre mot de passe doit contenir au minimum 6 caractères, maximum 15 caractères,majuscule, minuscule et un caractère spécial ! # @ % & * + -";
        header('location:./register.php');
        exit();

    endif;


    if ($_POST['password'] == $_POST['confirmPassword']):

        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

        executeRequete("INSERT INTO user (nickname, email, password, roles) VALUES (:nickname, :email, :password, :roles)", array(
            ':nickname' => $_POST['nickname'],
            ':email' => $_POST['email'],
            ':password' => $mdp,
            ':roles' => 'ROLE_USER'

        ));

        $_SESSION['messages']['success'][] = "Félicitation, vous êtes à présent inscrit";

        header('location:./login.php');
        exit();

    else:

        $_SESSION['messages']['danger'][] = "Les mots de passe ne correspondent pas";

        header('location:./register.php');
        exit();

    endif;


endif;


?>

<!-- / .REGISTER-PAGE.MAIN-CONTENT  -->
<div class="register-page main-content">
<form method="post" action="">

    <section class="container">
        <!-- <div class="mask d-flex align-items-center h-100 gradient-custom-3"> -->
            <!-- <div class="container h-100"> -->
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" id="register-card">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Inscription</h2>

                                <!-- cadre pour faire afficher la photo de l'utilisateur -->
                                <div class="conteneur-photo">
                                    <div class="photo" id="display-image">
                                        <label for="image-input">
                                            <i class="fas fa-upload fa-2x"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="file" id="image-input" accept="image/png, image/jpg" />
                                    </div>
                                </div>

                                <!-- input pour le nom -->
                                <label for="nickname" class="mt-3">Nom</label>
                                <div class="icone">
                                    <input type="text" name="nickname" id="nickname" class="form-control mb-4" placeholder="Nom">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div>
                                    <span id="errorNom"></span>
                                </div>

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

                                <!-- input pour la confirmation du mot de passe -->
                                <label for="inputConfirmPassword" class="mt-3">Confirmation de mot de passe</label>
                                <div class="icone">
                                    <input type="password" name="confirmPassword" id="inputConfirmPassword" class="form-control" autocomplete="current-password" placeholder="Mot de passe (minimum 6 caractères)">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <i class="far fa-eye" id="togglePassword-verif"></i>
                                </div>
                                <div>
                                    <span id="errorPassword-verif"></span>
                                </div>


                                <button class="btn inscription mb-2 mt-3 mb-md-0 btn-outline-secondary btn-block" type="submit">
                                    S'inscrire
                                </button>
                                <hr class="mb-3">
                                <h6 class="text-center mb-1">Vous avez déjà un compte ? <a href="<?= "./login.php#login-card"; ?>">Connectez-vous !</a></h6>
                            
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->

    </section>
</form>

</div>
<!-- / .REGISTER-PAGE.MAIN-CONTENT  -->

<?php require_once '../inc/footer.php' ?>
