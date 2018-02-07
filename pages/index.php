<div style="margin-top: 200px;" />
<div class="row">
    <div class="card">
        <div class="content">
            <center><strong><label class="label label-success">TOP 1 - Meistgeklickte Serien</label></strong></center>
            <hr>
            <?php $most = most_clicks(); ?>
            <a href="?p=series&id=<?php echo $most['id']; ?>" class="btn btn-custom btn-block"><?php echo $most['name']; ?></a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card">
        <div class="content">
            <center><strong><label class="label label-success">TOP 1 - Meiste Bewertungen</label></strong></center>
            <hr>
        </div>
    </div>
</div>