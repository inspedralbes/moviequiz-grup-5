//login i logout de la pagina 
document.getElementById("login").addEventListener("click",function(){

let u = document.getElementById("username").value;

let p = document.getElementById("pwd").value;


            const datosEnvio = new FormData();

            datosEnvio.append('username', u);

            datosEnvio.append('passwd', p);



            fetch(`./php/login.php`, {

                    method: 'POST',

                    body: datosEnvio

                }).then(response => response.json())

                .then(data => {

                    
                    if (data.exito == true) {
                        
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
    window.location="./php/signup.php";
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
});

//introducion de las cartas con modales para poder valorar
document.getElementById("busqueda").addEventListener("click",function(){
    let busqueda=document.getElementById("busquedaPeli").value;
        
        fetch(`http://www.omdbapi.com/?s=${busqueda}&apikey=93763d43`).then(function(res){
            return res.json();
        }).then(function(data){

                let htmlStr="";
                htmlStr+="<center><h4>Busqueda de Peliculas<h4></center>";
                for (let index = 0; index < 8; index++) {

                    htmlStr += `
                                    <div class="col s4 m6 l3">

                                        <div id="pelicula${index}" class="card" >
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}">
                                        </div>
                                        <center>
                                        <span class="card-title">${data.Search[index].Title} -${data.Search[index].Year}</span><br>
                                        <a class="waves-effect waves-light btn modal-trigger #42a5f5 blue lighten-1" id="resultadosmodal" href="#modal${index}" ><i class="material-icons">add</i></a>
                                        </center>
                                        <div id="modal${index}" class="modal #90caf9 blue lighten-3">
                                            <div class="modal-content">
                                                <center>
                                                <h3>${data.Search[index].Title}</h3>
                                                <h5>Valoracion</h5>
                                                <div>
                                                <form method="post">
                                                    <div>   
                                                        <label>
                                                            <input id="favorito" class="favorito" name="Favorito" type="checkbox"/>
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
                                                    <button id="valoracion" value="${index}" class="waves-effect waves-light btn #42a5f5 blue lighten-1 Guardar-valoracion">Guardar</button>
                                                </div>
                                                </center>
                                            </div>
                                            <div class="modal-footer #42a5f5 blue lighten-1">
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
                //le envio a php los datos por metodo post.
                document.getElementById("resultados").addEventListener("click", function(e) {
                    console.log(e.target);
                    if (e.target.classList.contains("Guardar-valoracion")) {
                        

                        let valoracion = e.target.parentElement.querySelector("[name='valoracion']:checked").value; 
                        let favorito = e.target.parentElement.querySelector("[name='Favorito']".checked == true) ? 1 : 0;
                        let comentario = e.target.parentElement.querySelector("#comentario").value;
                        
                        let user = document.getElementById("username").value;
                        const numPelis = e.target.value;
                        const datosPeli = data.Search[numPelis];
                        
                        const datosEnvio = new FormData();
                        datosEnvio.append('user', user);
                        datosEnvio.append('favorito', favorito);
                        datosEnvio.append('valoracion', valoracion);
                        datosEnvio.append('comentario', comentario);
                        datosEnvio.append('titulo', datosPeli.Title);
                        datosEnvio.append('poster', datosPeli.Poster);
                        datosEnvio.append('idPeli', datosPeli.imdbID);
                        datosEnvio.append('añoProd', datosPeli.Year);
                        fetch(`./php/pelicula.php`, {
                                method: 'POST',
                                body: datosEnvio
                            });
                    }
                });
        });
    });
// devuelve el carousel y el video
function videos(){
    let htmlStr="";
    htmlStr+=`   
        <center>
            <h4>Películas mas populares</h4>
            <div class="carousel">
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=161&h=220"></a>
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=162&h=220"></a>
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=163&h=220"></a>
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=164&h=220"></a>
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=165&h=220"></a>
                <a class="carousel-item"><img src="https://api.lorem.space/image/movie?w=166&h=220"></a>
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
//funcion encargada de crear un juego
    document.getElementById("juego").addEventListener("click",function(){
        fetch('./json/output_generar_partida.json')
        .then(response => response.json() )
        .then(data => {
        console.log(data);
        
        let htmlStr="";
        htmlStr+=`
        <form method="post">
        <input name="nomPartida" type="text" class="btn waves-effect waves-light #90caf9 blue lighten-3"/>
        </form>
        `;
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
                        <input name="${data.peliculas[i].choice1}" type="button" value="${data.peliculas[i].choice1}" class="btn waves-effect waves-light #90caf9 blue lighten-3"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice2}" type="button" value="${data.peliculas[i].choice2}" class="btn waves-effect waves-light #90caf9 blue lighten-3"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice3}" type="button" value="${data.peliculas[i].choice3}" class="btn waves-effect waves-light #90caf9 blue lighten-3"/>
                    </label>
                    <label>
                        <input name="${data.peliculas[i].choice4}" type="button" value="${data.peliculas[i].choice4}" class="btn waves-effect waves-light #90caf9 blue lighten-3"/>
                    </label>
                </div>
            </form>
            </div>
        </center>
        </div><br>  
        `;
        };
        document.getElementById("contenidoJuego").innerHTML = htmlStr;
        //document.getElementById("")
    });
    });
    document.getElementById("mispelis").addEventListener("click",function(){
        fetch('./php/peliculaUsuario.php')
        .then(response => response.json() )
        .then(data => {
        console.log(data);
        let user = document.getElementById("username").value;
        let htmlStr="";
        if(user==data.pelicules.usuario){
        htmlStr+="<center><h4>Busqueda de Peliculas<h4></center>";

        
            for (let i = 0; i < 5; i++) {
                htmlStr+= `
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="${data.pelicules[i].poster}">
                    </div>
                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">${data.pelicules[i].titulo}<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">${data.pelicules[i].titulo}<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
                `;
}
        }
        document.getElementById("resultados").innerHTML = htmlStr;
    });
});
/*Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
})*/
