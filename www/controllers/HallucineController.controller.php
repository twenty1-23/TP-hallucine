<?php

require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showMovies(){
        $this->_hallucineModel->requestMovies();
        $movies = $this->_hallucineModel->getMovies();
        require "views/movies.view.php";
    }
}

?>