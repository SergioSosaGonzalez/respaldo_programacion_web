<?php

/**
* 
*/
class db
{
	private $conexion;
	
	public function conectar()
	{
		if(!isset($this->conexion))
        {
             $this->conexion = (mysql_connect("localhost","root","1234")) or die(mysql_error());
             mysql_select_db("MVC",$this->conexion) or die(mysql_error());
        }
	}

	public function consulta($sql)
    {
        $resultado = mysql_query($sql,$this->conexion);
        if(!$resultado)
        {
        	 
             echo 'MySQL Error: ' . mysql_error();
             exit;
        }
        return $resultado;
    }

    function numero_de_filas($result)
    {
       if(!is_resource($result)) return false;
       return mysql_num_rows($result);
    }

    function fetch_assoc($result)
    {
      if(!is_resource($result)) return false;
      return mysql_fetch_assoc($result);
    }

    public function disconnect()
    {
      mysql_close();
    }

}

?>