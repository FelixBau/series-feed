<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=admin");
    }
    $id = $_GET['id'];
    delete_group('id', $id);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Gruppe entfernt!</strong></div>";

    header("Location: ?p=admin");
?>