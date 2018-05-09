<?php
session_start();
include_once('../../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
?>
<main>
    <div class="gridHeader">
        <h1>Dashboard</h1>
    </div>
    <div class="gridContent dashboardGrid">
        <div class="dashboardGridTop">
            <div class="dashboardGridTopTop">
                <h2 class="headerDashboardH2">Welkom <?= $_SESSION['username']; ?>!</h2>
                <p class="headerDashboardP">Hier zijn wat snelkoppelingen voor jou om je snel van start te kunnen laten gaan:</p>
            </div>
            <div class="dashboardGridTopBottom dashboardGridTopBottomLeft">
                <div class="dashboardGridTopBottomChild"><span class="GOTOaccount">Account</span></div>
                <div class="dashboardGridTopBottomChild"><span class="GOTOlist">Lijst</span></div>
                <div class="dashboardGridTopBottomChild"></div>
                <div class="dashboardGridTopBottomChild"><span class="GOTOlogout">Uitloggen</span></div>
            </div>
            <div class="dashboardGridTopBottom dashboardGridTopBottomCenter">
                <?php
                    if ($_SESSION['rank'] >= 1) {  
                ?>
                <div class="dashboardGridTopBottomChild"><span class="GOTOtoevoegen">Toevoegen</span></div>
                <div class="dashboardGridTopBottomChild"><span class="GOTOwijzigen">Wijzigen</span></div>
                <div class="dashboardGridTopBottomChild"><span class="GOTOverwijderen">Verwijderen</span></div>
                <?php
                    }
                ?>
            </div>
            <div class="dashboardGridTopBottom dashboardGridTopBottomRight">
                <?php
                    if ($_SESSION['rank'] == 2) {  
                ?>
                <div class="dashboardGridTopBottomChild"><span class="GOTOrank">Ranks aanpassen</span></div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="dashboardGridBottomLeft">
            <textarea placeholder="Typ hier in je sticky note" id="note"></textarea>
        </div>
        <div class="dashboardGridBottomCenter">
            <div class="weather"><a href="https://www.accuweather.com/nl/nl/nederland/250282/weather-forecast/250282" class="aw-widget-legal"></a><div id="awcc1523300915996" class="aw-widget-current" data-locationkey="" data-unit="c" data-language="nl" data-useip="true" data-uid="awcc1523300915996"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script></div>
        </div>
        <div class="dashboardGridBottomRight">
            <iframe src="https://freesecure.timeanddate.com/clock/i66ukx3v/n1300/szw200/szh200/hoc000/hbw2/cf100/hgr0/fav0/fiv0/mqc353531/mqs2/mql3/mqw4/mqd70/mhc353531/mhs2/mhl3/mhw4/mhd70/mmv0/hsc000" frameborder="0" width="200" height="200"></iframe>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var note = "";
            if (localStorage.getItem("note") != null){
                note = localStorage.getItem("note"); 
                $("#note").val(note);
            }
            else {
                localStorage.setItem("note", note);
            }

            var noteTimer = null;
            $("#note").keydown(function(){
                clearTimeout(noteTimer); 
                noteTimer = setTimeout(function(){
                    note = $("#note").val();
                    localStorage.setItem("note", note);
                }, 500)
            });

            $(".dashboardGridTopBottomChild span").on("click", function(){
                var clickedClass = $(this).attr("class");
                clickedClass = "#" + clickedClass.substring(4, 100);
                
                if (clickedClass == "#logout") {
                    $("#all").css({position: "absolute", left: 0})
                    var width = $("#all").width();
                    $("#all").animate({left: width}, 500, "easeInOutCubic", function(){
                        setTimeout(function(){
                            window.location = "/Moedersmooiste/logout";
                        }, 500);
                    });
                }
                else {
                    $(clickedClass).click();
                }
            });
        });
    </script>
</main>
<?php
}
else {
    header('Location: /Moedersmooiste/login');
    exit();
}
?>