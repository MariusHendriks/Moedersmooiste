$(document).ready(function() {
    $("#SVGLOGO").on({
        mouseenter: function(){
            $(this).css({height: "7vh", padding: "0.25vh 1vw", transition: "0.5s"});
        },
        mouseleave: function(){
            $(this).css({height: "5.5vh", padding: "1vh 1vw", transition: "0.5s"});
        },
        click: function(){
            $("html, body").animate({scrollTop: 0}, 750);
        }
    });

    $("header nav ul div li").on("click", function() {
        var navID = this.id;
        var navArray = navID.split('_');
        var offset = $("nav").height();
        $("html, body").animate({scrollTop: $("."+navArray[1]).offset().top - offset}, 750);
    });
    
    $(".socialicons").on({
        mouseenter: function(){
            switch (this.id) {
                case "spotify-FA":
                    $(".fa-spotify path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "apple-FA":
                    $(".fa-apple path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "facebook-FA":
                    $(".fa-facebook path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "instagram-FA":
                    $(".fa-insagram path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "youtube-FA":
                    $(".fa-youtube path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
            }
        },
        mouseleave: function(){
            switch (this.id) {
                case "spotify-FA":
                    $(".fa-spotify path").css({fill: "#353531", transition: "0.2s"});
                    break;
                case "apple-FA":
                    $(".fa-apple path").css({fill: "#353531", transition: "0.2s"});
                    break;
                case "facebook-FA":
                    $(".fa-facebook path").css({fill: "#353531", transition: "0.2s"});
                    break;
                case "instagram-FA":
                    $(".fa-instagram path").css({fill: "#353531", transition: "0.2s"});
                    break;
                case "youtube-FA":
                    $(".fa-youtube path").css({fill: "#353531", transition: "0.2s"});
                    break;
            }
        },
        click: function(){
            switch (this.id) {
                case "spotify-FA":
                    $("<a>").attr("href", "https://open.spotify.com/artist/6SHBYZg6Ca2vp2R70ccRqL").attr("target", "_blank")[0].click();
                    break;
                case "apple-FA":
                    $("<a>").attr("href", "https://itunes.apple.com/nl/artist/moeders-mooiste/id1044355913").attr("target", "_blank")[0].click();
                    break;
                case "facebook-FA":
                    $("<a>").attr("href", "http://www.facebook.com/moedersmooisteband").attr("target", "_blank")[0].click();
                    break;
                case "instagram-FA":
                    $("<a>").attr("href", "http://www.instagram.com/moedersmooisteband").attr("target", "_blank")[0].click();
                    break;
                case "youtube-FA":
                    $("<a>").attr("href", "https://www.youtube.com/channel/UCTYOOttQxXYXiz0GksJdzoA/videos").attr("target", "_blank")[0].click();
                    break;
            }
        }
    });
});