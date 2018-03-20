<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    $series =  get_series('id', $id);
    click_series('id', $id);
?>
<div class="jumbotron">
    <h1><b><?php echo $series['name']; ?></b></h1>
    <i class="material-icons">mouse</i>&nbsp;<?php echo $series['clicks']; ?><br>
    <i class="material-icons">star</i>&nbsp;<?php echo count_ratings($id); ?>
</div>
<div class="card">
    <div class="content">
        <b>Produktionsunternehmen</b>
        <hr>
        <?php 
            $producer = get_producer('id', $series['producerid']);
            echo $producer['name'];
        ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="content">
        <b>Staffeln</b>
        <hr>
        <?php echo $series['seasons']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="content">
        <b>Folgen</b>
        <hr>
        <?php echo $series['episodes']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="content">
        <b>Genre</b>
        <hr>
        <?php echo $series['genre']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="content">
        <b>Bewertungen</b>
        <hr>
        <?php
            if(count_ratings($id) != 0) {
                $ratings = get_ratings('seriesid', $id);
                while($r = $ratings->fetch_assoc()) {
                    $rating_user = get_user('id', $r['userid']);
                    ?>
                        <div class="card">
                            <div class="content">
                                <label class="label label-warning"><?php echo $r['stars'] . ' Sterne'; ?></label>
                                <label class="label label-info"><?php echo get_date($r['rating_date']); ?></label>
                                <label class="label label-success"><?php echo $rating_user['username']; ?></label>
                                <hr>
                                <?php echo $r['text']; ?>
                            </div>
                        </div>
                        <br><br>
                    <?php
                }
            } else {
                echo 'Keine Bewertungen vorhanden';
            }

            if(isset($_SESSION['user']) && !has_rated($id, $user['id'])) {
                ?>
    	            <div class="card">
                        <div class="content">
                            <b>Bewertung schreiben</b>
                            <hr>
                            <form action="?p=rate_series" method="POST">
                                <input type="hidden" name="seriesid" value="<?php echo $id; ?>">
                                <input type="hidden" name="userid" value="<?php echo $user['id']; ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">star</i>
                                    </span>
                                    <select name="stars">
                                        <option value="0">0 Stern</option>
                                        <option value="1">1 Stern</option>
                                        <option value="2">2 Stern</option>
                                        <option value="3">3 Stern</option>
                                        <option value="4">4 Stern</option>
                                        <option value="5">5 Stern</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">textsms</i>
                                    </span>
                                    <input name="text" type="text" class="form-control" placeholder="Bewertungs Text">
                                </div>
                                <br>
                                <input type="submit" class="btn btn-success btn-sm" value="Bewerten">
                            </form>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>
<br><br>
<?php
    if(isset($group)) {
        if($group['perm_level'] < 3) {
        ?>
            <div class="card">
                <div class="content">
                    <a href="?p=edit_series&id=<?php echo $id; ?>" class="btn btn-warning"><i class="material-icons">edit</i>&nbsp;Serie bearbeiten</a>
                </div>
            </div>
            <br><br>
        <?php
        }
    }
?>