<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=admin");
    }
    $id = $_GET['id'];
    delete_profile('id', $id);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Profil entfernt!</strong></div>";

    header("Location: ?p=admin");
?>