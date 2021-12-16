<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style.css">

</head>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('./model/players.php');
define('USER', 'a20marsolluc_admin');
define('PASSWORD', 'Admin1234');
define('HOST', 'localhost');
define('DATABASE', 'a20marsolluc_moviequiz');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
$player=new players();

session_start();

if (isset($_POST['register'])) {

    $fav = $_POST['favorito'];
    $valoracion = $_POST['valoracion'];
    $comentario = $_POST['comentario'];

    //$player->insert()

    $query = $connection->prepare("SELECT * FROM usuario WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() == 0) {

        //echo($username);
                                                                            //BUSCAR FORMA D INTRODUCIR USUAIRO Y PELICULA
        $query = $connection->prepare("INSERT INTO valoracio_pelicules(FAVORIT,VALORACIO,COMENTARI) VALUES (:favorito,:valoracion,:comentario)");
        $query->bindParam("favorito", $fav, PDO::PARAM_STR);
        $query->bindParam("valoracion", $valoracion, PDO::PARAM_STR);
        $query->bindParam("comentario", $comentario, PDO::PARAM_STR);
        $result = $query->execute();

        //la vaina d abajo pa mirar errores
        //echo($query2->errorCode() );

        if ($result) {
            echo '<center><p class="flow-text centrao">Datos guardados correctamente!!</p></center>';
        } else {
            echo '<center><p class="error">No se han podido guardar tus datos!</p></center>';
        }
    }
    else{
        echo '<center><p class="flow-text centrao">Ya has introducido datos previamente</p></center>';
    }
}

?>

