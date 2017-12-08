<?php
    //0. Se carga la libreria
	require_once "nusoap/lib/nusoap.php";
	
	//1. Se crea el servidor
	$server = new soap_server();
    
	//2. Se configura
	$server->configureWSDL('Web Service de Ejemplo', 'urn:WebServiceEjemplo');
	
	//3. Se registra la función
	$server->register('Saludar', // nombre del metodo o funcion
		array('nombre' => 'xsd:string'), // parametros de entrada
		array('return' => 'xsd:string'), // parametros de salida
		'urn:WebServiceEjemplo', // namespace
		'urn:WebServiceEjemplo#Saludo', // soapaction
		'rpc', // style
		'encoded', // use
		'La siguiente funcion recibe un nombre y saluda' // documentation
	);
          
    //4. Función que se ejecuta
	function Saludar($nombre) {
		return "Holis " . $nombre . "!";
	}
	
	//5. Se invoca el servicio
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>