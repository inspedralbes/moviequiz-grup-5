document.getElementById("login").addEventListener("click",function(){

let u = document.getElementById("username").value;

let p = document.getElementById("pwd").value;


            const datosEnvio = new FormData();

            datosEnvio.append('username', u);

            datosEnvio.append('passwd', p);



            fetch(`./login.php`, {

                    method: 'POST',

                    body: datosEnvio

                }).then(response => response.json())

                .then(data => {

                    console.log(data);
                    if (data.exito == true) {
                        conectado = 1;
                        document.getElementById("mensaje").innerHTML = "Bienvenido a Movie Quiz 5 " + data.nombre;
                        document.getElementById("perfileImg").setAttribute("src", data.imagen);

                        document.getElementById("divLogin").classList.remove("active");
                        document.getElementById("divLogin").classList.add("noactive");

                        document.getElementById("divPerfil").classList.remove("noactive");
                        document.getElementById("divPerfil").classList.add("active");

                        document.getElementById("barraBusqueda").classList.remove("noactive");
                        document.getElementById("barraBusqueda").classList.add("active");

                        document.getElementById("navbar").classList.remove("noactive");
                        document.getElementById("navbar").classList.add("active");

                    } else {
                        alert("¡¡Nombre de Usuario o Contraseña incorrecta!!");
                    }
                });
            });
            
document.getElementById("btnLogout").addEventListener("click", function() {

    conectado = 0;
                
    document.getElementById("divLogin").classList.remove("noactive");
    document.getElementById("divLogin").classList.add("active");

    document.getElementById("divPerfil").classList.remove("active");
    document.getElementById("divPerfil").classList.add("noactive");

    document.getElementById("barraBusqueda").classList.remove("noactive");
    document.getElementById("barraBusqueda").classList.add("active");

    document.getElementById("navbar").classList.remove("active");
    document.getElementById("navbar").classList.add("noactive");
    
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{duration:200});
  });
document.getElementById("delete").addEventListener("click",function(){
    let htmlStr="";
    document.getElementById("resultados").innerHTML = htmlStr;
    videos();
});
document.getElementById("registrarse").addEventListener("click",function(){
    window.location="signup.php";
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
});
document.getElementById("busqueda").addEventListener("click",function(){
    let busqueda=document.getElementById("busquedaPeli").value;
        
        fetch(`http://www.omdbapi.com/?s=${busqueda}&apikey=93763d43`).then(function(res){
            return res.json();
        }).then(function(data){
            
                let htmlStr="";
                for (let index = 0; index < 8; index++) {


                    htmlStr += `
                                    <div class="col s4 m6 l3">

                                        <div id="pelicula${index}" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}">
                                        </div>
                                        <center>
                                        <span class="card-title">${data.Search[index].Title} -${data.Search[index].Year}</span><br>
                                        <a class="waves-effect waves-light btn modal-trigger #1e88e5 blue darken-1" href="#modal${index}" ><i class="material-icons">add</i></a>
                                        </center>
                                        <div id="modal${index}" class="modal #64b5f6 blue lighten-2">
                                            <div class="modal-content">
                                                <center>
                                                <h3>${data.Search[index].Title}</h3>
                                                <h5>Valoracion</h5>
                                                <div>
                                                <form method="post">
                                                    <div>   
                                                        <label>
                                                            <input id="favorito" name="Favorito" type="checkbox"/>
                                                            <span>Marcar como favorito</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <label>
                                                            <input name="valoracion" type="radio" value="1"/>
                                                            <span>1</span>
                                                        </label>
                                                        <label>
                                                            <input name="valoracion" type="radio" value="2"/>
                                                            <span>2</span>
                                                        </label>
                                                        <label>
                                                            <input name="valoracion" type="radio" value="3"/>
                                                            <span>3</span>
                                                        </label>
                                                        <label>
                                                            <input name="valoracion" type="radio" value="4"/>
                                                            <span>4</span>
                                                        </label>
                                                        <label>
                                                            <input name="valoracion" type="radio" value="5"/>
                                                            <span>5</span>
                                                        </label>
                                                    </div>
                                                <form>    
                                                </div>
                                                <div class"input-field">
                                                    <label for="comentario">Comentario<label>
                                                    <textarea id="comentario" class="materialize-textarea" data-length="200"></textarea> 
                                                </div>
                                                <div>
                                                    <button id="valoracion" class="waves-effect waves-light btn #1e88e5 blue darken-1">Guardar</button>
                                                </div>
                                                </center>
                                            </div>
                                            <div class="modal-footer #1e88e5 blue darken-1">
                                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atras</a>
                                            </div>
                                        </div>
                                        </div> 
                                    </div>
                                        `;


                }
                document.getElementById("resultados").innerHTML = htmlStr;
                //LE DIGO QUE ARRANQUE EL MODAL
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems,{});



        });
    });

/*document.getElementById("favorito").addEventListener("click",function(){
 favorito=1;
 if (favorito=1){

 }
});*/

function videos(){
    let htmlStr="";
    htmlStr+=`   
        <center>
            <h4>pel·lícules més populars</h4>
            <div class="carousel">
                <a class="carousel-item"><img src="img/img1.jpg"></a>
                <a class="carousel-item"><img src="img/img2.jpg"></a>
                <a class="carousel-item"><img src="img/img3.jpg"></a>
                <a class="carousel-item"><img src="img/img4.jpg"></a>
                <a class="carousel-item"><img src="img/img5.jpg"></a>
                <a class="carousel-item"><img src="img/img6.jpg"></a>
            </div> 
            <h4>Trailers</h4> 
            <video width="1000" height="500" id="video" autoplay muted>
            <source src="/vid/video1.mp4" type="video/mp4">
            </video>
        </center>
    `;
    document.getElementById("resultados").innerHTML = htmlStr;
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{duration:200});

    return htmlStr;
};
    document.getElementById("juego").addEventListener("click",function(){
        fetch('output_generar_partida.json')
        .then(response => response.json() )
        .then(data => {
        console.log(data);
        
        let htmlStr="";
        for (let i = 0; i < 5; i++) {
        
        htmlStr += `
      
        <div>
        <center>
            <h5>${data.peliculas[i].Nombre}</h5>
            <img src='${data.peliculas[i].Poster}' width="200px">
            <div>
            <form method="post">
                 <div>
                    <br>
                    <label>
                        <input name="${data.peliculas[i].choice1}" type="button" value="${data.peliculas[i].choice1}" class="btn waves-effect waves-light #64b5f6 blue lighten-2"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice2}" type="button" value="${data.peliculas[i].choice2}" class="btn waves-effect waves-light #64b5f6 blue lighten-2"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice3}" type="button" value="${data.peliculas[i].choice3}" class="btn waves-effect waves-light #64b5f6 blue lighten-2"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice4}" type="button" value="${data.peliculas[i].choice4}" class="btn waves-effect waves-light #64b5f6 blue lighten-2"/>
                    </label>
                </div>
            </form>
            </div>
        </center>
        </div><br>  
        `;
        };
        document.getElementById("contenidoJuego").innerHTML = htmlStr;
    });
    });


