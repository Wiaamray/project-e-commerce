<?php require_once 'inc/header.php' ?>


        <div class="container">
            <div class="contact-form-group">
                <div class="contact-info" id="contactez-nous">
                    <h3 class="title"><strong>Contactez-nous</strong></h3>
                    <!-- <p class="text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                        dolorum adipisci recusandae praesentium dicta!
                    </p> -->

                    <div class="info">
                        <div class="information">
                            <i class="fas fa-address-card" class="icon"></i>
                            <p>6 rue de l'invention 75007 Paris</p>
                        </div>
                        <div class="information">
                            <i class="fa fa-envelope" aria-hidden="true" class="icon"></i>
                            <p>lepaniervert@gmail.com</p>
                        </div>
                        <div class="information">
                            <i class="fa-solid fa-phone" class="icon"></i>
                            <p>55-55-55-55</p>
                        </div>
                    </div>
                </div>


                <div class="contact-form">


                    <form action="contact.php" method="post" enctype="multipart/form-data">
                        <h3 class="title"></h3>
                        <div class="input-container">
                            <input type="text" name="nom" id="name" class="contact-input" placeholder="Votre Nom" />
                            <label for="nom"></label>

                        </div>
                        <div class="input-container">
                            <input type="email" name="email" id="email" class="contact-input" placeholder="Votre Email" />
                            <label for="email"></label>

                        </div>
                        <div class="input-container">
                            <input type="text" name="sujet" id="sujet" class="contact-input" placeholder=" Sujet de votre message" />
                            <label for="sujet"></label>

                        </div>
                        <div class="input-container textarea">
                            <textarea name="message" id="message" class="contact-input" placeholder="Ecrire un message"></textarea>
                            <label for="message"></label>

                        </div>
                        <input type="submit" name="submit" value="ENVOYER" class="contact-btn" />
                    </form>
                </div>
            </div>
        </div>
<?php require_once 'inc/footer.php' ?>