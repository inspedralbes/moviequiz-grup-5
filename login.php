<?php
include ('./model/players.php');

$user = $_POST['username'];

$pwd = $_POST['passwd'];
$password_hash = password_hash($pwd,PASSWORD_BCRYPT);
$player=new players();

$result=$player->login($user,$password_hash);

if($result==1){
    echo "okay";
    console.log("logeado");

}else{
    echo "No.";

}



?>

<?php
/*require_once("controller_MQ.php");
$controller = new controller();
$resposta = $controller->login();
$res = json_encode($resposta);
echo $res;
*/
?>
