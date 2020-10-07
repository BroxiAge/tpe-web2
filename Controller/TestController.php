<?php

require_once "./View/TestView.php";
require_once "./Model/TestModel.php";



class TestController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new TestView();
        $this->model = new TestModel();

    }
    
    
    function ShowText(){
        $lala = "Texto a mostrar"; //aca supongo que lo traje del model
        $this->view->MostrarText($lala);
       
    }

    function EditarForm(){
       $text1 = $_POST["input_test1"];
       $text2 = $_POST["input_test2"];

       $this->view->MostrarInputs($text1,$text2);
    }

    function MostrarTabla(){
        $repuestos = $this->model->getRepuestos();
        $this->view->mostrarTabla($repuestos);
    }
}
?>


