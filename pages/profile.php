<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    if($user['id'] != $id) {
        header("Location: ?p=index");
    }
    echo $id;
?>