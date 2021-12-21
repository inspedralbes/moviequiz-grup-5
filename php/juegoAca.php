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
$idpeli = $_POST['idPeli'];
$titulo = $_POST['titulo'];
$nomPartida = $_POST['nomPartida'];
$anoprod = $_POST['añoProd'];
$choice1 = $_POST['${data.peliculas[i].choice1}'];
$choice2 = $_POST['${data.peliculas[i].choice2}'];
$choice3 = $_POST['${data.peliculas[i].choice3}'];
$choice4 = $_POST['${data.peliculas[i].choice4}'];
$encerts =;
$errades =;
$idPartida=;

//$player->insert()

//BUSCAR FORMA D INTRODUCIR USUAIRO Y PELICULA
$query = $connection->prepare("INSERT INTO partida (nomPartida, peliculas,fecha) VALUES (:nomPartida,:idPeli,:añoProd)");
$query->bindParam("nomPartida", $nomPartida, PDO::PARAM_STR);
$query->bindParam("idPeli", $idpeli, PDO::PARAM_STR);
$query->bindParam("añoProd", $anoprod, PDO::PARAM_STR);
$result = $query->execute();
print_r($query->errorInfo());


$query = $connection->prepare("INSERT INTO partida_jugada (partida, usuari, encerts, errades) VALUES (:idPartida,:user,:encerts,:errades)");
$query->bindParam("idPartida", $idPartida, PDO::PARAM_STR);
$query->bindParam("user", $user, PDO::PARAM_STR);
$query->bindParam("encerts", $encerts, PDO::PARAM_STR);
$query->bindParam("errades", $errades, PDO::PARAM_STR);
$result = $query->execute();
print_r($query->errorInfo());

//echos para confirmar insercion
echo($query->errorCode() );

if ($result) {
    echo '<center><p class="flow-text centrao">Datos guardados correctamente!!</p></center>';
} else {
    echo '<center><p class="error">No se han podido guardar tus datos!</p></center>';
}

?>