<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'fotos'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div id="instafeed">

    </div>
</section>
