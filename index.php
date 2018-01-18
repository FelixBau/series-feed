<?php
    if(isset($_GET['p'])) {
        $p = htmlspecialchars($_GET['p']);
    } else {
        $p = 'index';
    }
?>
<!DOCTYPE html>
<html>
    <head>
		<title>SERIES-FEED.COM</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material-kit.css" rel="stylesheet"/>
        <link href="css/custom.css" rel="stylesheet"/>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">  
    </head>
    <body>
        <?php require_once('api.php'); ?>
        <?php include('header.php'); ?>
        <div class="container">
            <?php include('pages/' . $p . '.php'); ?>
        </div>

        <!-- Bootstrap Javascript -->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/material.min.js"></script>
        <script src="js/nouislider.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/material-kit.js" type="text/javascript"></script>
    </body>
</html>