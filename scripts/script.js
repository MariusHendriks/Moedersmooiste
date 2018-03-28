$(document).ready(function() {
    $("#SVGLOGO").on({
        mouseenter: function(){
            $(this).css({height: "7vh", padding: "0.25vh 1vw", transition: "0.5s"});
        },
        mouseleave: function(){
            $(this).css({height: "5.5vh", padding: "1vh 1vw",transition: "0.5s"});
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
});
