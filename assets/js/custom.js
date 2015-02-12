// slide show
//an image width 120px + margin left and right 50px
var imageWidth = 170;
var currentImage = 0;

$(document).ready(function() {

	// filter form automatic submit
	$("form#filter select").change(function(){
		$(this).parent().submit();
	});

	// main image change by thumbs
	$(".thumb img").click(function(){
		$(".main-image").attr("src", $(this).attr("src"));
	});

	// slideshow
	// set image count 
	var allImages = $('#slideshow-frame li img').length;
            
	// setup slideshow frame width
	$('#slideshow-frame ul').width(allImages * imageWidth);

	// attach click event to slideshow buttons
	$('.arrow-next').click(function(){
		currentImage++;					// increase image counter

		// if we are at the end let set it to 0
		if(currentImage >= allImages) {
			currentImage = 0;
		}
		setFramePosition(currentImage);
	});

	$('.arrow-prev').click(function(){
		currentImage--;					// decrease image counter
		
		// if we are at the end let set it to 0
		if(currentImage < 0) {
			currentImage = allImages -1;
		}
		setFramePosition(currentImage);
	});
});

// calculate the slideshow frame position and animate it to the new position
var setFramePosition = function(pos) {
	// calculate pixel
	var px = imageWidth * pos * -1;
	// set ul left position
	$('#slideshow-frame ul').animate({ left: px }, 500);
};