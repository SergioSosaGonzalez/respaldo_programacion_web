<?php

class PatronSingleton{
	
    // Contenedor de la instancia del singleton
    private static $instancia;
	private $usuarios = array();
	private $dbh;
 
    // Un constructor privado evita la creación de un nuevo objeto
    private function __construct() {
		$this->dbh = new PDO("mysql:host=localhost; dbname=mvc","root","1234");
    }
 
    // método singleton
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        } 
        return self::$instancia;
    }
	
	public function usuarios()
	{
		$consulta = $this->dbh->prepare("SELECT * FROM universitario");
		$consulta->execute();
		if ($consulta->rowCount()>0) 
		{
            while($reg = $consulta->fetch())
            {
               $this->usuarios[]=$reg;
        	}
            return $this->usuarios;     
        }
	}
   
    // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}

?>