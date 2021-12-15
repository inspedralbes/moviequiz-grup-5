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

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    //$player->insert()

    $query = $connection->prepare("SELECT * FROM usuario WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() == 0) {

        //echo($username);

        $query = $connection->prepare("INSERT INTO usuario(USERNAME,PASSWD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();

        //la vaina d abajo pa mirar errores
        //echo($query2->errorCode() );

        if ($result) {
            echo '<center><p class="flow-text centrao">Te has registrado correctamente!!</p></center>';
        } else {
            echo '<center><p class="error">Algun paramentro es incorrecto!</p></center>';
        }
    }
    else{
        echo '<center><p class="flow-text centrao">USUARIO DUPLICADO</p></center>';
    }
}

?>

