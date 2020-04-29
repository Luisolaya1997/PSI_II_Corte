<?php
include_once 'Modelo.php';

class Controlador {
	private $modelo;
	function __construct(){
		$this->modelo = new Modelo();
	}

	function listar(){
		$docentes = $this->modelo->listar();
		return $docentes;
	}

	function get($id){
		$docente = $this->modelo->get($id);
		if($docente === 0){
			echo "<script>alert('Docente no encontrado');</script>";
			header('Location: index.php');
		}
		$docente = $docente->fetch(PDO::FETCH_OBJ);
		return $docente;
	}

	function actualizar($datos){
		$msj = $this->modelo->actualizar($datos);
		if($msj == 1){
			header('Location: index.php');
		}
		return 0;
	}

	function crear($datos){
		$msj = $this->modelo->crear($datos);
		if($msj == 1){
			header('Location: index.php');
		}
		return 0;
	}

	function eliminar($id){
		$msj = $this->modelo->eliminar($id);
		if($msj == 1){
			header('Location: index.php');
		}
		return 0;
	}
}