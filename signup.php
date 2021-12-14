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

 define('USER', 'root');
 define('PASSWORD', '');
 define('HOST', 'localhost');
 define('DATABASE', 'prueba');
  
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
 
    session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM usuario WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO usuario(USERNAME,PASSWD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<center><p class="flow-text centrao">Te has registrado correctamente!!</p></center>';
        } else {
            echo '<center><p class="error">Algun paramentro es incorrecto!</p></center>';
        }
    }
}
 
?>

<body class="#64b5f6 blue lighten-2">
<center><img src="/img/MovieQuiz.png" width="200px"></center><br>
<div class="container ">
        <form class="col s12" method="POST" action="" name="signup-form">
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <i class="material-icons prefix">account_circle</i>
                    <input  placeholder="" id="username" name="username" type="text" class="validate" required>
                    <label for="username">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <i class="material-icons prefix">mail</i>
                    <input name="email" id="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="passwd" type="password" class="validate" required>
                    <label for="password">Contraseña</label>
                </div>
            </div>
    <center>
            <button class="btn waves-effect waves-light #1e88e5 blue darken-1" type="submit" name="register">Registrarse<i class="material-icons right">send</i></button>
        </form>
    <div class="input-field col s3">
        <form action="pruebaindex.php">
            <a class="waves-effect waves-light btn-small #1e88e5 blue darken-1" href="index.php">Volver</a>
        </form>
    </div>
</div>
    <center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>