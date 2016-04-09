
<?php

$ch = curl_init("http://www.google.com/movies?hl=en&q=ki%20and%20ka");
$fp = fopen("example_homepage.html", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>
