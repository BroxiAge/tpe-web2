<?php

class TestModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_repuestos;charset=utf8', 'root', '');
    }

    function getRepuestos(){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto");
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
?>