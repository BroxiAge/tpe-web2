<?php

require_once "./libs/smarty/Smarty.class.php";

class CategoriesView{

    

    private $title;
    

    function __construct(){
        $this->title = "Categories";
    }

    function showCategories ($categories,$user){
        $smarty = new Smarty();
        $smarty->assign('title', $this->title);
        $smarty->assign('categories', $categories);
        $smarty->assign('user', $user);

        $smarty->display('templates/categoriesTable.tpl');
    }

    function ShowSparesByCategorie($sparesByCategorie, $categorie_title){
        $smarty = new Smarty();
        $smarty->assign('title', $categorie_title);
        $smarty->assign('repuestos', $sparesByCategorie);

        $smarty->display('templates/sparesTableByCategorie.tpl');
    }

   
}
?>