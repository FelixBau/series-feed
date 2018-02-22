<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $producerid = $_POST['producerid'];
    $seasons = $_POST['seasons'];
    $episodes = $_POST['episodes'];
    $genre = $_POST['genre'];
    update_series($id, $name, $producerid, $seasons, $episodes, $genre);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>&Auml;nderungen gespeichert!</strong></div>";
    
    header("Location: ?p=verwaltung");
?>