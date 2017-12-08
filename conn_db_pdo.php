<?php 
    define('SERVER', 'localhost');
    define('DBUSER', 'root');//
    define('DBPASS', '1234');//
    define('DBNAME', 'programacionweb');//
    /*class PDOp {
        protected $PDO;
        public $numExecutes;
        public $numStatements;
       
        public function __construct($dsn, $user=NULL, $pass=NULL, $driver_options=NULL) {
            $this->PDO = new PDO($dsn, $user, $pass, $driver_options);
            $this->numExecutes = 0;
            $this->numStatements = 0;
        }
        public function __call($func, $args) {
            return call_user_func_array(array(&$this->PDO, $func), $args);
        }
        public function prepare() {
            $this->numStatements++;
            
            $args = func_get_args();
            $PDOS = call_user_func_array(array(&$this->PDO, 'prepare'), $args);
            
            return new PDOpStatement($this, $PDOS);
        }
        public function query() {
            $this->numExecutes++;
            $this->numStatements++;
            
            $args = func_get_args();
            $PDOS = call_user_func_array(array(&$this->PDO, 'query'), $args);
            
            return new PDOpStatement($this, $PDOS);
        }
        public function exec() {
            $this->numExecutes++;
            
            $args = func_get_args();
            return call_user_func_array(array(&$this->PDO, 'exec'), $args);
        }
    }
    class PDOpStatement implements IteratorAggregate {
        protected $PDOS;
        protected $PDOp;
        public function __construct($PDOp, $PDOS) {
            $this->PDOp = $PDOp;
            $this->PDOS = $PDOS;
        }
        public function __call($func, $args) {
            return call_user_func_array(array(&$this->PDOS, $func), $args);
        }
        public function bindColumn($column, &$param, $type=NULL) {
            if ($type === NULL)
                $this->PDOS->bindColumn($column, $param);
            else
                $this->PDOS->bindColumn($column, $param, $type);
        }
        public function bindParam($column, &$param, $type=NULL) {
            if ($type === NULL)
                $this->PDOS->bindParam($column, $param);
            else
                $this->PDOS->bindParam($column, $param, $type);
        }
        public function execute() {
            $this->PDOp->numExecutes++;
            $args = func_get_args();
            return call_user_func_array(array(&$this->PDOS, 'execute'), $args);
        }
        public function __get($property) {
            return $this->PDOS->$property;
        }
        public function getIterator() {
            return $this->PDOS;
        }
   }*/


class DB { 
    
    private static $objInstance; 
    
    /* 
     * Class Constructor - Create a new database connection if one doesn't exist 
     * Set to private so no-one can create a new instance via ' = new DB();' 
     */ 
    private function __construct() {} 
    
    /* 
     * Like the constructor, we make __clone private so nobody can clone the instance 
     */ 
    private function __clone() {} 
    
    /* 
     * Returns DB instance or create initial connection 
     * @param 
     * @return $objInstance; 
     */ 
    public static function getInstance(  ) { 
            
        if(!self::$objInstance){ 
            self::$objInstance = new PDO('mysql:host='.SERVER.';dbname='.DBNAME,DBUSER, DBPASS); 
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } 
        
        return self::$objInstance; 
    
    } # end method 
    
    /* 
     * Passes on any static calls to this class onto the singleton PDO instance 
     * @param $chrMethod, $arrArguments 
     * @return $mix 
     */ 
    final public static function __callStatic( $chrMethod, $arrArguments ) { 
            
        $objInstance = self::getInstance(); 
        
        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments); 
        
    } # end method
    private static function preparacion($statement,$consulta,$valores=array()){
        if(count($valores)>0 && preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
                $campo = array_pop($campo); //inserto en un arreglo
                foreach($campo as $parametro){
                    $statement->bindValue($parametro, $valores[substr($parametro,1)]);
                }
        }
        return $statement;
    } 
    public static function insertar($consulta='',$valores=array()){
        $pdo=self::getInstance();
        
        if($statement = $pdo->prepare($consulta)){  //prepara la consulta
            $statement = self::preparacion($statement,$consulta,$valores);
            try { 
                if (!$statement->execute()) { //si no se ejecuta la consulta...
                    
                    print_r($statement->errorInfo()); //imprimir errores
                }
                return true;

            }
            catch(PDOException $e){
                echo "Error de ejecución: \n";
                print_r($e->getMessage());
            }   
        }
    }

public static function eliminar($consulta='',$valores=array()){
        $pdo=self::getInstance();
        
        if($statement = $pdo->prepare($consulta)){  //prepara la consulta
            $statement = self::preparacion($statement,$consulta,$valores);
            try { 
                if (!$statement->execute()) { //si no se ejecuta la consulta...
                    
                    print_r($statement->errorInfo()); //imprimir errores
                }
                return true;

            }
            catch(PDOException $e){
                echo "Error de ejecución: \n";
                print_r($e->getMessage());
            }   
        }
    }

    public static function actualizar($consulta='',$valores=array()){
        $pdo=self::getInstance();
        
        if($statement = $pdo->prepare($consulta)){  //prepara la consulta
            $statement = self::preparacion($statement,$consulta,$valores);
            try { 
                if (!$statement->execute()) { //si no se ejecuta la consulta...
                    
                    print_r($statement->errorInfo()); //imprimir errores
                }
                return true;

            }
            catch(PDOException $e){
                echo "Error de ejecución: \n";
                print_r($e->getMessage());
            }   
        }
    }
    public static function consulta($consulta='',$valores=array()){
        $pdo=self::getInstance();
        $resultado=array();

        if($statement = $pdo->prepare($consulta)){  //prepara la consulta
            $statement = self::preparacion($statement,$consulta,$valores);
            try { 
                if (!$statement->execute()) { //si no se ejecuta la consulta...
                    
                    print_r($statement->errorInfo()); //imprimir errores
                }
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
                $statement->closeCursor();
            }
            catch(PDOException $e){
                echo "Error de ejecución: \n";
                print_r($e->getMessage());
            }   
        }
        return $resultado;
    }
    public static function dato($consulta='',$valores=array(),$dato=''){
        $pdo=self::getInstance();
        $resultado=array();

        if($statement = $pdo->prepare($consulta)){  //prepara la consulta
            $statement = self::preparacion($statement,$consulta,$valores);
            try {
                if (!$statement->execute()) { //si no se ejecuta la consulta...
                    print_r($statement->errorInfo()); //imprimir errores
                }
                $resultado = $statement->fetch(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
                $statement->closeCursor();
            }
            catch(PDOException $e){
                echo "Error de ejecución: \n";
                print_r($e->getMessage());
            }   
        }
        return $resultado[$dato];
    }
    public static function generaSelect($consulta='',$dato=''){
       $rows=self::consulta($consulta);
       foreach ($rows as $row) { ?>
          <option value="<?=$row['id']?>" <?=$dato==$row['id']? "selected":"" ?> ><?=utf8_encode($row['nombre'])?></option>
 <?php } 
    }
} 