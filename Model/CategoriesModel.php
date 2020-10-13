<?php

class CategoriesModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_repuestos;charset=utf8', 'root', '');
    }

    function getCategories(){
        
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getSparesByCategorie($categorie_id){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto WHERE id_categorie=?");
        $sentencia->execute(array($categorie_id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategorieId($categorie_name){
        
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE name=?");
        $sentencia->execute(array($categorie_name));
        return $sentencia->fetch(PDO::FETCH_OBJ)->id_categorie;
        
    }
    function getCategorie($categorie_name){
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE name=?");
        $sentencia->execute(array($categorie_name));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function addCategorie($categorie_name){
        $sentencia = $this->db->prepare("INSERT INTO categoria(name) VALUES(?)");
        $sentencia->execute(array($categorie_name));
    }

    function deleteCategorie($categorie_name){

        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE name=?");
        $sentencia->execute(array($categorie_name));


    }

    function modifyCategorie($categorie_name, $new_name){
        $sentencia = $this->db->prepare("UPDATE categoria SET name=? WHERE name=?");
        $sentencia->execute(array($new_name, $categorie_name));
    }
    
}
?>