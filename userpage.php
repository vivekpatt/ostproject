<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="myjs.js"></script>

  <style type="text/css">

  @font-face {
    font-family: "Kaushan Script";
    src: url('KaushanScript-Regular.ttf')  format("truetype"),
         url(/font/KaushanScript-Regular.woff) format("woff");
  }
    @font-face {
    font-family: "JosefinSans-Regular";
    src: url('JosefinSans-Regular.ttf')  format("truetype");
  }

  
  body .container-fluid #body{
    margin-top: 5px;
    -webkit-box-shadow: 0 0 10px 2px rgba(0,0,0,0.5) ;
box-shadow: 0 0 10px 2px rgba(0,0,0,0.5) ;
  }
.navbar-inverse .navbar-brand {
    font-family: "Kaushan Script";
    font-size: 40px;
    color: white;
    line-height: 13px;
  }
  .container-fluid .navbar{
    margin-bottom: 0;
  }
  .container-fluid .jumbotron{
    padding-top: 5px;
    height: 500px;
    overflow: scroll;
  }
  .container-fluid .jumbotron .container{
    width: 50%;
  }
    .container-fluid .jumbotron .dropdown{
    width: 100%;
    background-color: rgba(12, 125, 180, 0.16);
    padding: 3px 0px;
    margin-bottom: 5px;
  }
    .container-fluid .jumbotron .dropdown .dropdown-toggle{
    width: 98%;
    background-color: #3aace3;
}
  .panel-default .panel-heading{
    padding: 5px 10px;
    font-size: 12px;
  }
  </style>

  </head>
  <body>
  	<div class="container-fluid">
    	<div id="body">
       		<nav class="navbar navbar-inverse">
            <div style="display: inline-flex; width: 100%;">
              <div style="flex: 3 1 0%;">
                <div class="navbar-brand container" style="width: 140px;">feeder</div>
              </div>
              <div style="flex: 2 1 0%;" class="text-right">
                  <button id="logoutButton" type="button" class="btn btn-default btn-lg" style="background-color: rgb(75, 75, 75); margin: 6px 22px; color: white; padding: 5px 34px; border-color: black;">
                    <span class="glyphicon glyphicon-user"></span> <span id="username">vivek</span><span id="showLogoutText" style="display:none">logout</span>
                  </button>
              </div>
            </div>

	        </nav>

	        <div class="jumbotron">
            
            <div style="display: inline-flex; width: 100%;">
              <!-- flex coloumn 1 for drop down -->
              <div style="flex: 9 1 0%;">
              
            <!-- drop down starts -->
            <div class="dropdown text-center">
                  <button class="btn btn-default dropdown-toggle" type="button" id="menu" data-toggle="dropdown">
                  <div class="row">
                    <div class="col-xs-2 text-right"><span class="caret"></span></div>
                    <div class="col-xs-8 text-left" style="font-family:JosefinSans-Regular;"><span id="rsstitle">Select RSS</span></div>
                  </div>
                  </button>

                <ul class="dropdown-menu" role="menu" aria-labelledby="menu" style="width: 80%;">
                  <li role="presentation" class="dropdown-header">News</li>
                  <li class="menuitem" role="presentation"><a role="menuitem" tabindex="-1" href="#">Google</a></li>
                  <li class="menuitem" role="presentation"><a role="menuitem" tabindex="-1" href="#">Yahoo</a></li>
                  <li class="menuitem" role="presentation"><a role="menuitem" tabindex="-1" href="#">Bing</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation" class="dropdown-header">Weather</li>
                  <li class="menuitem" role="presentation"><a role="menuitem" tabindex="-1" href="#">Accuweather</a></li>
                </ul>
              </div>
              <!-- drop down ends -->

              </div>
              <!-- flex column 2 for fav tab -->
              <div style="flex: 1 1 0%;">
                  <button id="starTabButton" type="button" class="btn btn-default btn-lg" style="background-color: rgb(230, 213, 90); padding: 7px 51px;">
                    <span class="glyphicon glyphicon-star-empty"></span> fav
                  </button>
              </div>
            </div>

            

            <div id="rssOutput" class="panel panel-default">
              <div class="panel panel-default">
                <div class="panel-heading">

                   <div class="row"><div class="col-xs-10">
                      heading ======> $item_link
                     </div><div class="col-xs-2 text-right">
 <!--                       <button type="button" class="btn btn-default btn-lg starbutton">
                        <span class="glyphicon glyphicon-star-empty"></span> star
                      </button> -->
                    </div>
                  </div>


                </div>

                <div class="panel-body">
                Panel Content =======> $item_desc
                </div>
              </div>
              </div>
            </div>
	        </div>
		</div>
	</div>

<script type="text/javascript">
 $(".menuitem").mousedown(function(){
  var rss = $(this).children().text()
  $("#rsstitle").text(rss);
  showRSS(rss);
});

// rss script
 function showRSS(str) {


var js = document.createElement('script');
js.src = 'myjs.js';
var first = document.getElementsByTagName('script')[0];
first.parentNode.insertBefore(js, first);


  if (str.length==0) { 
    document.getElementById("rssOutput").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.open("GET","getrss.php?q="+str,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      alert(xmlhttp.responseText);
      document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
    }
  }

}



// $(".starbutton").click(function(){
//   alert("toggle click");
//   $(this).children().removeClass("glyphicon-star-empty");
//   $(this).children().addClass("glyphicon-star");
// });
    // $(x).removeClass('btn');
                // $(el).parent().addClass('active') ;





</script>
  </body>
</html>