<?php
    if(isset($_POST['username'], $_POST['mail_address'], $_POST['password'], $_POST['password_repeat'])) {
        $username = $_POST['username'];
        $mail_address = $_POST['mail_address'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];

        if($password != $password_repeat) {
            echo("<div class='alert alert-danger' role='alert'>Die Passwört stimmen nicht überein!</div>");
        } else {
            $registered = register($username, $mail_address, md5($password));
            if($registered) {
                echo("<div class='alert alert-success' role='alert'>Account erfolgreich erstellt!</div>");
            } else {
                echo("<div class='alert alert-danger' role='alert'>Fehler beim registrieren, bitte versuche es erneut.</div>");
            }
        }
    }
?>
<div class="card card-default">
    <div class="card-body">
        <h1>Registrieren</h1>
        <hr></hr>
        <form method="POST" action="?p=register">
            <h3>
                <div class="form-group label-floating has-info">
                    <label class="control-label">Benutzername</label>
                    <input name="username" type="text" class="form-control" />
                </div>
                <div class="form-group label-floating has-info">
                    <label class="control-label">E-Mail Adresse</label>
                    <input name="mail_address" type="text" class="form-control" />
                </div>
                <div class="form-group label-floating has-info">
                    <label class="control-label">Passwort</label>
                    <input name="password" type="password" class="form-control" />
                </div>
                <div class="form-group label-floating has-info">
                    <label class="control-label">Passwort wiederholen</label>
                    <input name="password_repeat" type="password" class="form-control" />
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Registrieren">
                <a href="?p=index" class="btn btn-default btn-simple">Zur&uuml;ck zur Startseite</a>
            </h3>
        </form>
    </div>
</div>