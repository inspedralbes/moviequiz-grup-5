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
                });
            });


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, {duration:2000});
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
                for (let index = 0; index < 10; index++) {


                    htmlStr += `
                                    <div class="col s4 m6 l6">
                                        <div id="pelicula" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}" width="50px;">
                                            </div>
                                         
                                        </div> 
                                    </div>
                                                         
                                `;
                    //MODALS DE LAS PELICULAS PARA COMENTAR, NO FUNCIONA POR ALGUN MOTIVO
                    /*<a class="waves-effect waves-light btn modal-trigger #1e88e5 blue darken-1" href="#modal${index}"><i class="material-icons">add</i></a>

                                            <div id="modal${index}" class="modal #64b5f6 blue lighten-2">
                                            <div class="modal-content">
                                            <center>
                                            <h4>${data.Search[index].Title}</h4>

                                                <h3>Valoracion</p>
                                                <div>
                                                    <label>
                                                        <input name"Favorito" type="checkbox"/>
                                                        <span>Marcar como favorito</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <br>
                                                    <label>
                                                        <input name"valoracion" type="radio" value="1"/>
                                                        <span>1</span>
                                                    </label>
                                                    <label>
                                                        <input name"valoracion" type="radio" value="1"/>
                                                        <span>2</span>
                                                    </label>
                                                    <label>
                                                        <input name"valoracion" type="radio" value="1"/>
                                                        <span>3</span>
                                                    </label>
                                                    <label>
                                                        <input name"valoracion" type="radio" value="1"/>
                                                        <span>4</span>
                                                    </label>
                                                    <label>
                                                        <input name"valoracion" type="radio" value="1"/>
                                                        <span>5</span>
                                                    </label>

                                                </div>
                                                <div class"input-field">
                                                    <textarea id="comentario" class="materialize-textarea" data-length="150"></textarea>
                                                    <label for="comentario">Comentario<label>
                                                </div>
                                                <div>
                                                    <a class="waves-effect waves-light btn #1e88e5 blue darken-1">Guardar</a>
                                                </div>
                                            </center>
                                            </div>
                                            <div class="modal-footer #1e88e5 blue darken-1">
                                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atras</a>
                                            </div>
                                        </div>*/
                                        
         
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
    htmlStr+=`  
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>`
};

