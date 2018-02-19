<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=verwaltung");
    }
    $id = $_GET['id'];
    delete_series('id', $id);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Serie entfernt!</strong></div>";

    header("Location: ?p=verwaltung");
?>