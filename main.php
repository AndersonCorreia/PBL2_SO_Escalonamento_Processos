<?php 
require "Escalonador.php";

$escalonador = new Escalonador();
$escalonador->addProcessos(5);
$escalonador->addProcessos(5);

print("\n\n END.");