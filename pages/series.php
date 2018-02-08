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
    <i class="material-icons">star</i>&nbsp;<?php echo get_ratings($id); ?>
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
        <b>Letzte Bearbeitung</b>
        <hr>
        <?php echo $series['last_edit']; ?>
    </div>
</div>
<br><br>
<div class="card">
    <div class="content">
        <form action="?p=rating" mmethod="POST">
            
        </form>
    </div>
</div>