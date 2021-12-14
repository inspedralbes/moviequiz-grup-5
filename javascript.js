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


document.getElementById("busqueda").addEventListener("click",function(){
    let busqueda=document.getElementById("busquedaPeli").value;
        
        fetch(`http://www.omdbapi.com/?s=${busqueda}&apikey=93763d43`).then(function(res){
            return res.json();
        }).then(function(data){

                console.log(data);
                let htmlStr="";
                for (let index = 0; index < 8; index++) {


                    htmlStr += `
                                    <div class="col s4 m6 l3">
                                        <div id="pelicula" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}" width="50px;">
                                        </div>
                                        <center>
                                        <span class="card-title">${data.Search[index].Title}</span><br>
                                        <a class="waves-effect waves-light btn modal-trigger #1e88e5 blue darken-1" href="#modal${index}"><i class="material-icons">add</i></a>
                                        </center>
                                        <div id="modal${index}" class="modal #64b5f6 blue lighten-2">
                                            <div class="modal-content">
                                                <center>
                                                <h3>${data.Search[index].Title}</h3>
                                                <h5>Valoracion</h5>
                                                <div>
                                                    <label>
                                                        <input name="Favorito" type="checkbox"/>
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
                                                <div class"input-field">
                                                    <label for="comentario">Comentario<label>
                                                    <textarea id="comentario" class="materialize-textarea" data-length="150"></textarea> 
                                                </div>
                                                <div>
                                                    <a id="valoracion" class="waves-effect waves-light btn #1e88e5 blue darken-1">Guardar</a>
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

function videos(){
    let htmlStr="";
    htmlStr+=`
        <center>
        <video width="1000" height="500" id="video" autoplay muted>
        <source src="/vid/video2.mp4" type="video/mp4">
        </video>
        <center>
    `;
    document.getElementById("resultados").innerHTML = htmlStr;

    return htmlStr;
};
function modal(){
    let htmlStr="";
    

    document.getElementById("jugar").addEventListener("click",function(){
        fetch('http://www.omdbapi.com/?i=&apikey=93763d43')
        .then(response => response.json() )
        .then(data => {
        console.log(data);
        const pelis=data.peliculas;

        let htmlStr="";

        for (let i = 0; i < pelis.i; i++) {
        const element = pelis[i];        

        htmlStr += `<div class='card'>
                <h2>${element.Nombre}</h2>
                <img src='${element.Poster}'>
                <div>
                <input type="checkbox" name="opcion1" id="opcion1">
                <label for="opcion1">${element.choice1}</label>
                <input type="checkbox" name="opcion2" id="opcion2">
                <label for="opcion2">${element.choice2}</label>
                <input type="checkbox" name="opcion3" id="opcion3">
                <label for="opcion3">${element.choice3}</label>
                <input type="checkbox" name="opcion4" id="opcion4">
                <label for="opcion4">${element.choice4}</label>
                </div>
                </div>`;
        };
        htmlStr += `<button id='enviar'>JUGAR</button>`;
    });
    });
};

