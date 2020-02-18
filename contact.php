<?php
include('header.php');

function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}
 
	$text = nl2br($text);
	return $text;
}

if ( isset( $_POST['envoi'] ) ) {

	$errors = array();

	if( isset( $_POST['nom'] ) && !empty( $_POST['nom'] ) ){
		$nom = Rec($_POST['nom']);
	}else{
		$nom = '';
		$errors[] = 'nom';
	}
	if( isset( $_POST['phone'] ) && !empty( $_POST['phone'] ) ){
		$phone = Rec($_POST['phone']);
	}else{
		$phone = '';
		$errors[] = 'phone';
	}
	if( isset( $_POST['email'] ) && !empty( $_POST['email'] ) ){
		$email = Rec($_POST['email']);
	}else{
		$email = '';
		$errors[] = 'email';
	}
	if( isset( $_POST['sujet'] ) && !empty( $_POST['sujet'] ) ){
		$sujet = Rec($_POST['sujet']);
	}else{
		$sujet = '';
		$errors[] = 'sujet';
	}
	if( isset( $_POST['message'] ) && !empty( $_POST['message'] ) ){
		$message = Rec($_POST['message']);
	}else{
		$message = '';
		$errors[] = 'message';
	}

	$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

	if( empty( $errors ) ){

	/*
		********************************************************************************************
		CONFIGURATION
		********************************************************************************************
	*/
	// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
	$destinataire = 'crownfire@hotmail.fr';
	 
	// copie ? (envoie une copie au visiteur)
	$copie = false;
	 
	// Messages de confirmation du mail
	$message_envoye = "Votre message nous est bien parvenu !";
	$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
	 
	     // Message d'erreur du formulaire
	     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
	     $headers  = 'MIME-Version: 1.0' . "\r\n";
	     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	     // En-têtes additionnels
	     $headers .= 'To: Gregory Norvene <'. $destinataire .'>' . "\r\n";
	     $headers .= 'From: '. $name .' <'. $mail .'>' . "\r\n";
	     $headers .= 'Bcc: gnorvene@gmail.com' . "\r\n";

	     // Envoi
	     if( mail($destinataire, $sujet, $message, $headers) ){
	     	echo $message_envoye;
	     	//echo"<script language='javascript'>\nalert(\"Votre message nous est bien parvenu !\");\n</script>";
	     }else{
	     	echo $message_non_envoye;
	     	//echo"<script language='javascript'>\nalert(\"envoi du mail a échoué, veuillez réessayer SVP\");\n</script>";
//	     		  echo'<div class="alert alert-danger">
//                    <strong>envoi du mail a échoué</strong></div>';
	     }

	}else{
	        	//echo $message_formulaire_invalide;
		// echo"<script language='javascript'>\nalert(\"Remplissez  tous les champs \");\n</script>";
//		  echo'<div class="alert alert-warning">
//         <strong>Renseigner  tous les champs</strong></div>';
	}

}

?>
	<div class="contact">
        <div class="container ">
            <form id="contact" method="post" action="">

                <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>
              <div class="row">
              <div class="col-md-offset-1 col-md-10 col-md-offset-1 labelcpt" style="text-align:center" >Formulaire  de  contact</div>
              </div>
              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class ="row">
                <div class= "col-md-offset-1 col-md-5">
                <input type ="text" id="nom" name="nom" value="<?php echo stripslashes($nom); ?>" tabindex="1"  class = "form-control" placeholder="name">
                </div>
                <div class= "col-md-5">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class= "col-md-offset-1"> </div>
              </div>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class = "row">
                <div class ="col-md-offset-1 col-md-10 col-md-offset-1 ">
              <input type="text" input type="text" id="email" name="email" value="<?php echo stripslashes($email); ?>" tabindex="2" class="form-control" placeholder="email">
                </div>
              </div>
              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class = "row">
                <div class ="col-md-offset-1 col-md-10 col-md-offset-1 ">
              <input type="text" input type="text" id="sujet" name="sujet" value="<?php echo stripslashes($sujet); ?>" tabindex="2" class="form-control" placeholder="sujet">
                </div>
              </div>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>


              <div class="row">
                <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                <textarea id="message" name="message" value="<?php echo stripslashes($message); ?>"  class="form-control" placeholder="Entrez votre Message ici..." style = "resize:none;" row=8 ></textarea>
                </div>
              </div>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class="row">
               <div class=" col-md-12 text-center">
                <input type="submit" name="envoi" class="btn btn-outline-info" value="Envoyer"></input>
                </div>
                <div class= "col-md-offset-2"></div>
              </div>
              </form>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

            </form>
        </div>
	</div>

<?php include ('footer.php');?>
</body>
</html>