<?php
class APIRest {
	public function API(){
		$resultado='';
		if($_SERVER['REQUEST_METHOD']=='POST' && 
			   isset($_POST['uno'])      && 
				isset($_POST['dos'])     &&
				isset($_POST['tres'])       &&
				isset($_POST['cuatro'])) {
            
			$resultado =$this->saludo($_POST['uno']);
         $resultado.=$this->alumno($_POST['uno'],$_POST['dos'],$_POST['tres'],$_POST['cuatro']);
    	} 
		echo $resultado; 
	}
   public function saludo($a){
        $mensaje="<h1>BIENVENIDO: $a</h1><br><br>";
        return $mensaje;
   } 
   public function alumno($a,$b,$c,$d){
        $mensaje="<table border=1>
                    <tr>
                        <td>Nombre:</td>
                        <td>$a</td>
                    </tr>
						  <tr>
                        <td>Edad:</td>
                        <td>$b</td>
                    </tr>
                    <tr>
                        <td>Semestre:</td>
                        <td>$c</td>
                    </tr>
                    <tr>
                        <td>Carrera:</td>
                        <td>$d</td>
                    </tr>
                </table><br><br>";
        return $mensaje;
    }
}
