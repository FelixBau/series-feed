<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    echo $id;
?>