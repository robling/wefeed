$(document).ready(function() {

    var modifyDes = function($elem) {
       des = $elem.text();
       des = des.length <= 35? des: des.slice(0,34) + "...";
       $elem.text(des);
   };
   $(".author_des").each(function() {
        modifyDes($(this));
   });


   $("#logo").hover(function() {
        $(this).animate({marginLeft: "+=30px"}, 600);
    }, function() {
        $(this).animate({marginLeft: "-=30px"}, 600);
    });


    //hover导航时动画
    $(".nav a").hover(function() {
        $(this).animate({background: "#ff7b3a"}, 600);
    }, function() {
        // $(this).animate({opacity: 1.0}, 300);
    });
    //hover某个作者时的动画
    // $(".one_author").hover(function() {
    //     $(this).css("border-color", "#f8800b");
    // }, function() {
    //     $(this).closest('li').css("border-color", "#f1f1eb");
    // });

    $(".one_author .avatar").hover(function(){

    }, function() {

    });

    $(".author_page .avatar").hover(function() {
        $(this).parent().next().slideDown(400);
        return false;
    }, function() {
        $(this).parent().next().slideUp(300);
    });


    $(".change").click(function(e) {
        url = $(this).attr('href') + "?get=0";
        $.ajax({
            type: "get",
            url: url,
            dataType : "xml",
            beforeSend: function() {
                $(".loading").show();
            },
            complete: function() {
                $(".loading").hide();
            },
            success: function(xml) {
                ul = $(xml).children("root").children("ul").text();
                href = $(xml).children("root").children("href").text();
                $(".authors ul").replaceWith(ul);
                $(".change").attr('href',href);
                $(".author_des").each(function() {
                    modifyDes($(this));
                });
            }
        });
        return false;
    });
});
