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
      <div class="musicbox">
        <iframe src="https://open.spotify.com/embed/album/5eIn77N9it9w7jHzT8NlMs" width="300" height="300" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
      </div>
      <div class="musicbox">
        <iframe src="https://open.spotify.com/embed/album/5hjre8nzrsXRDvEzWFQsM4" width="300" height="300" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
      </div>
      <div class="musicbox">
        <iframe src="https://open.spotify.com/embed/album/2a5t31PJc9i8nA3yRrS45C" width="300" height="300" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
      </div>
    </div>
</section>
