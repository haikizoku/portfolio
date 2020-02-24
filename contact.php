<?php
include('header.php');
include 'env.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
 $mail = new PHPMailer(true);
    // Validate reCAPTCHA box
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        // Google reCAPTCHA API secret key
        $secretKey = '6Ld1jdsUAAAAACSTvrJTEXlDFSia_ymsjt_5FcFU';

        // Verify the reCAPTCHA response
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);

        // Decode json data
        $responseData = json_decode($verifyResponse);

        // If reCAPTCHA response is valid
        if($responseData->success) {
            // Posted form data
            $name = !empty($_POST['name']) ? $_POST['name'] : '';
            $phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
            $email = !empty($_POST['email']) ? $_POST['email'] : '';
            $subject = !empty($_POST['$subject']) ? $_POST['$subject'] : '';
            $message = !empty($_POST['message']) ? $_POST['message'] : '';
            try {
                // Specify the SMTP settings.
                $mail->isSMTP();
                $mail->setFrom($sender, $senderName);
                $mail->Username = $usernameSmtp;
                $mail->Password = $passwordSmtp;
                $mail->Host = $host;
                $mail->Port = $port;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                //            $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

                // Specify the message recipients.
                $mail->addAddress($recipient);
                // You can also add CC, BCC, and additional To recipients here.

                // Specify the content of the message.
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
                //            $mail->AltBody    = $bodyText;
                $mail->Send();
                //
                echo '<div class="alert alert-success" role="alert">Email sent!</div>';

            } catch (phpmailerException $e) {
                echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
            } catch (Exception $e) {
                echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
            }

            $postData = '';
        }else{
            $statusMsg = 'Robot verification failed, please try again.';
            echo'<div class="alert alert-secondary" role="alert">Robot verification failed, please try again</div>';
        }
    }else{
        $statusMsg = 'Please check on the reCAPTCHA box.';
        echo'<div class="alert alert-secondary" role="alert">Please check on the reCAPTCHA box</div>';
    }
}

?>
	<div class="contact">
        <div class="container ">
            <form id="contact_form" method="post" action="" >

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
                    <div class="form-group">
                        <input type ="text" id="name" name="name" tabindex="1"  class = "form-control" placeholder="name" data-error="name is required." required="">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class= "col-md-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone" data-error="phone is required." required="">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class= "col-md-offset-1"> </div>
              </div>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class = "row">
                <div class ="col-md-offset-1 col-md-10 col-md-offset-1 ">
                    <div class="form-group">
                        <input type="text" input type="text" id="email" name="email" tabindex="2" class="form-control" placeholder="email"  required="">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
              </div>
              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class = "row">
                <div class ="col-md-offset-1 col-md-10 col-md-offset-1 ">
                    <div class="form-group">
                        <input type="text" input type="text" id="sujet" name="subject" tabindex="2" class="form-control" placeholder="subject"  required="" >

                    </div>
                </div>
              </div>

              <div class ="row" id="divide2">
                <div class="col-md-12"></div>
              </div>

              <div class="row">
                <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <textarea id="message" name="message" class="form-control" placeholder="Entrez votre Message ici..." style = "resize:none;" row=8   required=""></textarea>

                    </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Ld1jdsUAAAAAGhSyu9Cog2Gpz46x8XDO1pKrCxF"></div>

                    </div>
                  </div>
              </div>
              <div class="row">
               <div class=" col-md-12 ">
                <input type="submit" name="send" class="btn btn-outline-info" value="Envoyer" target="_blank">
                </div>
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