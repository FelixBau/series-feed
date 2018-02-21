<?php
    if(!isset($_POST['name'])) {
        header("Location: ?p=admin");
    }

    $name= $_POST['name'];
    add_producer($name);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Produktionsfirma hinzugef&uuml;gt!</strong></div>";

    header("Location: ?p=verwaltung");
?>