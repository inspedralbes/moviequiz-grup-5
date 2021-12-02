<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <div class="nav-wrapper #b39ddb deep-purple lighten-3">
        <img src="img/logo.png" width="50px">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <div class="row">
        
        <div class="row">
            <div class="input-field col s3 m3 ">
                <input  id="busquedaPeli" type="text" class="buscar">
                <label for="busquedaPeli">Buscar película</label>
                <i class="material-icons prefix">search</i>
                <button id="busqueda" class="waves-effect waves-light btn-large">Button</button>
            </div>
            <div class="input-field col s3 m3 ">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text" class="validate">
                <label for="username">Usuario</label>
            </div>
            <div class="input-field col s3 m3 ">
                <i class="material-icons prefix">https</i>
                <input id="pwd" type="tel" class="validate">
                <label for="pwd">Contraseña</label>
            </div>
            <div class="input-field col s3 m3 ">           
                <button class="btn waves-effect waves-light" type="submit" name="action">Entrar
                <i class="material-icons right ">send</i>
                </button>
            </div>
        </div>    
    </div>
      </ul>
    </div>
  </nav>
  <div class="row">
      
      <div id="resultados" class="col s8">
        <h1>Peliculas</h1>
      </div>
      <div class="col s4">
    </div>
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div>

    <script type="text/javascript" src="javascript.js"></script>
</body>
</html>