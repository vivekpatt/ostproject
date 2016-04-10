<?php
//get the q parameter from URL
$q=$_GET["q"];
//$q="M";
//find out which feed was selected
if($q=="Google") {
  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
} elseif($q=="NBC") {
  $xml=("http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml");
  
}
 elseif($q=="M") {
  $xml=("http://www.fandango.com/rss/top10boxoffice.rss");
}elseif($q=="G") {
  $xml=("http://timesofindia.feedsportal.com/c/33039/f/533980/index.rss");
}


$xmlDoc	 = new DOMDocument();  // blank dom document
$xmlDoc->load($xml);


$xmlDoc->formatOutput = true; // set the formatOutput attribute of domDocument to true

    // save XML as string or file 
    $test1 = $xmlDoc->saveXML(); // put string in test1
    $xmlDoc->save('test1.xml'); // save as file
/*
//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;



$channel_link = @$channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</p>");
*/
//get and output "<item>" elements

$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=4; $i++) {

  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  // $str = "";

  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;


  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;


// $str = "<p><a href='" . $item_link
//   . "'>" . $item_title . "</a> </br>" . $item_desc . "</p>";

  echo "<div class='panel panel-default'><div class='panel-heading'><div class='row'><div class='col-xs-10'>";
  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a></p></div><div class='col-xs-2 text-right'><button type='button' class='btn btn-default btn-lg starbutton'><span class='glyphicon glyphicon-star-empty'></span></button></div></div></div>");
  echo "<div class='panel-body'>";
  echo ($item_desc . "</div></div>");


              // <div class="panel panel-default">
              //   <div class="panel-heading">

              //     // <div class='row'><div class='col-xs-10'>
              //         heading ======> $item_link
              //       // </div><div class='col-xs-2 text-right'>
              //         // <button type='button' class='btn btn-default btn-lg'>
              //           // <span class='glyphicon glyphicon-star-empty'></span> 
              //         </button>
              //       </div>
              //     </div>


              //   </div>

              //   <div class="panel-body">
              //   Panel Content =======> $item_desc
              //   </div>
              // </div>



//   $file = 'newtest.html';
// // Open the file to get existing content
//   $current = file_get_contents($file);
// $str = $str. "  " . $current;
// // Write the contents back to the file
// file_put_contents($file, $str);

}



?>