$(document).ready(function(){
alert("star");
	$(".starbutton").click(function(){
		if ($(this).children().hasClass("glyphicon-star-empty")) {
			$(this).children().removeClass("glyphicon-star-empty");
			$(this).children().addClass("glyphicon-star");
		}
		else{
			$(this).children().removeClass("glyphicon-star");
			$(this).children().addClass("glyphicon-star-empty");
		}
		
		  
	});
});

