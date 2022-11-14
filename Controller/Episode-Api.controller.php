<?php
require_once "./Model/EpisodeModel.php";
require_once "./View/ApiView.php";

class EpisodeApiController{

    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new EpisodeModel();
        $this->view = new ApiView();
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    function getEpisodes($params = null){
        $sort = $_GET['sort'] ?? null;
        $order = $_GET['order'] ?? null;
        $size = $_GET['size'] ?? null;
        $offset = $size * ($_GET['page'] - 1) ?? null;
        $filter = $_GET['filter'] ?? null;
        $data = $_GET['input'] ?? null;

        if (isset($sort) && isset($order)){
            if (($sort == 'nameEpisode' || $sort == 'Director' || $sort == 'fk_id_Season' || $sort == 'premiereYear') && ($order == 'ASC' || $order == 'DESC')){
                $episodes = $this->model->getEpisodes($sort, $order);
                $this->view->response($episodes, 200);
            } else {
                $this->view->response("No ingresó los parametros correctos", 404);
            }
        } else if (isset($size) && isset($offset)){
            $episodes = $this->model->getEpisodes($sort, $order, $size, $offset);
            if (empty($episodes)) {
                $this->view->response("No hay más episodios en la lista", 404);
            } else {
            $this->view->response($episodes, 200);
            }
        } else if (isset($filter) && isset($data)){
            $episodes = $this->model->getEpisodes($sort, $order, $size, $offset, $filter, $data);
            if (empty($episodes)){
                $this->view->response("No hay ningún episodio de ese $filter", 404);
            } else {
                $this->view->response($episodes, 200);
            }
        } else {
            $episodes = $this->model->getEpisodes();
            $this->view->response($episodes, 200);
        }
    }

    function getEpisode($params = null){
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $episode = $this->model->showEpisode($id);

        // si no existe devuelvo 404
        if ($episode){
            $this->view->response($episode);
        } else {
            $this->view->response("El episodio con el id=$id no existe", 404);
        }
    }

    function addEpisode($params = null){
        $episode = $this->getData();
        if (empty($episode->nameEpisode) || empty($episode->Director) || empty($episode->fk_id_Season) || empty($episode->premiereYear)){
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->addEpisode($episode->nameEpisode, $episode->Director, $episode->fk_id_Season, $episode->premiereYear);
            $episode = $this->model->showEpisode($id);
            $this->view->response($episode, 201);
        }
    }

    function deleteEpisode($params = null){
        $id = $params[":ID"];
        $episode = $this->model->showEpisode($id);

        if ($episode) {
            $this->model->deleteEpisodeFromDB($id);
            $this->view->response("El episodio fue eliminado", 200);
        } else {
            $this->view->response("El episodio no existe", 404);
        }
    }
}

