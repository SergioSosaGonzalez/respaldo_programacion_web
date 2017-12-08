<?php

require 'productosConcretos.php';

class CarrosFactory{
	
	public static function crearCarro($tipoMotor, $cilindros) {
		switch($tipoMotor) {
			case MOTOR::DIESEL:
				return new CarroDiesel($cilindros);
				break;
			case MOTOR::GASOLINA:
				return new CarroGasolina($cilindros);
				break;
			case MOTOR::BIODIESEL:
				return new CarroBiodiesel($cilindros);
		}
	}
}

?>