<?php

class SpareModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_repuestos;charset=utf8', 'root', '');
    }

    function getSpares(){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto");
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
   
    function getCategories(){
        
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getSpare($id_repuesto){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto WHERE id=?");
        $sentencia->execute(array($id_repuesto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function insertSpare($name, $vehicle, $categorie, $price, $description){

        $sentencia = $this->db->prepare("INSERT INTO repuesto(name,vehicle,id_categorie,price,description) VALUES(?,?,?,?,?)");
        return $ok = $sentencia->execute(array($name, $vehicle, $categorie, $price, $description));
    }

    function getSpareByNameAndVehicle($name,$vehicle){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto WHERE name=? and vehicle=?");
        $sentencia->execute(array($name,$vehicle));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function modifySpare($id,$categorie,$price,$description){
        $sentencia = $this->db->prepare("UPDATE repuesto SET id_categorie=? , price=? , description=? WHERE id=?");
        $sentencia->execute(array($categorie,$price,$description,$id));
    }
    function modifySpareById($categorie, $price, $description, $name, $vehicle, $id){
        $sentencia = $this->db->prepare("UPDATE repuesto SET id_categorie=?, price=?, description=?, name=?, vehicle=? WHERE id=?");
        $sentencia->execute(array($categorie, $price, $description, $name, $vehicle, $id));
        return $sentencia->rowCount();
    }

    function deleteSpare($name,$vehicle){
        $sentencia = $this->db->prepare("DELETE FROM repuesto WHERE name=? and vehicle=?");
        $sentencia->execute(array($name,$vehicle));
    }
    
    function deleteSpareById($id){
        $sentencia = $this->db->prepare("DELETE FROM repuesto WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }

    
}
