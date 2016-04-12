<?php
$connection = new mysqli("localhost", "root", "","feeder") or die(mysqli_error());
$getData = "SELECT `fav` FROM `fav_table` WHERE `uid` = 'vivek'";
$qur = $connection->query($getData);
while($r = mysqli_fetch_assoc($qur)){
$msg = $r['fav'];
}
print_r($msg);
?>