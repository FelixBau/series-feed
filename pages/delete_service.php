<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=verwaltung");
    }
    $id = $_GET['id'];
    delete_service('id', $id);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Streamingdienst entfernt!</strong></div>";

    header("Location: ?p=verwaltung");
?>