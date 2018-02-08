<?php
    if($group['perm_level'] > 3) {
        header("Location: ?p=index");
    }
?>
<div class="jumbotron">
    <h1><strong>Administration</strong></h1>
</div>
<div class="card card-nav-tabs">
    <div class="header header-success">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="active">
                        <a href="#users" data-toggle="tab">
                            <i class="material-icons">person</i>
                            Benutzerverwaltung
                        </a>
                    </li>
                    <li>
                        <a href="#groups" data-toggle="tab">
                            <i class="material-icons">group</i>
                            Gruppenverwaltung
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="tab-content">
            <div class="tab-pane active" id="users">
                <!-- Benutzertabelle -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>account_status</th>
                            <th>group</th>
                            <th>last_login</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = get_users();
                            while($user = $users->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><strong><?php echo $user['username']; ?></strong></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo get_account_status($user['account_status']); ?></td>
                                    <?php
                                        $group = get_group('id', $user['group_id']);
                                    ?>
                                    <td><?php echo $group['name']; ?></td>
                                    <td><?php echo get_date($user['last_login']); ?></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Delete Profile" class="btn btn-danger btn-simple btn-xs" href="?p=delete_profile&?id=<?php echo $user['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="groups">
                <!-- Gruppentabelle -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>permission_level</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $groups = get_groups();
                            while($group = $groups->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $group['id']; ?></td>
                                    <td><strong><?php echo $group['name']; ?></strong></td>
                                    <td><?php echo $group['perm_level']; ?></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Delete Group" class="btn btn-danger btn-simple btn-xs" href="?p=delete_group&id=<?php echo $group['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#addGroupModal"><i class="material-icons">group</i>&nbsp;Gruppe hinzuf&uuml;gen</a>
            </div>
        </div>
    </div>
</div>
<!-- Add-Group-Modal -->
<div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="addGroupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="?p=add_group" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addGroupModal">Gruppe hinzuf&uuml;gen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Gruppenname</label>
                                <input name="group_name" type="text" class="form-control" />
                            </div>
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Berechtigungslevel (kleiner 3 = Admin)</label>
                                <input name="perm_level" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Erstellen">
                </div>
            </form>
        </div>
    </div>
</div>