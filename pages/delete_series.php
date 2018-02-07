<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=verwaltung");
    }
    $id = $_GET['id'];
    delete_series('id', $id);
    header("Location: ?p=verwaltung");
?>