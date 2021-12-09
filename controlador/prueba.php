<?php
require ("../model/players.php");

$player=new players();

echo("player creado");

$resultado=$player -> selectAll();

print_r($resultado);

echo("hola");
?> 