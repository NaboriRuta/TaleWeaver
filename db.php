<?php
$host = "localhost:3306";
$dbname = "taleweaverDatabase";
$username = "root";
$password = "Shelton79Adams";

$mysqli = new mysqli($host, $username, $password, $dbname);

if (mysqli_connect_errno()) die("Connection error: " . mysqli_connect_error());

return $mysqli;