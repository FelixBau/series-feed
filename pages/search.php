<?php
    $input = false;
    if(isset($_POST['q'])) {
        $input = true;
        $search_text = $_POST['q'];
        $search_results = search_database($search_text);
        $row_count = $search_results->num_rows;
    }

    if($input) {
        ?>
        <div class="card">
            <div class="card-body">
                <?php
                    if($row_count == 0)
                    {
                        ?>
                            <b>Es konnten leider keine Ergebnisse f&uuml;r <i>"<?php echo $search_text; ?>"</i> gefunden werden</b>
                        <?php
                        return;
                    }
                ?>
                <b>Es wurden <?php echo $row_count; ?> Ergebnisse f&uuml;r <i>"<?php echo $search_text; ?>"</i> gefunden</b>
            </div>
        </div>
        <br><br>
        <?php
            while($r = $search_results->fetch_assoc())
            {
                ?>
                <div class="card">
                    <div class="card-body">
                        <a href="?p=series&id=<?php echo $r['id']; ?>"><?php echo $r['name']; ?></a>
                        <label class="label label-success"><?php echo $r['genre']; ?></label>
                    </div>
                </div>
                <br><br>
                <?php
            }
    } else {
        ?>
            <form action="?p=search" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="loginModalLabel">Suchen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group label-floating has-info">
                        <label class="control-label">Suche</label>
                        <input name="q" type="text" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Suchen">
                </div>
            </form>
        <?php
    }
?>