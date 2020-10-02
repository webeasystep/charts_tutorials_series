<?php

ini_set('display_errors', 'On');

error_reporting(E_ALL);

//database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'demo';

date_default_timezone_set("Asia/Kolkata");

 $database = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

// Start a Session, You might start this somewhere else already.

// Include active language
/*
* End of file config.php
*/