<?php

require_once "./libs/smarty/Smarty.class.php";

class TasksView{

    

    private $title;
    

    function __construct(){
        $this->title = "Lista de Tareas";
    }

    function ShowHome($tasks){

        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/tasks.tpl'); // muestro el template 
    }

    function ShowEditTask($task){
        //TODO hacer con Smarty
      
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>