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
document.getElementById("busqueda").addEventListener("click",function(){
    let busqueda=document.getElementById("busquedaPeli").value;
        
        fetch(`http://www.omdbapi.com/?s=${busqueda}&apikey=93763d43`).then(function(res){
            return res.json();
        }).then(function(data){
                console.log(data);
                let htmlStr="";
                for (let index = 0; index < 10; index++) {


                    htmlStr += `<div >
                                    <div class="col s8 l4">
                                        <div id="pelicula" class="card">
                                            <div class="card-image">
                                            <img src="${data.Search[index].Poster}" width="50px">
                                            <a class="waves-effect waves-light btn modal-trigger blue" href="#modal${index}"><i class="material-icons">add</i></a>

                                            <div id="modal${index}" class="modal">
                                            <div class="modal-content">
                                              <h4>${data.Search[index].Title}</h4>
                                              <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos explicabo, aspernatur a laboriosam deleniti odit quidem blanditiis quia asperiores iste iusto minima est labore corrupti, totam vitae ad placeat obcaecati?
                                              </p>
                                            </div>
                                            <div class="modal-footer">
                                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atras</a>
                                            </div>
                                            </div>
                    
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
                //LE DIGO QUE ARRANQUE EL MODAL
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems,{});



        });
    });


