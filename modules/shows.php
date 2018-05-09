<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'shows'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div class="showList">
        
    </div>
</section>
