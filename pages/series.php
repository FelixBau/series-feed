<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    $series =  get_series('id', $id);
?>
<div class="jumbotron">
    <h1><b><?php echo $series['name']; ?></b></h1>
</div>
<div class="card">
    <div class="content">
        <b>Produktionsunternehmen</b>
        <hr>
        <?php echo get_producer('id', $series['producerid'])['name']; ?>
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
        <b>Letzte Bearbeitung</b>
        <hr>
        <?php echo $series['last_edit']; ?>
    </div>
</div>