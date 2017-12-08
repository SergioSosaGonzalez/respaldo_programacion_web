<?php

//hacemos un require_once del archivo que contiene nuestra clase
require_once 'patronsingleton.php';
//accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de 
//crear nuevas instancias, lo que ahorra consumo de recursos
$nuevoSingleton = PatronSingleton::singleton();
//accedemos al método usuarios y los mostramos
$usuario = $nuevoSingleton->usuarios();
?>
Mostramos a todos los usuarios<br />
<?php
foreach ($usuario as $fila):?>
    <?=$fila['nombre']?> || <?=$fila['carrera']?><br /> 
<?php
endforeach;

?>