<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "lwe";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Error " . mysqli_error($con));
?>