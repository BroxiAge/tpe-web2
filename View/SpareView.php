<?php

require_once "./libs/smarty/Smarty.class.php";

class SpareView{

    

    private $title;
    

    function __construct(){
        $this->title = "Productos";
    }

   

    function showTable($spares, $categories, $user){
        $smarty = new Smarty();
        $smarty->assign('title', $this->title);
        $smarty->assign('repuestos', $spares);
        $smarty->assign('categorias', $categories);
        $smarty->assign('user', $user);

        $smarty->display('templates/spareTable.tpl');
    }

    function ShowSpare($spare,$categories,$user){
        $smarty = new Smarty();
        $smarty->assign('title', $spare->name);
        $smarty->assign('categories', $categories);
        $smarty->assign ('spare', $spare);
        $smarty->assign ('user', $user);
            
        $smarty->display('templates/spare.tpl');
    }


}
?>