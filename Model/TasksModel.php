<?php

class TasksModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    }
         
      function GetTasks(){
          $sentencia = $this->db->prepare("SELECT * FROM task");
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }

      function GetTask($id_task){
        $sentencia = $this->db->prepare("SELECT * FROM task WHERE id=?");
        $sentencia->execute(array($id_task));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
      function InsertTask($title,$description,$completed,$priority){
          $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
          $sentencia->execute(array($title,$description,$completed,$priority));
      }
      
      function DeleteTaskDelModelo($task_id){
          $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
          $sentencia->execute(array($task_id));
      }
      
      function MarkAsCompletedTask($task_id){
          $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
          $sentencia->execute(array($task_id));
      
      }
      
}

?>