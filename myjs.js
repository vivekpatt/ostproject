$(document).ready(function(){
alert("alert from external file");
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

