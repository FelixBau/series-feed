<?php
    if(!isset($_POST['name'], $_POST['website_link'], $_POST['price'])) {
        header("Location: ?p=admin");
    }

    $name = $_POST['name'];
    $website_link = $_POST['website_link'];
    $price = $_POST['price'];
    add_service($name, $website_link, $price);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Streamingdienst hinzugef&uuml;gt!</strong></div>";

    header("Location: ?p=verwaltung");
?>