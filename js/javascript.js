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
//funciones de redirecionamiento i modals
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
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
                    if (e.target.classList.contains("Guardar-valoracion")) {
                        

                        let valoracion = e.target.parentNode.parentNode.querySelector("[name='valoracion']:checked").value; 
                        let favorito = e.target.parentNode.parentNode.querySelector("[name='Favorito']".checked == true) ? 1 : 0;
                        let comentario = e.target.parentNode.parentNode.querySelector("#comentario").value;
                        
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
        fetch('./php/juego.php')
        .then(response => response.json() )
        .then(data => {
        
        let htmlStr="";
        for (let i = 0; i < 5; i++) {
        
        htmlStr += `
      
        <div>
        <center>
            <h5>${data[i].juego.nombre}</h5>
            <img src='${data[i].juego.poster}' width="200px">
            <div>
                 <div>
                    <br>
                    <label>
                        <input name="juego${i}" type="radio" value="${data[i].juego.opciones[0]}"/><span>${data[i].juego.opciones[0]}</span>
                    </label>
                    <label>
                        <input name="juego${i}" type="radio" value="${data[i].juego.opciones[1]}"/><span>${data[i].juego.opciones[1]}</span>
                    </label>
                    <label>
                        <input name="juego${i}" type="radio" value="${data[i].juego.opciones[2]}"/><span>${data[i].juego.opciones[2]}</span>
                    </label>
                    <label>
                        <input name="juego${i}" type="radio" value="${data[i].juego.opciones[3]}"/><span>${data[i].juego.opciones[3]}</span>
                    </label>
                </div>
            
            </div>
        </center>
        </div><br>  
        `;
        };
        document.getElementById("contenidoJuego").innerHTML = htmlStr;
        document.getElementById("enviarJuego").addEventListener("click",function(){
            
            
            let juego0 = document.querySelector("[name='juego0']:checked").value;
            let juego1 = document.querySelector("[name='juego1']:checked").value;
            let juego2 = document.querySelector("[name='juego2']:checked").value;
            let juego3 = document.querySelector("[name='juego3']:checked").value;
            let juego4 = document.querySelector("[name='juego4']:checked").value;

            var respuestas = [];
            respuestas[0]=juego0;
            respuestas[1]=juego1;
            respuestas[2]=juego2;
            respuestas[3]=juego3;
            respuestas[4]=juego4;

            let datosEnvio = new FormData();

                for (i = 0; i < data.length; i++) {
                    datosEnvio.append('id_partida', data[i].juego.id);
                    datosEnvio.append('juego0', juego0);
                    datosEnvio.append('juego1', juego1);
                    datosEnvio.append('juego2', juego2);
                    datosEnvio.append('juego3', juego3);
                    datosEnvio.append('juego4', juego4);
                }

                var datos = {
                    'partida' :[]
                  };
                  
                  //guardas los datos
                  for (var i = 0; i < data.length; i++) {
                  
                    datos.partida.push({
                      "id": data[i].juego.id,
                      "respuesta": respuestas[i],
                    });
                  };

                datosGame = JSON.stringify(datos);

                console.log(datosGame);

                const datosEnviar = new FormData();
                datosEnviar.append("json",datosGame);

                fetch(`http://http://moviequiz5.alumnes.inspedralbes.cat/php/resultadojuego.php`,{
                    method: 'POST',
                    body: datosEnviar
            });




            fetch(`./php/juegoAca.php`, {
                method: 'POST',
                body: json
                
            });      
            
        });    
    });
    });

    //funcion que devuelve las peliculas guardadas por el usuario
    document.getElementById("mispelis").addEventListener("click",function(){

        let usuario = document.getElementById("username").value;
        const datosEnvio = new FormData();
        datosEnvio.append('user', usuario);
        fetch('./php/MisPeliculas.php',{

            method: 'POST',

            body: datosEnvio
        })
        .then(response => response.json() )
        .then(data => {
            
            let htmlStr="";
            htmlStr+="<center><h4>Peliculas Favoritas<h4></center>";

                for (let i = 0; i < data.misPeliculas.length; i++) {
                    htmlStr+= `


                    <div class="col s4 m4 l4">
                      <div class="card">
                        <div class="card-image">
                          <img src="${data.misPeliculas[i].poster}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">${data.misPeliculas[i].titulo}</span>
                        </div>
                      </div>
                    </div>

                    `;
                }

        document.getElementById("resultados").innerHTML = htmlStr;
    });
});

// funcion que devuelve los datos de usuario 
document.getElementById("misDatosbtn").addEventListener("click",function(){

    let usuario = document.getElementById("username").value;
    const datosEnvio = new FormData();
        datosEnvio.append('user', usuario);
    fetch(`./php/usuario.php`, {

        method: 'POST',

        body: datosEnvio

    }).then(response => response.json()).then(data => {
        
    let htmlStr="";
    htmlStr+=`
        <img src="https://randomuser.me/api/portraits/men/23.jpg"  width="100">
        <p><b>ID:</b> ${data.usuario[0].id}</p>
        <p><b>Usuario:</b> ${data.usuario[0].username}</p>
        <p><b>Email:</b> ${data.usuario[0].email}</p>
    `;
    document.getElementById("DatosPersonales").innerHTML = htmlStr;
    });
});

