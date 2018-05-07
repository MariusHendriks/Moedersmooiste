<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'fotos'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div class="sectionContent">
        <p><?= $module[0]['text']; ?></p>
    </div>
</section>