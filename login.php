<?php

$user = $_POST['username'];

$pwd = $_POST['pwd'];

$timer=rand(1,7);

sleep($timer);

if (($user == "admin")  && ($pwd == "1234")) {

    session_start();

    $arr = array('exito' => true, 'nombre' => "Alvaro Perez", 'imagen' => 'https://randomuser.me/api/portraits/men/23.jpg');

}else {

        $arr = array ('exito'=>false);

}

$myJSON = json_encode($arr);

echo $myJSON;

?>