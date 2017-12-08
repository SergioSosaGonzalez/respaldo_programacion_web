<?php

require 'producto.php';

class MotorDiesel extends Motor {
	public function __construct($cilindros) {
		$this->cilindros = $cilindros;
	}
}
class MotorGasolina extends Motor {
	public function __construct($cilindros) {
		$this->cilindros = $cilindros;
	}
}
class MotorBiodiesel extends Motor {
	public function __construct($cilindros) {
		$this->cilindros = $cilindros;
	}
}
class CarroDiesel extends Carro {
	public function __construct($cilindros) {
		$this->motor = new MotorDiesel($cilindros);
	}
}
class CarroGasolina extends Carro {
	public function __construct($cilindros) {
		$this->motor = new MotorGasolina($cilindros);
	}
}
class CarroBiodiesel extends Carro {
	public function __construct($cilindros) {
		$this->motor = new MotorBiodiesel($cilindros);
	}
}


?>