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
    $titulo = $_POST['Title'];
    $anoprod = $_POST['Year'];
    $poster = $_POST['Poster'];

    echo ($idpeli);
    //$player->insert()

        //BUSCAR FORMA D INTRODUCIR USUAIRO Y PELICULA
        $query = $connection->prepare("INSERT INTO pelicula (idPeli, titulo, añoProd,poster) VALUES (:idPeli,:titulo,:anyo,:poster)");
        $query->bindParam("idPeli", $idpeli, PDO::PARAM_STR);
        $query->bindParam("titulo", $titulo, PDO::PARAM_STR);
        $query->bindParam("anyo", $anoprod, PDO::PARAM_STR);
        $query->bindParam("poster", $poster, PDO::PARAM_STR);
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

