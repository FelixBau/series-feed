<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=admin");
    }
    $id = $_GET['id'];
    delete_profile('id', $id);
    header("Location: ?p=admin");
?>