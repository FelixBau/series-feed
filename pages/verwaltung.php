<?php
    if($group['perm_level'] > 3) {
        header("Location: ?p=index");
    }
?>
    <div class="jumbotron">
        <h1><strong>Serienverwaltung</strong></h1>
    </div>
    <div class="card card-nav-tabs">
    <div class="header header-success">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="active">
                        <a href="#series" data-toggle="tab">
                            <i class="material-icons">local_movies</i>
                            Serien
                        </a>
                    </li>
                    <li>
                        <a href="#streaming_services" data-toggle="tab">
                            <i class="material-icons">receipt</i>
                            Streamingdienste
                        </a>
                    </li>
                    <li>
                        <a href="#producers" data-toggle="tab">
                            <i class="material-icons">camera_enhance</i>
                            Produktionsfirmen
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="tab-content">
            <div class="tab-pane" id="producers">
                <!-- Produktionsfirmen-Tabelle -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $producers = get_producers();
                            while($producer = $producers->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $producer['id']; ?></td>
                                    <td><strong><?php echo $producer['name']; ?></strong></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Delete Producer" class="btn btn-danger btn-simple btn-xs" href="?p=delete_producer&id=<?php echo $producer['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#addProducerModal"><i class="material-icons">camera_enhance</i>&nbsp;Produktionsfirma hinzuf&uuml;gen</a>
            </div>
            <div class="tab-pane active" id="series">
                <!-- Serien-Tabelle -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>producer</th>
                            <th>seasons</th>
                            <th>episodes</th>
                            <th>genre</th>
                            <th>last_edit</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $all_series = get_all_series();
                            while($series = $all_series->fetch_assoc())
                            {
                                $producer = get_producer('id', $series['producerid']);
                                ?>
                                <tr>
                                    <td><?php echo $series['id']; ?></td>
                                    <td><strong><?php echo $series['name']; ?></strong></td>
                                    <td><?php echo $producer['name']; ?></td>
                                    <td><?php echo $series['seasons']; ?></td>
                                    <td><?php echo $series['episodes']; ?></td>
                                    <td><?php echo $series['genre']; ?></td>
                                    <td><?php echo $series['last_edit']; ?></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Edit Series" class="btn btn-success btn-simple btn-xs" href="?p=edit_series&id=<?php echo $series['id']; ?>"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="streaming_services">
                <!-- Streaming-Dienst-Tabelle -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>website_link</th>
                            <th>price</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $streaming_services = get_streaming_services();
                            while($service = $streaming_services->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $service['id']; ?></td>
                                    <td><strong><a href="?p=service&id=<?php echo $service['id']; ?>"><?php echo $service['name']; ?></a></strong></td>
                                    <td><a href="<?php echo $service['website_link']; ?>"><?php echo $service['website_link']; ?></a></td>
                                    <td><?php echo $service['price_string']; ?></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Delete Service" class="btn btn-danger btn-simple btn-xs" href="?p=delete_service&id=<?php echo $service['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#addServiceModal"><i class="material-icons">view_compact</i>&nbsp;Streamingdienst hinzuf&uuml;gen</a>
            </div>
        </div>
    </div>
</div>
<!-- Add-Producer-Modal -->
<div class="modal fade" id="addProducerModal" tabindex="-1" role="dialog" aria-labelledby="addProducerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="?p=add_producer" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addGroupModal">Produktionsfirma hinzuf&uuml;gen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Hinzuf&uuml;gen">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add-Service-Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="?p=add_service" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addGroupModal">Streamingdienst hinzuf&uuml;gen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" class="form-control" />
                            </div>
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Link zur Webseite</label>
                                <input name="website_link" type="text" class="form-control" />
                            </div>
                            <div class="form-group label-floating has-info">
                                <label class="control-label">Preis-Text</label>
                                <input name="price" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Hinzuf&uuml;gen">
                </div>
            </form>
        </div>
    </div>
</div>