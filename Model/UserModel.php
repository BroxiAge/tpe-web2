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

    function GetUserById($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_user=?");
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

    function editRol($rolAModificar, $userAModificar){
        $sentencia = $this->db->prepare("UPDATE usuarios SET rol=? WHERE name=?");
        return $sentencia->execute(array($rolAModificar, $userAModificar));
        
    }

    function deleteUser($id_user){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_user=?");
        return $sentencia->execute(array($id_user));
         
    }
    
      
}

?>

