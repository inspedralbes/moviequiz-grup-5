<?php
include ('./model/players.php');

if(!empty($_POST['username']) && !empty($_POST['passwd'])){
$user = $_POST['username'];
$pwd = $_POST['passwd'];
$comp=array ("username" => $user, "passwd" => $pwd);
$player=new players();                                                               //$password_hash = password_hash($pwd,PASSWORD_BCRYPT);
$player->select($comp["username"]);                                                  //$result=$player->login($user,$pwd);//$password_hash);

                                                                                       //if($result==1){
   session_start();

    $arr = array ('exito'=>true,'nombre'=>$user,'imagen'=>'https://randomuser.me/api/portraits/men/23.jpg'); ;

    //console.log("logeado");
    $myJSON = json_encode($arr);
    echo $myJSON;


}else{
    $arr = array ('exito'=>false);

}




?>


