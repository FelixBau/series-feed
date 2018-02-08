<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    if($user['id'] != $id) {
        header("Location: ?p=index");
    }
?>
<div class="jumbotron">
    <h1><strong>Benutzerprofil</strong></h1>
</div>
<div class="card">
    <div class="card-body">
        <label class="label label-success">Benutzername</label>&nbsp;
        <b><?php echo $user['username']; ?></b>
    </div>
</div>
<br><br>
<div class="card">
    <div class="card-body">
        <label class="label label-success">e-Mail</label>&nbsp;
        <?php echo $user['email']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="card-body">
        <label class="label label-success">Account-Status</label>&nbsp;
        <?php echo get_account_status($user['account_status']); ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="card-body">
        <label class="label label-success">Gruppe</label>&nbsp;
        <?php echo $group['name']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="card-body">
        <label class="label label-success">Letzter Login</label>&nbsp;
        <?php echo get_date($user['last_login']); ?>
    </div>
</div>