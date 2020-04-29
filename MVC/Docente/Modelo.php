<?php

include_once '../../conexion/Conexion.php';
class Modelo {
	private $conexion;
    function __construct() {
    	$temp = new Conexion();
    	$this->conexion = $temp->getConexion();
    }	

    function listar(){
    	try{
           $sql ="select * from Docente";
           $docentes = $this->conexion->prepare($sql);
           $docentes->execute();
           if($docentes->rowCount()==0){
               return "Lista vacia";
           }else{
               return $docentes;
           }
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function get($id){
    	try{
           $sql ="select * from Docente where cod=?";
           $docente = $this->conexion->prepare($sql);
           $docente->execute([$id]);
           if($docente->rowCount()==0){
               return 0;
           }else{
               return $docente;
           }
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function actualizar($datos){
    	try{
    		$cod = $datos['cod'];
			$nom = $datos['nom'];
			$tel = $datos['tel'];
			$fec = $datos['fec'];
			$codOld = $datos['codOld'];
			$sql ="update Docente set cod=?, nom=?,tel=?, fec=? where cod=?";
			$res = $this->conexion->prepare($sql);
			$res->execute([$cod,$nom,$tel,$fec,$codOld]);
			if($res){
			   return 1;
			}else{
			   return 0;
			}
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function crear($datos){
    	try{
    		$cod = $datos['cod'];
			$nom = $datos['nom'];
			$tel = $datos['tel'];
			$fec = $datos['fec'];
			$sql ="insert into Docente values (?,?,?,?)";
			$res = $this->conexion->prepare($sql);
			$res->execute([$cod,$nom,$tel,$fec]);
			if($res){
			   return 1;
			}else{
			   return 0;
			}
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function eliminar($id){
    	try{
			$sql ="delete from Docente where cod=?";
			$res = $this->conexion->prepare($sql);
			$res->execute([$id]);
			if($res){
			   return 1;
			}else{
			   return 0;
			}
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }


}

