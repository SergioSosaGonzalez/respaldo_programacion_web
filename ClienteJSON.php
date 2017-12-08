<?php
    //0. Se carga la libreria
	require_once "nusoap/lib/nusoap.php";
	
    //1. Se crea la conexión 
	$cliente = new nusoap_client("http://localhost/programacionWeb/productoJSON.php");
    
	//2. Verifica errores
    $error = $cliente->getError();
	if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    
       	//3. Llamada al servicio web
        $categoria = "contacto";
        $id="1";
    	  $result = $cliente->call("getProd", array('categoria' => $categoria,'pId'=>$id));
        echo '<h1><center>Respuesta en formato JSON:</center></h1><h3>' . $result . "</h3><br/>";
        $result = json_decode($result);
        //print_r($result);

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
                echo '<h1><center>Procesando Datos de JSON:</center></h1>';
                echo "<h2>".strtoupper($categoria)."</h2><pre>";
                foreach ($result as $key => $value) {
                    print_r($value);            
                }
                echo "</pre>";
            }
        }
   
    
?>