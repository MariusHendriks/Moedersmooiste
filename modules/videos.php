<?php
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'videos'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div class="owl-carousel owl-theme">
        <?php
            $links = explode('|', $module[0]['video']);
            
            foreach ($links as $value) {
                ?>
                    <div class="item-video" data-merge="1.5"><a class="owl-video" href="<?= $value ?>"></a></div>
                <?php
            }
        ?>
    </div>

    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                merge:true,
                loop:true,
                margin:10,
                center:true,
                video:true,
                lazyLoad:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items:2,
                    },
                    1000:{
                        items:3,
                    }
                }
            });
        });
    </script>
</section>