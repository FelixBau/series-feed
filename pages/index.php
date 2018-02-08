<div style="margin-top: 200px;" />
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="content">
                <center><strong><label class="label label-success">TOP 1 - Meistgeklickte Serien</label></strong></center>
                <hr>
                <?php $most_clicks = most_clicks(); ?>
                <a href="?p=series&id=<?php echo $most_clicks['id']; ?>" class="btn btn-custom btn-block"><?php echo $most_clicks['name']; ?></a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="content">
                <?php 
                    $most_ratings = most_ratings();
                    $series = get_series('id', $most_ratings['seriesid']);
                ?>
                <center>
                    <strong>
                        <label class="label label-success">TOP 1 - Meiste Bewertungen</label>
                        <label class="label label-warning"><?php echo 'Durchschnittlich ' . +$most_ratings['seriesAvg'] . ' Sterne' ?></label>
                    </strong>
                </center>
                <hr>
                <a href="?p=series&id=<?php echo $most_ratings['seriesid']; ?>" class="btn btn-custom btn-block"><?php echo $series['name']; ?></a>
            </div>
        </div>
    </div>
</div>