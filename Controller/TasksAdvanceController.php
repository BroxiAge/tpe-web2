<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

class TasksAdvanceController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new TasksView();
        $this->model = new TasksModel();

    }
    

    function AutoCompletar(){
        $tasks = $this->model->GetTasks();

        foreach($tasks as $task){
            $title = $task->title;
            $word = "Completada";

            if(strpos($title, $word) !== false){
                $this->model->MarkAsCompletedTask($task->id);
            }
        }

       $tasks = $this->model->GetTasks();
       
       $this->view->ShowHome($tasks);
    }
}


?>