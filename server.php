<?php 
include('nusoap/lib/nusoap.php'); 
$server = new soap_server; 
$server->configureWSDL('obtenerProductos', 'urn:obtenerProductos');     
$server->register('MetodoConsulta',
                   array('param_id'=> 'xsd:string','param_correo'=>'xsd:string'),
                   array('return'=>'xsd:string'),
                   'urn:MetodoConsultawsdl',
                   'urn:MetodoConsultawsdl#MetodoConsulta',
                   'rpc',
                   'encoded',
                   'Retorna el datos'
                   );

function MetodoConsulta($param_id){

  $link= mysql_connect("localhost","root","1234") or die("Error: ".mysql_error());
  $ddbb = mysql_select_db("programacionweb") or die("Error: ".mysql_error());

  $query = "SELECT * FROM `datoscontato` WHERE id='$param_id'";
  $result = mysql_query($query) or die('consulta Fallida'.mysql_error());

  $row= mysql_fetch_array($result);

  $id = $row['id'];
  $correo=$row['correo'];

  return "Resultado = ".strtoupper($id)." ".strtoupper($correo);
  mysql_free_result($result);
  mysql_close($link); 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server -> service($HTTP_RAW_POST_DATA);

?>