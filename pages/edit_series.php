<?php
    if($group['perm_level'] > 3) {
        header("Location: ?p=index");
    }
    if(!isset($_GET['id'])) {
        header("Location: ?p=verwaltung");
    }
    $id = $_GET['id'];
    $series = get_series('id', $id);
?>
<div class="jumbotron">
    <h1><strong>Serie '<?php echo $series['name']; ?>' bearbeiten</strong></h1>
</div>
<div class="card">
    <div class="content">
        <form action="?p=update_series" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group label-floating has-info">
                <label class="control-label">Name</label>
                <input name="name" type="text" class="form-control" value="<?php echo $series['name']; ?>" />
            </div>
            <div class="form-group">
                <label class="control-label">Produktionsfirma</label>
                <select name="producerid" value="<?php echo $series['producerid']; ?>">
                    <?php
                        $producers = get_producers();
                        while($producer = $producers->fetch_assoc()) {
                            if($series['producerid'] == $producer['id']) {
                            ?>
                                <option selected value="<?php echo $producer['id']; ?>"><?php echo $producer['name']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $producer['id']; ?>"><?php echo $producer['name']; ?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Staffeln</label>
                <input name="seasons" type="text" class="form-control" value="<?php echo $series['seasons']; ?>" />
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Folgen</label>
                <input name="episodes" type="text" class="form-control" value="<?php echo $series['episodes']; ?>" />
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Genre</label>
                <input name="genre" type="text" class="form-control" value="<?php echo $series['genre']; ?>" />
            </div>
            <br>
            <input class="btn btn-warning" type="submit" value="Bearbeiten" />
        </form>
    </div>
</div>