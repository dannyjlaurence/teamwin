<?php

$database = new mysqli("localhost", "system", "testudo", "bubhub");
if($database->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}  

?>