<nav class="navbar navbar-custom" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="images/nav_icon.png" width="32px" height="32px">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    if(isset($_SESSION['user']))
                    {
                        $streaming_services = get_streaming_services();
                        while($service = $streaming_services->fetch_assoc())
                        {
                            ?>
                                <li><a href="service.php?id=<?php echo $service['id']; ?>"><?php echo $service['name']; ?></a></li>
                            <?php
                        }
                        ?>
                            <li><a href="compare.php"><i class="material-icons">compare_arrows</i>&nbsp;Serien vergleichen</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#searchModal"><i class="material-icons">search</i></a></li>
                        <?php
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['user']))
                    {
                        $user = get_user('username', $_SESSION['user']);
                        $group = get_group('id', $user['group_id']);

                        if($group['perm_level'] < 3) {
                            ?>
                                <li><a href="serienverwaltung.php"><i class="material-icons">local_movies</i>&nbsp;Serienverwaltung</a></li>
                                <li><a href="administration.php"><i class="material-icons">settings</i>&nbsp;Administration</a></li>
                            <?php
                        }
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i><?php echo $_SESSION['user']; ?><b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.php?user=<?php echo $user['id']; ?>">Benutzerprofil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="functions/logout.php">Ausloggen</a></li>
                                </ul>
                            </li>
                        <?php
                    } else{
                        echo '<li><a href="?p=login"><i class="material-icons">person</i>&nbsp;Anmelden</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
