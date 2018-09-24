<?php

ob_start();
$return = include 'session.php'; // (string)"World"
$output = ob_get_clean(); // (string)"Hello World"
// $hello has been moved to the current scope
echo $return; // echos "Hello World"
?>