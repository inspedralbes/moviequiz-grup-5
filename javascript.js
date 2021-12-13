/*let u = document.getElementById("username").value;

let p = document.getElementById("pwd").value;


            const datosEnvio = new FormData();

            datosEnvio.append('username', u);

            datosEnvio.append('pwd', p);


fetch(`https://labs.inspedralbes.cat/~aperezh/login2.php`, {

                    method: 'POST',

                    body: datosEnvio

                })

                .then(response => response.json())

                .then(data => {

                    console.log(data);
                });

*/
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


                    htmlStr += `<div>
                                    <div class="col s8 m6 l2">
                                        <div id="pelicula" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}" width="50px">
                                            <a class="waves-effect waves-light btn modal-trigger #1e88e5 blue darken-1" href="#modal${index}"><i class="material-icons">add</i></a>

                                            <div id="modal${index}" class="modal #64b5f6 blue lighten-2">
                                            <div class="modal-content">
                                            <center>
                                            <h4>${data.Search[index].Title}</h4>

                                                <p>Valoracion</p>

                                                </center>

                                            </div>
                                            <div class="modal-footer #1e88e5 blue darken-1">
                                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atras</a>
                                            </div>
                                            </div>
                    
                                            </div>

                                            <div class="card-content">
                                            <p><b>${data.Search[index].Title}</b></p>
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



