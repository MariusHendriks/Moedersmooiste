<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'muziek'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div class="sectionContent musicSection">
        <?php
            $links = explode('|', $module[0]['text']);

            foreach ($links as $value) {
        ?>
                <div class="musicbox">
                    <iframe src="<?= $value; ?>" width="300" height="300" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                  </div>
        <?php
            }
        ?>
    </div>
</section>
