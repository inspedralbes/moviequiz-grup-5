<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

 define('USER', 'root');
 define('PASSWORD', '');
 define('HOST', 'localhost');
 define('DATABASE', 'test');
  
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
 
    session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p>¡El correo introducuido ya existe!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="flow-text">Te has registrado correctamente!!</p>';
        } else {
            echo '<p class="error">Algun paramentro es incorrecto!</p>';
        }
    }
}
 
?>

<body>
    <div class="row">
        <form class="col s12" method="POST" action="" name="signup-form">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Mario" name="username" id="username" type="text" class="validate">
                    <label for="username">Usuario</label>
                </div>
                <div class="row">
                <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
                </div>
                <div class="input-field col s6">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="register">Registrarse<i class="material-icons right">send</i></button>
        </form>
    </div>
    <div class="input-field col s3">
        <a class="waves-effect waves-light btn-small" href="login.php">Volver</a>
    </div>
</body>

</html>