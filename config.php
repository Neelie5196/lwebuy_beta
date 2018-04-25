<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "moonshoresjerrybutton";
$dbname = "lwe_beta";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Error " . mysqli_error($con));
?>