<?php
    //0. Se carga la libreria
	require_once "nusoap/lib/nusoap.php";
	require('conn_db_pdo.php');
    //1. Se crea la conexión 
	$cliente = new nusoap_client("http://localhost/programacionWeb/saludo.php");
    
	//2. Verifica errores
    $error = $cliente->getError();
	if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    
	//3. Llamada al servicio web
    $nombre="Eusebio";
	$result = $cliente->call("Saludar", array("nombre" => "$nombre"));
    
    
	//4. Recibe resultados, sino genera error
    if ($cliente->fault) {
 	    echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>" . $error . "</pre>";
        }
        else {
            echo "<h2>Bienvenido</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
?>