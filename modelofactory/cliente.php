<?php

require 'carrosFactory.php';

$camioneta = CarrosFactory::crearCarro(MOTOR::DIESEL,    8);
$sedan	   = CarrosFactory::crearCarro(MOTOR::GASOLINA,  4);
$autobus   = CarrosFactory::crearCarro(MOTOR::DIESEL,    8);
$hibrido   = CarrosFactory::crearCarro(MOTOR::BIODIESEL, 4);
$camioneta->enciende();
$sedan->enciende();
$autobus->enciende();
$hibrido->enciende();


?>