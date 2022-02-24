
<?php

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

?>


<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465; 

    //Destinataires
    $mail->addAddress("wihemray@gmail.com");
    //Expéditeur//
    $mail->setForm("");
    //contenu
    $mail->subject = "sujet du message"; 
    $mail->body = "Message";  
    // On envoie
      $mail->send();
      echo "Message envoyé" 
    
    

  if (!isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $to =  'wihemray@gmail.com';
    $subject = $message;

    $message = "nom: {$nom} email: {$email} sujet: {$sujet}  Message: " . $message;

  
    $headers .= 'From: wihemray@gmail.com';

    $mail = mail($to,$subject,$message,$headers);

    if ($mail) {
      echo "<script>alert('Votre mail n'est pas envoyé.');</script>";
    }else {
      echo "<script>alert('Votre mail est envoyé.');</script>";
    }
  }

?>