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
<body class="#90caf9 blue lighten-3">  

<?php

include "header.html";

?>
<div class="container">
    <div>
        <div id="Registro">
            <div class="noactive" id="divPerfil">
                
                <h5 id="mensaje"></h5>
                <br>
                <center>
                <img id="perfileImg" src="#" width="75px" />
                <br>
                <button id="btnLogout" class="btn waves-effect waves-light #2196f3 blue" type="button">Salir</button>
                </center>
                <br>
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
                  <div class="input-field ">
                    <center>
                    <button class="btn waves-effect waves-light #2196f3 blue"  id="login" name="action">Entrar</button>
                    <button class="btn waves-effect waves-light #2196f3 blue"  name="action" id="registrarse">Registrarse</button>
                    <center>
                  </div>
                </li>
              </ul>   
            </div>  
        </div>
    </div>

    <div class="row">
    <div class="col s12 " >
      <nav class="#2196f3 blue noactive" id="navbar">
            <div id="barraBusqueda"  class="nav-wrapper noactive">
              <div class="input-field #2196f3 blue">
                <input id="busquedaPeli" type="search">
                <label class="label-icon"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
              <center>
                <button id="busqueda" class="btn waves-effect waves-light #2196f3 blue" type="button">Buscar</button>
                <button id="delete" class="btn waves-effect waves-light red" type="button">Borrar</button>
                <button id="delete" class="btn waves-effect waves-light green" type="button" href="#modalPelis">Mis Pelis</button>
              </center>
            </div>
      </nav>
      <br><br>
    </div>
    <br><br>
      <div class="col s12 m12 l12">

            <center>
              <h4>MovieQuiz</h4>
              <a class="waves-effect waves-light btn modal-trigger" href="#modalGame" id="juego">Jugar</a>
              <br>
            </center>
          
            <div class="row" id="resultados">
              <center>
                  <h4>Películas mas populares</h4>
                  <div class="carousel">
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=1&h=220"></a>
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=2&h=220"></a>
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=3&h=220"></a>
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=4&h=220"></a>
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=5&h=220"></a>
                    <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=6&h=220"></a>
                  </div> 
                  <h4>Tráilers</h4>
                  <video width="1000" height="500" id="video" autoplay muted>
                  <source src="/vid/video1.mp4" type="video/mp4">
                  </video>
              </center>
            </div>
            <div id="divJuego">

              <div id="modalGame" class="modal modal-fixed-footer #2196f3 blue">
                <div class="modal-content">

                    <h1 style="text-align:center;">Movie Quiz</h1>
                    <div id="contenidoJuego">
                      
                    </div>
                </div>
                  <div class="modal-footer #90caf9 blue lighten-3">
                  <center>
                      <button id='enviarJuego' class="btn waves-effect waves-light #2196f3 blue">Finalizar</button>
                  </center>
              </div>
            </div>
      </div>
    </div>      
</div>  


<script type="text/javascript" src="javascript.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>