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

            if(($p != 'index') && ($p != 'login') && ($p != 'register') && ($p != 'series') && (!isset($_SESSION['user']))) {
                header("Location: ?p=index");
            }
        ?>
        <?php require_once('./api.php'); ?>
        <?php include('./pages/header.php'); ?>
        <div class="container">
            <?php
                if(isset($_SESSION['notification'])) {
                    echo $_SESSION['notification'];
                    unset($_SESSION['notification']);
                }

                $page = './pages/' . $p . '.php';
                $page_exists = file_exists($page);

                if(!$page_exists) {
                    $page = './pages/not_found.php';
                }

                include($page); 
            ?>
        </div>
    </body>
</html>