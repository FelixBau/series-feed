<?php
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    $service =  get_streaming_service('id', $id);
?>
<div class="jumbotron">
    <h1><b><?php echo $service['name']; ?></b></h1>
    <p><a href="<?php echo $service['website_link']; ?>"><?php echo $service['website_link']; ?></a></p>
</div>
<?php
    $available_series = get_available_series($service['id']);
    while($series = $available_series->fetch_assoc())
    {
        $s = get_series('id', $series['seriesid']);
        ?>
            <div class="card">
                <div class="content">
                    <b><?php echo $s['name']; ?></b>
                    <br>
                    <hr>
                    <a class="btn btn-custom btn-xs" href="?p=series&id=<?php echo $s['id']; ?>"><i class="material-icons">remove_red_eye</i>&nbsp;Zur Serie</a>
                </div>
            </div>
            <br><br>
        <?php
    }
?>