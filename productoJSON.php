<?php
    //0. Se carga la libreria
	require_once "nusoap/lib/nusoap.php";
	require('conn_db_pdo.php');
    //1. Se crea el servidor
	$server = new nusoap_server();
	
	//2. Se configura
	$server->configureWSDL("producto", "urn:producto");
	 
	//3. Se registra la función
	$server->register("getProd",
	                  array("categoria" => "xsd:string", "pId" => "xsd:string"),
	                  array("return" => "xsd:string"),
					  "urn:producto",
					  "urn:producto#getProd",
					  "rpc",
					  "encoded",
					  "Nos da una lista de productos de cada categoría");
	 
	//4. Función que se ejecuta
	function getProd($categoria,$pId) {
		//$categoria = json_decode($categoria);
		$qr = DB::consulta("SELECT * FROM `datoscontato` WHERE id =:pdoid",array('pdoid'=>$pId));
		foreach ($qr as $cnv) {
			# code...
		
        if ($categoria == "contacto") {

        	$libros = array(array('id' => $cnv['id'], 'correo' => $cnv['correo'], 'telefono' => $cnv['telefono']));
        	return json_encode($libros);
        }
        else if ($categoria == "numeros") {
        	$revistas = array(array('direccion' =>$cnv['direccion'], 'casa' => $cnv['numero_casa']));
            return json_encode($revistas);
        }
        else {
            return "No hay productos de esta categoria";
        }
       }
    }
	 
	//5. Se invoca el servicio
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>