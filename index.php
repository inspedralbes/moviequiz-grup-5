<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style.css">

</head>
<body class="#64b5f6 blue lighten-2">  

<?php

include "header.html";

?>

  <div>
    <center>
          <div id="Registro">
              <div class="noactive" id="divPerfil">
                <h5 id="mensaje"></h5>
                <img id="perfileImg" src="#" width="50px" />
                <button id="btnLogout" class="btn waves-effect waves-light #1e88e5 blue darken-1" type="button">Log Out</button>
              </div>
              
              <div method="post" id="divLogin" class="active">
                <ul class="right hide-on-med-and-down">
                  <li>
                    <div class="input-field  ">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="username" type="text" class="validate">
                      <label for="username">Usuario</label>
                    </div>
                  </li>
                  <li>
                    <div class="input-field  ">
                      <i class="material-icons prefix">https</i>
                      <input id="pwd" type="password" class="validate">
                      <label for="pwd">Contraseña</label>
                    </div>
                  </li>
                  <li>
                    <div class="input-field  ">
                      <button class="btn waves-effect waves-light #1e88e5 blue darken-1"  id="login" name="action">Entrar</button>
                      <button class="btn waves-effect waves-light #1e88e5 blue darken-1"  name="action" id="registrarse">Registrarse</button>
                    </div>
                  </li>
                </ul>
              </div>
          </div>
    </center>
  </div>

<div class="row ">
      
    <div class="col s12">
        <nav>
              <div class="nav-wrapper">
                <div class="input-field #1e88e5 blue darken-1">
                  <input id="busquedaPeli" type="search">
                  <label class="label-icon"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
                <center>
                  <button id="busqueda" class="btn waves-effect waves-light #1e88e5 blue darken-1" type="button">Buscar</button>
                  <button id="delete" class="btn waves-effect waves-light red" type="button">Borrar</button>
                  <button id="Juego" class="btn waves-effect waves-light" type="button">Jugar</button>
                </center>
              </div>
        </nav>
        <br><br>
    </div>
        <div class="col s12 m12 l12">

              <center>
                <h4>Peliculas</h4>
              </center>
            
              <div id="resultados">
                <center>
                <video width="1000" height="500" id="video" autoplay muted>
                <source src="/vid/video1.mp4" type="video/mp4">
                </video>
                </center>
              </div>
        </div>
        

<script type="text/javascript" src="javascript.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>