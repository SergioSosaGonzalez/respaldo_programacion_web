<?php     
// incluyo nusoap  
require('nusoap/lib/nusoap.php'); 
   
$l_oClient = new nusoap_client('http://localhost/programacionWeb/server.php'); 

 
$error = $l_oClient->getError();
	if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }

$param_id = 2;
$result = $l_oClient->call("MetodoConsulta",array("param_id"=>$param_id));

if ($l_oClient->fault) {
 	    echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $l_oClient->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>" . $error . "</pre>";
        }
        else {
            echo "<h2>".strtoupper($param_id)."</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
?>