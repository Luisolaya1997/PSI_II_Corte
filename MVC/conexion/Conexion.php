<?php


class Conexion {
    private $conexion;
    function __construct() {
        try {
            $this->conexion= new PDO("mysql:dbname=clase1;host=localhost;port=3306","userYca","&/%(KnowOut3415");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    function getConexion() {
        return $this->conexion;
    }


}