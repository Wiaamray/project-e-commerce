
<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;




//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function



//Create an instance; passing `true` enables exceptions



$mail = new PHPMailer(true);


    //Server settings
                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dorancosalle78@gmail.com';                     //SMTP username
    $mail->Password   = 'Dorancosalle78connect';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465; 




    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];
   
    //Destinataires
    $mail->addAddress("wihemray@gmail.com");
    //Expéditeur//
    $mail->setFrom($email);

    $mail->addEmbeddedImage('upload/photo.jpg', 'logo');

    $mail->isHTML(true);
    //contenu
    $mail->Subject = $sujet; 



    ob_start();
    include('mail.php');
    $mail->Body = ob_get_clean(); //Lit le contenu courant du tampon de sortie puis l'efface 
    // On envoie
      $mail->send();
      header('location:./');
      exit();
  
