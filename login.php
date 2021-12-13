<?php
include ('./model/players.php');

$user = $_POST['username'];

$pwd = $_POST['password_hash'];

$player=new players();

$result=$player->login($user,$pwd);

if($result==1){
    echo "okay";

}else{
    echo "No.";

}


/*
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
*/

?>

<?php
/*require_once("controller_MQ.php");
$controller = new controller();
$resposta = $controller->login();
$res = json_encode($resposta);
echo $res;
*/
?>
