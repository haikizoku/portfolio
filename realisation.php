<!DOCTYPE html>
<html>
<head>
    <title>Presentation</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include('menu.php') ?>
<!--partie  Realisation---->
<div class="presentation">
    <div class="container txtcomp">

        <div class="row" id="divide5">
            <div class="col-md-12"></div>
        </div>

        <div class="row Aligner">
            <div class=" col-md-12 labelcpt">Mes Projets</div>

            <div class ="w-100 d-sm-none">
                <div class="col-md-12" id="divide1"></div>
            </div>
            <div class ="w-100 d-none d-sm-block">
                <div class="col-md-12" id="divide5"></div>
            </div>

        </div>
        <div class="row Aligner">
            <div class=" col-md-6 text-center">
                <a href="http://dashboard.gregorynorvene.com/" target="_blank"><img src="img/dashboard2.jpg" alt="react_app"
                    srcset="img/dashboard2.jpg 320w,
                    img/dashboard2.jpg 640w,
                    img/dashboard2.jpg 1280w,
                    img/dashboard2.jpg 1980w"
                    sizes="100vw" ></a>

            </div>

            <div class ="w-100 d-sm-none">
                <div class="col-md-12" id="divide1"></div>
            </div>

            <div class="col-md-6 ">
                <span>
                    <h2>Application React:</h2>
                    <ul style="list-style-type: square; text-align: left">
                        <li>R&eacute;alise avec Mat&eacute;rial-Ui,google-chart</li>
                        <li>Il se connecte&nbsp; à une api r&eacute;alis&eacute; sous adonis js</li>
                        <li>Il est sotck&eacute; sur un s3 aws</li>
                    </ul>
                    </span>
            </div>

            <div class ="w-100 d-sm-none">
                <div class="col-md-12" id="divide1"></div>
            </div>

            <div class ="w-100 d-none d-sm-block">
                <div class="col-md-12" id="divide5"></div>
            </div>

        </div>




        <div class="row Aligner">
            <div class=" col-md-6 text-center">

                <a class="animated_link" href="https://hub.docker.com/r/gnorvene1/node_python_aws" target="_blank">Image docker réalisée</a>

            </div>

            <div class ="w-100 d-sm-none">
                <div class="col-md-12" id="divide1"></div>
            </div>

            <div class="col-md-6 ">
                <span>
                    <h2>Image docker utilisé pour la livraison </h2>
                    <ul style="list-style-type: square; text-align: left">
                        <li>node 13 </li>
                        <li>pyton</li>
                        <li>aws cli </li>
                    </ul>
                    </span>

            </div>

            <div class ="w-100 d-sm-none">
                <div class="col-md-12" id="divide1"></div>
            </div>

        </div>


    </div>
</div>
<?php include('footer.php') ?>
</body>
</html>