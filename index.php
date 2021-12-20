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
<body class="#bbdefb blue lighten-4">  

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
                <button id="btnLogout" class="btn waves-effect waves-light #1e88e5 blue darken-1" type="button">Salir</button>
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
                    <button class="btn waves-effect waves-light #1e88e5 blue darken-1"  id="login" name="action">Entrar</button>
                    <button class="btn waves-effect waves-light #1e88e5 blue darken-1"  name="action" id="registrarse">Registrarse</button>
                    <center>
                  </div>
                </li>
              </ul>   
            </div>  
        </div>
    </div>

    <div class="row">
    <div class="col s12 " >
      <nav class="#1e88e5 blue darken-1 noactive" id="navbar">
            <div id="barraBusqueda"  class="nav-wrapper noactive">
              <div class="input-field #1e88e5 blue darken-1">
                <input id="busquedaPeli" type="search">
                <label class="label-icon"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
              <center>
                <button id="busqueda" class="btn waves-effect waves-light #1e88e5 blue darken-1" type="button">Buscar</button>
                <button id="delete" class="btn waves-effect waves-light red" type="button">Borrar</button>
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
                    <a class="carousel-item"><img src="img/img1.jpg"></a>
                    <a class="carousel-item"><img src="img/img2.jpg"></a>
                    <a class="carousel-item"><img src="img/img3.jpg"></a>
                    <a class="carousel-item"><img src="img/img4.jpg"></a>
                    <a class="carousel-item"><img src="img/img5.jpg"></a>
                    <a class="carousel-item"><img src="img/img6.jpg"></a>
                  </div> 
                  <h4>Tráilers</h4>
                  <video width="1000" height="500" id="video" autoplay muted>
                  <source src="/vid/video1.mp4" type="video/mp4">
                  </video>
              </center>
            </div>
            <div id="divJuego">

              <div id="modalGame" class="modal modal-fixed-footer #1e88e5 blue darken-1">
                <div class="modal-content">

                    <h1 style="text-align:center;">Movie Quiz</h1>
                    <div id="contenidoJuego">
                      
                    </div>
                </div>
                  <div class="modal-footer #bbdefb blue lighten-4">
                  <center>
                      <button id='enviarJuego' class="btn waves-effect waves-light #1e88e5 blue darken-1">Finalizar</button>
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