<!DOCTYPE html>
<html lang="en">
<head>
    <title>contact</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
  <body>
     <div class="container col-sm-5" style="background-color:#ffffff; padding:25px; border: 1px solid #d9d8d8;">

        <form action="" method="post">
        <div id="alert_message"></div>
           <div class="form-group">
              <label for="pwd">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
           </div>
           <input type="hidden" name="recaptcha_response" value="" id="recaptchaResponse">
           <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg" style="padding: 6px 46px; margin: 16px 0 0 0;">
        </form>
     </div>
  </body>
</html>

<script>
       $('form').submit(function(event) {
           event.preventDefault(); //Prevent the default form submission
           grecaptcha.ready(function () {
               grecaptcha.execute('<YOUR_SECRET_KEY>', { action: 'submit' }).then(function (token) {
                   var recaptchaResponse = document.getElementById('recaptchaResponse');
                   recaptchaResponse.value = token;
           // Making the simple AJAX call to capture the data and submit
           $.ajax({
                       url: 'traitement.php',
                       type: 'post',
                       data: $('form').serialize(),
                       dataType: 'json',
                       success: function(response){
                           var error = response.error;
                           var success = response.success;
                           if(error != "") {
                               $('#alert_message').html(error);
                           }
                           else {
                               $('#alert_message').html(success);
                           }
                       },
                       error: function(jqXhr, json, errorThrown){
                           var error = jqXhr.responseText;
                           $('#alert_message').html(error);
                       }
                   });
       });
     });
  });
   </script>
