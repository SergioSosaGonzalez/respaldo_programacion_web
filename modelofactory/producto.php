<?php

abstract class Motor {
	const DIESEL = 0;
	const GASOLINA = 1;
	const BIODIESEL = 2;
	protected $encendido = false;
	protected $cilindros;
	public function enciende() {
		if(!$this->encendido) {
			$this->encendido = true;
			echo "Encendiendo motor ... run run run\n";
		} else {
			throw new Exception("Eh!! Ya encendiste el motor!\n");
		}
	}
}
abstract class Carro {
	protected $motor;
	protected $encendido = false;
	public function enciende() {
		if(!$this->encendido) {
			$this->encendido = true;
			try {
				$this->motor->enciende();
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			throw new Exception("El carro ya esta encendido!!\n");
		}
	}
}


?>