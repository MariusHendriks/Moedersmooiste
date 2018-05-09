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
                    <div class="item-video" data-merge="1.3"><a class="owl-video" href="<?= $value ?>"></a></div>
                <?php
            }
        ?>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
          center: true,
          video:true,
          loop:true,
          margin:20,
          lazyLoad:true,
          merge:true,
          responsiveClass:true,
          responsive:{
              0:{
                  items:1,
              },
              600:{
                  items:3,
              },
              1000:{
                  items:5,
              }
            }
        });
      });
    </script>
</section>