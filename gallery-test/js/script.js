let slideShow = (i) => {
    myapi = "http://www.bharatividyapeethdistancemba.com/gallery-test/js/images.json";
    var i;      
    fetch(myapi).then(response => response.json())
    .then(gotData)
    .catch(err => console.error(err));

     function gotData (array) {
     var images = array.images;
     //console.log(images);
        	for(let i=0; i<images.length; i++){
    	        $("#thumbnail").append("<img src=" + images[i].url_thumb + " data-cnt =" + i + ">");
    	    }

    	function mainImgLoad (i) {
    	$('#thumbnail > img').removeClass("clicked")
        $('#thumbnail > img:nth-child(' + (parseInt(i)+1) + ')').addClass("clicked");
    	$("#main").children().remove();
        $("#main").append("<img src=" + images[i].url_big + " data-cnt =" + i + " alt=" + images[i].url_big + "><p>" + images[i].caption + "</p>");
        }
		mainImgLoad(i);

	$("#nextBtn").click(function() {
		if (i < images.length-1) { i++; } else { i = 0 };
        mainImgLoad(i);
    });
    
    $("#prevBtn").click(function() {
        if (i > 0) { i--; } else { i =  images.length-1};
        mainImgLoad(i);
    });

    $('#thumbnail').on("click", "img", function() {
        i = $(this).attr("data-cnt");
        mainImgLoad(i);
    });
}}