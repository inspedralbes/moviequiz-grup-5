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
print_r ("Prueba");
if (isset($_POST['imdbId'])) {

    $idpeli = $_REQUEST['imdbId'];
    $titulo = $_REQUEST['Title'];
    $añoprod = $_REQUEST['Year'];
    $poster = $_REQUEST['Poster'];

    //$player->insert()

    $query = $connection->prepare("SELECT * FROM usuario WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    echo($query->errorCode() );
    if ($query->rowCount() == 0) {
                            echo($query->errorCode() );
        //echo($username);
                            echo($query->errorCode() );                                         //BUSCAR FORMA D INTRODUCIR USUAIRO Y PELICULA
        $query = $connection->prepare("INSERT INTO pelicula(IDPELI,TITULO,AÑOPROD,POSTER) VALUES (:imdbID,:Title,:Year,:Poster)");
        $query->bindParam("idPeli", $idpeli, PDO::PARAM_STR);
        $query->bindParam("titulo", $titulo, PDO::PARAM_STR);
        $query->bindParam("añoProd", $añoprod, PDO::PARAM_STR);
        $query->bindParam("poster", $poster, PDO::PARAM_STR);
        $result = $query->execute();

        //la vaina d abajo pa mirar errores
        echo($query->errorCode() );

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

