<?php

require_once "./libs/smarty/Smarty.class.php";

class TestView{

    

    private $title;
    

    function __construct(){
        $this->title = "Productos";
    }

    function MostrarText($lala){
        $smarty = new Smarty();
        $smarty->assign('cosa1','mostrandocosa1');
        $smarty->assign('cosa2', 'mostrandocosa2');
        $smarty->assign('cosaporparametro', $lala);

        $smarty->display('templates/TestForm.tpl'); // muestro el template 
    }

     
       function MostrarInputs($text1,$text2){
        
        $smarty = new Smarty();
        $smarty->assign('input1',$text1);
        $smarty->assign('input2', $text2);
        
        $smarty->display('templates/TestMostrarForm.tpl');

       }

       function mostrarTabla($repuestos){
           $smarty = new Smarty();

           $smarty->assign('titulo_s', $this->title);
           $smarty->assign('repuestos', $repuestos);

           $smarty->display('templates/TestMostrarRepuestos.tpl');

       }

    
}


?>