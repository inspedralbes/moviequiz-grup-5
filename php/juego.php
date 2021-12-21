<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'moviekiza');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

 
$query = $connection->prepare("SELECT * FROM pelicula ORDER BY RAND() LIMIT 5");

$query->execute();

 
 $peliculas = array();
for ($i=0;$i<4;$i++) {
     $row = $query->fetch(PDO::FETCH_ASSOC);


    $añopeli = array(-15, -10, -5, -2, 2, +5, +10, +15);
    $choice1 =  $row['añoProd'];
    $choice2 = $añopeli[rand(0, 7)] + $row['añoProd'];
    $choice3 = $añopeli[rand(0, 7)] + $row['añoProd'];
    $choice4 = $añopeli[rand(0, 7)] + $row['añoProd'];

    $opciones = [ $choice1, $choice2, $choice3, $choice4];

    Shuffle($opciones);
    $output_json[$i] = array( 'titulo'=>[$row['titulo'], 'año'=>$row['añoProd'], 'id'=>$row['idPeli'], 'poster'=>$row['poster'], 'opciones'=>$opciones]);
    /*
    echo "<br>";
    print_r($opciones);
    echo "<br>";
   // echo $choice2;

    echo ("titulo: ".$row['titulo']);
    echo "<br>";
    echo ("año: ". $row['añoProd']);
    echo "<br>";
    echo ("id: ".$row['idPeli']);
    echo "<br>";
    echo ("poster: ".$row['poster']);
    echo"-----------------";
    */


}
echo json_encode($output_json);