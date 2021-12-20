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


session_start();

    $idpeli = $_POST['imdbId'];
    $favorito = $_POST['favorito'];
    $valoracion = $_POST['valoracion'];
    $comentario = $_POST['comentario'];

    //$player->insert()

        //BUSCAR FORMA D INTRODUCIR USUAIRO Y PELICULA
        $query = $connection->prepare("INSERT INTO valoracio_pelicules (pelicula, usuari, comentari,favorit,valoracio) VALUES (:idPeli,:favorito,:valoracion,:comentario)");
        $query->bindParam("idPeli", $idpeli, PDO::PARAM_STR);
        $query->bindParam("favorito", $favorito, PDO::PARAM_STR);
        $query->bindParam("valoracion", $valoracion, PDO::PARAM_STR);
        $query->bindParam("comentario", $comentario, PDO::PARAM_STR);
        $result = $query->execute();
        print_r($query->errorInfo());

        //la vaina d abajo pa mirar errores
        echo($query->errorCode() );

        if ($result) {
            echo '<center><p class="flow-text centrao">Datos guardados correctamente!!</p></center>';
        } else {
            echo '<center><p class="error">No se han podido guardar tus datos!</p></center>';
        }

?>

