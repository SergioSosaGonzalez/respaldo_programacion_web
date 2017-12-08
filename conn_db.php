<?php

require_once ('config.php');

	function db ()
	{
		$host=SERVER;
		$user=DBUSER;
		$passw=DBPASS;
		$db=DBNAME;
		$link = mysqli_connect($host,$user,$passw,$db);
		mysqli_query($link,"SET NAMES 'utf8'");
		/* verificar la conexión */
		if (mysqli_connect_errno()) {
		    printf("Conexión fallida: %s\n", mysqli_connect_error());
		    exit();
		}
		return $link;
	}

	function Query($sql)
	{
		global $link;
		$query = mysqli_query($link,$sql);
		return $query;
	}

	function query_datos($pCons)
	{
		$registros = array();
		while ($fila = mysqli_fetch_assoc($pCons))
		{
			$registros[] = $fila;
		}
		return $registros;
	}
		
	//Funcion para extraer un registro de la BD
	function query_dato($pCons)
	{
		$fila = mysqli_fetch_assoc($pCons);
		return $fila;
	}

	function desconectar($link)
	{
		mysqli_close($link);
	}