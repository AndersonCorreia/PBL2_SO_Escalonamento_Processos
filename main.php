<?php 
require "Escalonador.php";

$escalonador = new Escalonador();
$escalonador->addProcessos(5);
$escalonador->run();

print("\n\n END.");