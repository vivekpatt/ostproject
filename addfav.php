<?php

$connection = new mysqli("localhost", "root", "","feeder") or die(mysqli_error());

$fav = $_GET['q'];

$sql = "INSERT INTO `feeder`.`fav_table` (`ID`, `uid`, `fav`) VALUES (NULL, 'vivek', '$fav');";

if ($connection->query($sql)) {
$msg = array("status" =>1 , "msg" => "Your record inserted successfully");
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
print_r($msg);
?>