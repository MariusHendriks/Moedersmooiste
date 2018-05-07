<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'home'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <h1 id="splashH1"><?= $module[0]['text']; ?></h1>
</section>