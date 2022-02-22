

<?php 

if(!empty($_POST['Nom']))&& !empty($_POST['Prenom']&& !empty($POST['email'])&& !empty($_POST['message'])){
    $Nom = htmlspecialchars($_POST['Nom']);
    $Prenom = htmlspecialchars($_POST['Prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    }
    else {
        echo "Email non valide";
    }

    else{
        header('location:index.php');
        die();
    }
}

?>