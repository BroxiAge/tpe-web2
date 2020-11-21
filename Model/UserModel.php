<?php

class UserModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_repuestos;charset=utf8', 'root', '');
    }
  

    function GetUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE name=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUsers(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function insertNewUser($user, $passHash){
        $rolUser = 0; // Significa que no es admin, ni tampoco invitado. Solo usuario { 1 ADMIN / 2 USUARIO / 0 INVITADO }
        $sentencia = $this->db->prepare("INSERT INTO usuarios(name, password, rol) VALUES(?,?,?)");
        return $sentencia->execute(array($user, $passHash, $rolUser ));
        
    }
      
}

?>

