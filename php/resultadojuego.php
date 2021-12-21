<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('USER', 'a20marsolluc_admin');
define('PASSWORD', 'Admin1234');
define('HOST', 'localhost');
define('DATABASE', 'a20marsolluc_moviequiz');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}



$data = file_get_contents("./../json/recibir_manual.json");
$resultat = json_decode($data, true);

$aciertos = 0;
$fallos = 0;
$puntuacion =0;
$id_partida = $resultat['id_partida'];
$nom_partida = $resultat['nom_partida'];
$respuestas = $data;

for($i =0; $i<=4; $i++) {
    $id_peli[$i] = $resultat['respostes'][$i]['ImdbID'];
    $resposta[$i] = $resultat['respostes'][$i]['resposta'];
    $sql = "SELECT ano from peliculas WHERE id ='$id_peli[$i]'";
    $resultado2 = mysqli_query($conn, $sql);
    $row=$resultado2->fetch_assoc();
    $año = (int) $row['ano'];
    if($resposta[$i] == $año){
        $aciertos ++;
    }
    else{
        $fallos++;
    }
}
$puntuacion = ($aciertos*3) - ($fallos);

$insert = "INSERT INTO partida(id_partida, nom_partida, respuesta, aciertos, fallos, puntuacion) VALUES ('$id_partida', '$nom_partida','$respuestas', '$aciertos', '$fallos', '$puntuacion')";
$resultado = mysqli_query($conn, $insert);
$resultados = array('id_partida' => $id_partida, 'nom_partida' => $nom_partida, 'aciertos' => $aciertos, 'fallos' => $fallos, 'puntuacion' => $puntuacion);
echo json_encode($resultados);
mysqli_close($conn);
?>
