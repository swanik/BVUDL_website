$.getJSON("js/images.json", function(data) {
    var images = data.images;
    var imgrotatetime = 5000;
    var stayTime;
    $.each(images, function(i, j) {
        $("#thumbnail").append("<img src=" + j.url_thumb + " data-cnt =" + i + ">");
    });
   // var i = 0;
    function mainImg(i) {
        var k = parseInt(i) + 1;
        $("#main").children().remove();
        $("#main").append("<img src=" + images[i].url_big + " data-cnt =" + i + " alt=" + images[i].url_big + "><p>" + images[i].caption + "</p>");
        $('#thumbnail > img').removeClass("clicked")
        $('#thumbnail > img:nth-child(' + k + ')').addClass("clicked");
   
    var changeImage = function() {
        myStopFunction();
        var i = $(this).attr("data-cnt");
        mainImg(i);
        setTimeout(playImages);
    };

    var next = function() {
        var i = $("#main > img").attr("data-cnt");
        if (i < images.length - 1) { i++; } else { i = 0 }
        mainImg(i)
    };

    function playImages() {
        stayTime = setInterval(next, imgrotatetime);
    }

    function myStopFunction() {
        clearInterval(stayTime);
    }

    $('#thumbnail').on("click", "img", changeImage);

    $("#nextBtn").click(function() {
        myStopFunction();
        next();
        setTimeout(playImages, 100);
    });

    $("#prevBtn").click(function() {
        myStopFunction();
        var i = $("#main > img").attr("data-cnt");
        if (i > 0) { i--; } else { i = images.length - 1 }
        mainImg(i);
        setTimeout(playImages, 100);
    });

    playImages();
 }

    mainImg(i);
});