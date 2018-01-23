<?php
    if($group['perm_level'] > 3) {
        header("Location: ?p=index");
    }
?>
    <h1>Serienverwaltung</h1>
    <hr></hr>
    <div class="card card-nav-tabs">
    <div class="header header-success">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
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
                                        <a type="button" rel="tooltip" title="Edit Producer" class="btn btn-success btn-simple btn-xs" href="edit_producer.php?producerid=<?php echo $producer['id']; ?>"><i class="fa fa-edit"></i></a>
                                        <a type="button" rel="tooltip" title="Delete Producer" class="btn btn-danger btn-simple btn-xs" href="delete_producer.php?producerid=<?php echo $producer['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
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
                                        <a type="button" rel="tooltip" title="Edit Series" class="btn btn-success btn-simple btn-xs" href="edit_series.php?seriesid=<?php echo $series['id']; ?>"><i class="fa fa-edit"></i></a>
                                        <a type="button" rel="tooltip" title="Delete Series" class="btn btn-danger btn-simple btn-xs" href="delete_series.php?seriesid=<?php echo $series['id']; ?>"><i class="fa fa-times"></i></a>
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
                                    <td><strong><a href="service.php?id=<?php echo $service['id']; ?>"><?php echo $service['name']; ?></a></strong></td>
                                    <td><a href="<?php echo $service['website_link']; ?>"><?php echo $service['website_link']; ?></a></td>
                                    <td><?php echo $service['price_string']; ?></td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" title="Edit Service" class="btn btn-success btn-simple btn-xs" href="edit_service.php?serviceid=<?php echo $service['id']; ?>"><i class="fa fa-edit"></i></a>
                                        <a type="button" rel="tooltip" title="Delete Service" class="btn btn-danger btn-simple btn-xs" href="delete_service.php?serviceid=<?php echo $service['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>