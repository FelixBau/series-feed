<?php
    if(!isset($_POST['group_name'], $_POST['perm_level'])) {
        header("Location: ?p=admin");
    }

    $group_name = $_POST['group_name'];
    $perm_level = $_POST['perm_level'];
    add_group($group_name, $perm_level);

    $_SESSION['notification'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Gruppe hinzugef&uuml;gt!</strong></div>";

    header("Location: ?p=admin");
?>