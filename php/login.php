<?php
include ('./model/players.php');

if(!empty($_POST['username']) && !empty($_POST['passwd'])){
$user = $_POST['username'];
$pwd = $_POST['passwd'];
$comp=array ("username" => $user, "passwd" => $pwd);
$player=new players();                                                               
$player->select($comp["username"]);                                                  

                                                                                     
   session_start();

    $arr = array ('exito'=>true,'nombre'=>$user,'imagen'=>'https://randomuser.me/api/portraits/men/23.jpg'); ;

    //console.log("logeado");
    $myJSON = json_encode($arr);
    echo $myJSON;


}else{
    $arr = array ('exito'=>false);

}




?>


