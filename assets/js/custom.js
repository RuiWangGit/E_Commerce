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



// cart page 
$(document).ready(function(){
	var tmp;
	var save; 
	var id;

	// console.log("tttt");
	$(document).on("click", "a#update-link", function(){
		// console.log("tttt2222");
		 // tmp = $(this).parent().children('p');
		 tmp = $(this).parent();
		
		// save = $('#qty-remove');
		// console.log($(this));

		id =$(this).attr('href');
		console.log('post url:',id);
		console.log('tag:', tmp);
		
		
		tmp.html("<form id='saveForm' action='"+id+"' method='post'><input type='text' style='width:45px; height:26px;' name='quantity' value=''><input type='hidden' name='submit' value='save'><input style=' vertical-align:top; margin-left: 20px; ' type='submit' value='save'></form>" );
		// save.html("");// remove update keyword
		
		return false;	
	});


	$(document).on('submit', 'form#saveForm', function() {
		console.log("++++++++++");
		// var tmp1 = $(this).parent().parent().parent().parent();
		// console.log(tmp1);
		// console.log($(this));
		$.ajax({
			url: $(this).attr("action"),
			type: "post",
			data: $(this).serialize()
		}).done(function(data){

			console.log(data);
			$('#table-input').html(data);
			// tmp1.html(data);
		})
		return false;
	});
});


// payment process
function disable_enable(f)
    {

        //console.log(f);
        if(document.getElementById("checkbox").checked != 1)
        {
           document.getElementById("checkbox-hidden").setAttribute('value', 0);  
           f.billing_address.value = "";
            f.billing_address2.value = "";
            f.billing_state.value = "";
            f.billing_city.value = "";
            f.billing_zipcode.value = "";
            document.getElementsByName("billing_address")[0].removeAttribute("disabled");
            document.getElementsByName("billing_address2")[0].removeAttribute("disabled");
            document.getElementsByName("billing_state")[0].removeAttribute("disabled");
            document.getElementsByName("billing_city")[0].removeAttribute("disabled");
            document.getElementsByName("billing_zipcode")[0].removeAttribute("disabled");
            
        }
        else
        {
        
            document.getElementById("checkbox-hidden").setAttribute('value', 1); 
            
            f.billing_address.value = f.shipping_address.value;
             f.billing_address2.value = f.shipping_address2.value;
             f.billing_state.value = f.shipping_state.value;
             f.billing_city.value = f.shipping_city.value;
             f.billing_zipcode.value = f.shipping_zipcode.value;
            document.getElementsByName("billing_address")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_address2")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_state")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_city")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_zipcode")[0].setAttribute("disabled","disabled");

            
         
        }
    }