<?php
$server = 'localhost';
$user = 'root';
$database = 'eastkampala';
$password = '';

// SETTING PDO DSN
$dsn = 'mysql:host='.$server.';dbname='.$database;

//CREATION OF PDO INSTANCE
$conn = new PDO($dsn, $user, $password);
//SET THE DEFAULT OBJECT RETRIEVAL METHOD
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


?>

