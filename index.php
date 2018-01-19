<!DOCTYPE html>
<html>
    <head>
        <?php include('./pages/head.php'); ?>
    </head>
    <body>
        <?php
            if(isset($_GET['p'])) {
                $p = htmlspecialchars($_GET['p']);
            } else {
                $p = 'index';
            }
        ?>
        <?php require_once('./api.php'); ?>
        <?php include('./pages/header.php'); ?>
        <div class="container">
            <?php include('./pages/' . $p . '.php'); ?>
        </div>
    </body>
</html>