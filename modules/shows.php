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
    <script>
        var $showsInfo = $('.showInfo');
        var $showList = $('.showList');
        var AJAXurl = "<?= $module[0]['text']; ?>";
        var date = new Date();

        function AddZero(n){
            return n < 10 ? '0' + n :'' + n;
        }

        function CheckAvaibleTickets(show) {
            if (show.offers.length >= 1) {
                return '<a href="'+ show.offers[0].url +'" class="showMoreInfo">'+ show.offers[0].type +'</a></div>';
            }
            else {
                return '<a href="'+ show.url +'" class="showMoreInfo">Meer info</a></div>';
            }
        }

        function AddShow(show) {
            var showDate = new Date(show.datetime).toUTCString().split(" ").slice(1,4).join(" ");
            $showList.append('<div class="showInfo"><p>'+ showDate +'</p><p>'+ show.venue.name +
            '</p><p>'+ show.venue.city +', '+ show.venue.country +'</p>' + CheckAvaibleTickets(show));
        }

        $.ajax({
            url: AJAXurl + '&date=' + date.getFullYear() + '-' + AddZero(date.getMonth() + 1) + '-' + AddZero(date.getDate() + 1) + '%2C'+ (date.getFullYear() + 2) +'-05-05',
            type: 'GET',
            success: function(shows) {
                $.each(shows, function(i, show) {
                    AddShow(show);
                });
            }
        });
    </script>
</section>
