$(document).ready(function() {
    $("#SVGLOGO").on({
        mouseenter: function(){
            $(this).css({height: "7.25vh", padding: "0.125vh 1vw", transition: "0.5s"});
        },
        mouseleave: function(){
            $(this).css({height: "6.5vh", padding: "0.5vh 1vw", transition: "0.5s"});
        },
        click: function(){
            $("html, body").animate({scrollTop: 0}, 750);
        }
    });

    var clicked = false;
    $("header nav ul div li").on("click", function() {
        if (clicked === false) {
            clicked = true;
            var navID = this.id;
            var navArray = navID.split('_');
<<<<<<< HEAD
            var offset = $("nav").height();

=======
            var offset = $("header").height();
            
>>>>>>> 8b1223cb2cf6155e769d2fa908ecd5cd9a87672a
            $("html, body").animate({scrollTop: $("."+navArray[1]).offset().top - offset}, 750);

            setTimeout(function(){ clicked = false; }, 750);
        }
    });

    $(".socialicons").on({
        mouseenter: function(){
            switch (this.id) {
                case "spotify-FA":
                    $(".fa-spotify path").css({fill: "rgba(53 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "apple-FA":
                    $(".fa-apple path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "facebook-FA":
                    $(".fa-facebook path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
                    break;
                case "instagram-FA":
                    $(".fa-instagram path").css({fill: "rgba(53, 53, 49, 0.6)", transition: "0.2s"});
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
<<<<<<< HEAD


    var $showsInfo = $('.showInfo');
    var $showList = $('.showList');

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
      url: 'https://rest.bandsintown.com/artists/Moeders%20Mooiste/events?app_id=3588eefe9e412527c83889757754197c&date='+ date.getFullYear() + '-' + AddZero(date.getMonth() + 1) + '-' + date.getDate() + '%2C'+ (date.getFullYear() + 2) +'-05-05',
      type: 'GET',
      success: function(shows) {
      console.log(shows);
      $.each(shows, function(i, show) {
        AddShow(show);
      });
    }
  });
});
=======
    
    $(window).scroll(function(){
        var winScroll = $("body").scrollTop();
        var height = $("body")[0].scrollHeight - $("body")[0].clientHeight;
        var scrolled = (winScroll / height) * 100;
        $("#progressBar").width(scrolled + "%");
    });
    
    $("#progressContainer").on("click", function(e){
        if (clicked === false) {
            clicked = true;
            var width = $("#progressContainer").width();
            var position = e.pageX - $(this).position().left;
            var fraction = (position / width) * 100;
            var percentage = parseFloat(parseFloat(fraction).toFixed(2));
            var pageheight = $("body")[0].scrollHeight - $("body")[0].clientHeight;
            var scrollposition = (pageheight / 100) * percentage;
            $("html, body").animate({scrollTop: scrollposition}, 750);
            
            setTimeout(function(){ clicked = false; }, 750);
        }
    });
});
>>>>>>> 8b1223cb2cf6155e769d2fa908ecd5cd9a87672a
