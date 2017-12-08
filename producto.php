<?php
    //0. Se carga la libreria
	require ('nusoap/lib/nusoap.php');
	require('conn_db_pdo.php');
    //1. Se crea el servidor
	$server = new nusoap_server();
	
	//2. Se configura
	$server->configureWSDL("producto", "urn:producto");
	 
	//3. Se registra la función
	$server->register("getProd",
	                  array("categoria" => "xsd:string"),
					  array("return" => "xsd:string"),
					  "urn:producto",
					  "urn:producto#getProd",
					  "rpc",
					  "encoded",
					  "Nos da una lista de productos de cada categoría");
	 
	$qr=DB::consulta("SELECT * FROM `datoscontato` WHERE id=:pdoid",array('pdoid' =>1);
	
    $datos="";
	foreach ($qr as $cnv) {
			 $datos=$cnv['correo'];
    }
    //echo $datos;
	 
	//4. Función que se ejecuta
	function getProd($categoria) {

		
		
        if ($categoria == "libros") {
            return join("<br/>", array(
								"HJKJ",
								"A  todos",
								"The Rails Way",
								"$datos"));
        }
        else if ($categoria == "revistas") {
            return join("<br/>", array(
								"PC Computo y más",
								"Muy Interesante",
								"National Geographics",
								"TV Autos"));
        }
        else {
            return "No hay productos de esta categoria";
        }
       
       }
    
	 
	//5. Se invoca el servicio
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>