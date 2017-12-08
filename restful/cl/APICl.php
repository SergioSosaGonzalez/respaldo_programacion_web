<?php

class APICl {
	public function API($nombre,$edad,$semestre,$carrera){
	   // Dirección del recurso
	   
		$url = "http://localhost/programacionWeb/restful/ws/pruebaRest.php";
	  
	   // Lista de variables para enviar
	   $data = array(
			'uno'    => $nombre,
			'dos'    => $edad,
			'tres'   => $semestre,
			'cuatro' => $carrera,
	   );

	   //Enviar solicitud al recurso
	   $ch = curl_init();

	   //set the url, number of POST vars, POST data
	   curl_setopt($ch,CURLOPT_URL, $url);
	   curl_setopt($ch,CURLOPT_POST, true);
	   curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

	   //execute post
	   $result = curl_exec($ch);

	   //close connection
	   curl_close($ch);
	}
}
?>
