<?php
    if($group['perm_level'] > 3) {
        header("Location: ?p=index");
    }
    if(!isset($_GET['id'])) {
        header("Location: ?p=index");
    }
    $id = $_GET['id'];
    $series =  get_series('id', $id);
?>
<div class="jumbotron">
    <h1><b><?php echo $series['name']; ?></b></h1>
    <i class="material-icons">mouse</i>&nbsp;<?php echo $series['clicks']; ?><br>
    <i class="material-icons">star</i>&nbsp;<?php echo count_ratings($id); ?>
</div>
<div class="card">
    <div class="content">
        
    </div>
</div>