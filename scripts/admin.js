$(document).ready(function(){
    $("#back").on("click", function(){
        $("#all").css({position: "absolute", left: 0})
        var width = $("#all").width();
        $("#all").animate({left: width}, 500, "easeInOutCubic", function(){
            setTimeout(function(){
                window.location = "../";
            }, 500);
        });
    });
    
    $("#menu_logo_link").on("click", function(){
        $("#all").css({position: "absolute", left: 0})
        var width = $("#all").width();
        $("#all").animate({left: width}, 500, "easeInOutCubic", function(){
            setTimeout(function(){
                window.location = "../";
            }, 500);
        });
    });
    
    $("#logout").on("click", function(){
       $("#all").css({position: "absolute", left: 0})
        var width = $("#all").width();
        $("#all").animate({left: width}, 500, "easeInOutCubic", function(){
            setTimeout(function(){
                window.location = "../logout";
            }, 500);
        });
    });
    
    var clicked = false;
    $(".item").on("click", function(){
        if (clicked === false) {
            clicked = true;
            var currentID = $(".active")[0].id;
            var nextID = this.id;

            if (currentID !== nextID) {
                $(".active").removeClass("active");
                $(this).addClass("active");

                var path = "/Moedersmooiste/admin/pages/" + nextID;

                $("#content").hide("slide", { direction: "left" }, 500);

                setTimeout(function(){
                    $("#content").load(path).show("slide", { direction: "left" }, 500);
                }, 500);
            }
            
            setTimeout(function(){
                clicked = false;
            }, 1000);
        }
    });
    
    $("#content").load("/Moedersmooiste/admin/pages/dashboard");
});