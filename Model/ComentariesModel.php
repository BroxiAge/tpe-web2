<?php

class ComentariesModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_repuestos;charset=utf8', 'root', '');
    }

    function getComentariesByProductId($product_id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_repuesto=?");
        $sentencia->execute(array($product_id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
   
    function insertCommentary($commentary, $score, $id_user, $id_spare){

        $sentencia = $this->db->prepare("INSERT INTO comentarios(commentary, score, id_repuesto, id_usuarios) VALUES(?,?,?,?)");
        $sentencia->execute(array($commentary, $score, $id_spare,$id_user));
        return $this->db->lastInsertId();
    }
    
    function getCommentary($id){
        $sentencia = $this->db->prepare("SELECT * FROM repuesto WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    
}
