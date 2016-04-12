$(document).ready(function(){
alert("alert from external file");
	$(".starbutton").click(function(){
		alert('call');

		if ($(this).children().hasClass("glyphicon-star-empty")) {
			$(this).children().removeClass("glyphicon-star-empty");
			$(this).children().addClass("glyphicon-star");
			var domrow = $(this).parent().parent().parent().parent().html();
			saveFav(domrow);

		}
		else{
			$(this).children().removeClass("glyphicon-star");
			$(this).children().addClass("glyphicon-star-empty");
		}

	});

	// starTabButton
	$("#starTabButton").click(function(){
		alert("starTabButton");
		if ($(this).children().hasClass("glyphicon-star-empty")) {
			$(this).children().removeClass("glyphicon-star-empty");
			$(this).children().addClass("glyphicon-star");
			showFavRSS();
		}
		else{
			$(this).children().removeClass("glyphicon-star");
			$(this).children().addClass("glyphicon-star-empty");
		}
	});

	$("#logoutButton").mouseenter(function(){
		$("#username").css("display","none");
		$("#showLogoutText").css("display","-moz-box");
	})
	$("#logoutButton").mouseleave(function(){
		$("#showLogoutText").css("display","none");
		$("#username").css("display","-moz-box");

	})
	$("#logoutButton").click(function(){
		alert("write code for logout");
	});

});

 function showFavRSS() {
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.open("GET","showfav.php",true);
  xmlhttp.send();

  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      alert("fav rss" + xmlhttp.responseText);
      document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
    }
  }


// var str="Google";

// var js = document.createElement('script');
// js.src = 'myjs.js';
// var first = document.getElementsByTagName('script')[0];
// first.parentNode.insertBefore(js, first);


//   if (str.length==0) { 
//     document.getElementById("rssOutput").innerHTML="";
//     return;
//   }
//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else {  // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
  
//   xmlhttp.open("GET","getrss.php?q="+str,true);
//   xmlhttp.send();

//   xmlhttp.onreadystatechange=function() {
//     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//       alert(xmlhttp.responseText);
//       document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
//     }
//   }

}


function saveFav(domrow){
	alert('hello');

// $.ajax({
//                 type: "POST",
//                 url: "addfav.php",
//                 data: "{Htmldata:'" + domrow + "'}",
//                 contentType: "application/json",
//                 dataType: "json",
//                 success: function (data) {
//                     if (data == undefined) {
//                         alert("Error : 219");
//                     }
//                     else {
//                         alert(data.d);
//                     }
//                 },
//                 error: function (data) {
//                     if (data == undefined) {
//                         alert("Error : 465");
//                     }
//                     else {
//                         alert("Error : 468 " + data.d);
//                     }
//                 }
//             });



	alert("save");
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  alert(domrow);
  xmlhttp.open("GET","addfav.php?q="+domrow,true);
  xmlhttp.send();
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      alert("data : "+ xmlhttp.responseText);

    }
  }

}
