<?php
 error_reporting(0);
session_start();
 
ob_start();
 
session_destroy();
 
header("location:index.html");
 
?>