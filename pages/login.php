<?php
    if(isset($_POST['username'], $_POST['password'])) {
        $login = login($_POST['username'], md5($_POST['password']));
        switch($login) {
            case 0:
                echo("<div class='alert alert-warning' role='alert'>Das eingegebene Passwort ist falsch</div>");
                break;
            case 1:
                $_SESSION['user'] = $_POST['username'];
                header("Location: ?p=index");
                break;
            case 2:
                echo("<div class='alert alert-danger' role='alert'>Dieser Account ist gesperrt!</div>");
                break;
            case 3:
                echo("<div class='alert alert-warning' role='alert'>Dieser Account ist aktuell noch nicht bestätigt. Bitte prüfe dein Mail-Postfach.</div>");
                break;
        }
    }
?>
<br><br>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="card card-signup">
            <form class="form" method="POST" action="?p=login">
                <div class="content">
                    <center><h4><strong>Einloggen</strong></h4></center>
                    <hr>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <input type="text" class="form-control" placeholder="Benutzername" name="username" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <input type="password" placeholder="Passwort" class="form-control" name="password" />
                    </div>
                </div>
                <div class="footer text-center">
                    <input type="submit" class="btn btn-success" value="Einloggen" />
                    <a href="?p=register" class="btn btn-default btn-simple">Noch keinen Account? <strong>Registrieren!</strong></a>
                </div>
            </form>
        </div>
    </div>
</div>

