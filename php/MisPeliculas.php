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
$user = $_POST['user'];
 
$query = $connection->prepare("SELECT * FROM pelicula WHERE usuario='$user'");
$query->execute();
 
 $pelicula = array();
 
 while($row=$query->fetch(PDO::FETCH_ASSOC)){
  
  $pelicula['misPeliculas'][] = $row;

 }

 echo json_encode($pelicula);

 ?>