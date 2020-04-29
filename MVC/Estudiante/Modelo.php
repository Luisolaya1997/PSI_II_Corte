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
           $sql ="select * from Estudiante";
           $estudiantes = $this->conexion->prepare($sql);
           $estudiantes->execute();
           if($estudiantes->rowCount()==0){
               return "Lista vacia";
           }else{
               return $estudiantes;
           }
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function get($id){
    	try{
           $sql ="select * from Estudiante where cod=?";
           $estudiante = $this->conexion->prepare($sql);
           $estudiante->execute([$id]);
           if($estudiante->rowCount()==0){
               return 0;
           }else{
               return $estudiante;
           }
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
    }

    function actualizar($datos){
    	try{
    		$cod = $datos['cod'];
        $nom = $datos['nom'];
        $gen = $datos['gen'];
        $dir = $datos['dir'];
        $fec = $datos['fec'];
        $codOld = $datos['codOld'];
        $sql ="update Estudiante set cod=?, nom=?,gen=?, dir=?, nam=? where cod=?";
        $res = $this->conexion->prepare($sql);
        $res->execute([$cod,$nom,$gen,$dir,$fec,$codOld]);
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
        $gen = $datos['gen'];
        $dir = $datos['dir'];
        $fec = $datos['fec'];
        $sql ="insert into Estudiante(cod,nom,gen,dir,nam) values (?,?,?,?,?)";
        $res = $this->conexion->prepare($sql);
        $res->execute([$cod,$nom,$gen,$dir,$fec]);
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
			$sql ="delete from Estudiante where cod=?";
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

