<?php
require_once './Model/SpareModel.php';
require_once 'ApiController.php';

class ApiSparesController extends ApiController {

  
    function __construct() {
        parent::__construct();
        $this->model = new SpareModel();
        $this->view = new APIView();
    }

    public function getSpares($params = null) {
        $spares = $this->model->GetSpares();
        $this->view->response($spares, 200);
    }

    public function getSpare($params = null) {
        $id = $params[':ID'];
        $spare = $this->model->getSpare($id);

        if ($spare) // verifica si la tarea existe
            $this->view->response($spare, 200);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }
    
    public function deleteSpare($params = null) {
        $id = $params[':ID'];
        $result =  $task = $this->model->deleteSpareById($id);

        if($result > 0)
            $this->view->response("La tarea con el id=$id fue eliminada", 200);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function insertSpare($params = null){
        $body = $this->getData(); //es un JSON
        $this->model->insertSpare($body->name, $body->vehicle, $body->categorie, $body->price, $body->description);
    }

    public function updateSpare($params = null){
        $id = $params[':ID'];
        $body = $this->getData();

        $spare = $this->model->getSpare($id);
        if (empty($spare)) {
            $this->view->response("La tarea con el id=$id no existe", 404);
        }else {
            $result = $this->model->modifySpareById($body->id_categorie, $body->price, $body->description, $body->name, $body->vehicle, $id);
            
            if($result > 0)
                
                $this->view->response( $this->model->GetSpare($id), 200);
            else
                $this->view->response("La tarea con el id=$id no fue actualizada", 204);
        }
    }
}
                                                    
                                                    