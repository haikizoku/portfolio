<?php
include('header.php');
include 'env.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
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
	if( isset( $_POST['subject'] ) && !empty( $_POST['subject'] ) ){
        $subject = Rec($_POST['subject']);
	}else{
        $subject = '';
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

        $mail = new PHPMailer(true);

        try {
            // Specify the SMTP settings.
            $mail->isSMTP();
            $mail->setFrom($sender, $senderName);
            $mail->Username   = $usernameSmtp;
            $mail->Password   = $passwordSmtp;
            $mail->Host       = $host;
            $mail->Port       = $port;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';
//            $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

            // Specify the message recipients.
            $mail->addAddress($recipient);
            // You can also add CC, BCC, and additional To recipients here.

            // Specify the content of the message.
            $mail->isHTML(true);
            $mail->Subject    = $subject;
            $mail->Body       = $message;
//            $mail->AltBody    = $bodyText;
            $mail->Send();
//
            echo'<div class="alert alert-success" role="alert">Email sent!</div>';
            unset ($message);
            unset ($nom);
            unset ($email);
            unset($subject);


        } catch (phpmailerException $e) {
            echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
        } catch (Exception $e) {
            echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
        }
	}else{
        echo'<div class="alert alert-secondary" role="alert">Renseigner tous les champs</div>';

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
              <input type="text" input type="text" id="sujet" name="subject" value="<?php echo stripslashes($subject); ?>" tabindex="2" class="form-control" placeholder="sujet">
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