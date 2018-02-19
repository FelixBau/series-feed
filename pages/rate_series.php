<?php
    if(!isset($_POST['seriesid'], $_POST['userid'], $_POST['stars'], $_POST['text'])) {
        header("Location: ?p=index");
    }

    $seriesid = $_POST['seriesid'];
    $userid = $_POST['userid'];
    $stars = $_POST['stars'];
    $text = $_POST['text'];

    add_rating($seriesid, $userid, $stars, $text);
    
    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Bewertung abgegeben!</strong></div>";

    header("Location: ?p=series&id=" . $seriesid);
?>