<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('USER', 'a20marsolluc_admin');
define('PASSWORD', 'Admin1234');
define('HOST', 'localhost');
define('DATABASE', 'a20marsolluc_moviequiz');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

 
$query = $connection->prepare("SELECT * FROM pelicula ORDER BY RAND() LIMIT 5");
$query->execute();
 
 $peliculas = array();
 
 while($row=$query->fetch(PDO::FETCH_ASSOC)){
  
  $peliculas['pelicules'][] = $row;
  // [-15 , -10 , -5 , -2  , 2 , +5 , +10 ,+15]
 }
 $peliculas['pelicules'][] = rand([-15 , -10 , -5 , -2  , 2 , +5 , +10 ,+15]) ;
 
 echo json_encode($peliculas);