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
  $str = "";
  $str = $item_title;

  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;

  $str = $str . $item_link;

  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;

  $str = $str . $item_desc;

  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a>");
  echo ("<br>");
  echo ($item_desc . "</p>");

  $file = 'newtest.html';
// Open the file to get existing content
  $current = file_get_contents($file);
$str = $str.$current;
// Write the contents back to the file
file_put_contents($file, $str);

}



?>