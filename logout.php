<?php
require_once 'connection/config.php';
session_start();
session_destroy();
header('location: login.php');
exit();
?>