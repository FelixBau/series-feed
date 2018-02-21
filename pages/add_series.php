<?php
    if(!isset($_POST['name'], $_POST['producerid'], $_POST['seasons'], $_POST['episodes'], , $_POST['genre'])) {
        header("Location: ?p=adverwaltungmin");
    }

    $name = $_POST['name'];
    $producerid = $_POST['producerid'];
    $seasons = $_POST['seasons'];
    $episodes = $_POST['episodes'];
    $genre = $_POST['genre'];
    add_service($name, $producerid, $seasons, $episodes, $genre);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Streamingdienst hinzugef&uuml;gt!</strong></div>";

    header("Location: ?p=verwaltung");
?>