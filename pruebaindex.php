<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body class="#64b5f6 blue lighten-2">  

<?php

include "header.html";

?>

<center>
  <img src="img/MovieQuiz.png" width="200px" > 
</center>  
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
                  <button id="game" class="btn waves-effect waves-light" type="button">Jugar</button>
                </center>
            </div>
        </nav>
        <br><br>

        <div class="col s10 m10 l10">

          <center>
            <h4>Peliculas</h4>
          </center>
        
          <div id="resultados">
            <center>
            <video width="1000" height="500" id="video" autoplay muted>
            <source src="/vid/video1.mp4" type="video/mp4">
            </video>
            <center>
          </div>

        </div>
        <div class="col s2 m2 l2">

              <center><h4>Estrenos</h4><center>
 
            <div id="Ult_Peliculas">
               <div class="carousel">
                 <a class="carousel-item" href="#one!"><img src="img/img1.jpg"></a>
                 <a class="carousel-item" href="#two!"><img src="img/img2.jpg"></a>
                 <a class="carousel-item" href="#three!"><img src="img/img3.jpg"></a>
                 <a class="carousel-item" href="#four!"><img src="img/img4.jpg"></a>
                 <a class="carousel-item" href="#five!"><img src="img/img5.jpg"></a>
                 <a class="carousel-item" href="#six!"><img src="img/img6.jpg"></a>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="juego">

</div>
 
<script type="text/javascript" src="javascript.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>