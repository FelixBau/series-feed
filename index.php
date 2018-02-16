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

            if(($p != 'index') && ($p != 'login') && ($p != 'register') && (!isset($_SESSION['user']))) {
                header("Location: ?p=index");
            }
        ?>
        <?php require_once('./api.php'); ?>
        <?php include('./pages/header.php'); ?>

        <!--
        <div class="col-md-2">
            <div class="card">
                <div class="content">
                    <center>
                        <a href="https://series-feed.minewave.de" title="Besucherzaehler"><img src="//c.andyhoppe.com/1517997215" style="border:none" alt="Besucherzaehler" /></a>
                    </center>
                </div>
            </div>
        </div>
        -->
        
        <div class="container">
            <?php include('./pages/' . $p . '.php'); ?>
        </div>
    </body>
</html>