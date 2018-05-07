<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'band'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionContainer">
        <div class="sectionHeader">
            <h1><?= $module[0]['title']; ?></h1>
        </div>
        <div class="sectionContent">
            <p><?= $module[0]['text']; ?></p>
        </div>
        <div class="bandFotos">
            <div class="portret">
                <div class="bandFoto portretKoen">
                    <div class="portretBio">
                        <p class="portretBioN">Koen</p>
                        <p class="portretBioR">Bassist</p>
                    </div>
                </div>
            </div>
            <div class="portret">
                <div class="bandFoto portretBram">
                    <div class="portretBio">
                        <p class="portretBioN">Bram</p>
                        <p class="portretBioR">Gitarist</p>
                    </div>
                </div>
            </div>
            <div class="portret">
                <div class="bandFoto portretGeert">
                    <div class="portretBio">
                        <p class="portretBioN">Geert</p>
                        <p class="portretBioR">Zanger</p>
                    </div>
                </div>
            </div>
            <div class="portret">
                <div class="bandFoto portretLuuk">
                    <div class="portretBio">
                        <p class="portretBioN">Luuk</p>
                        <p class="portretBioR">Drummer</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>