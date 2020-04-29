<?php
include_once 'Modelo.php';

class Controlador {
	private $modelo;
	function __construct(){
		$this->modelo = new Modelo();
	}

	function listar(){
		$estudiantes = $this->modelo->listar();
		return $estudiantes;
	}

	function get($id){
		$estudiante = $this->modelo->get($id);
		if($estudiante === 0){
			echo "<script>alert('Estudiante no encontrado');</script>";
			header('Location: index.php');
		}
		$estudiante = $estudiante->fetch(PDO::FETCH_OBJ);
		return $estudiante;
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