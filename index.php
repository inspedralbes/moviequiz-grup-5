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
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Usuario</label>
            </div>
            <div class="input-field col s3 m3 ">
                <i class="material-icons prefix">https</i>
                <input id="icon_telephone" type="tel" class="validate">
                <label for="icon_telephone">Contraseña</label>
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
      
      <div id="resultados" class="col s6">
        <h1>Peliculas</h1>
      </div>
      <div class="col s6">
    </div>
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div>



    <script>
        document.getElementById("busqueda").addEventListener("click",function(){
        let busqueda=document.getElementById("busquedaPeli").value;
            

            fetch(`http://www.omdbapi.com/?s=${busqueda}&apikey=93763d43`).then(function(res){
                return res.json();
            }).then(function(data){
                    console.log(data);
                    let htmlStr="";
                    for (let index = 0; index < 10; index++) {

                        htmlStr += `<div id="contenedor" class="row">
                                        <div class="col s6 m3">
                                            <div id="pelicula" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}" width="50px">
                                            <span class="card-title">${data.Search[index].Title}</span>
                                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                                            </div>
                                            <div class="card-content">
                                            <p>${data.Search[index].Year}</p>
                                            </div>
                                            </div> 
                                        </div>
                                    </div>                           
                                    `;
             
                    }
                    document.getElementById("resultados").innerHTML = htmlStr;
            });
        });
    </script>
</body>
</html>