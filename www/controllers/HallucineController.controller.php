<?php

require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showMovies(int $sort = HallucineModel::SORT_MOVIES_BY_TITLE){
        $hm = $this->_hallucineModel;
        $hm->requestMovies($sort);
        $movies = $hm->getMovies();
        require "views/movies.view.php";
    }

    public function showMovie(int $movieId){
        $this->_hallucineModel->requestMovie($movieId);
        $movie = $this->_hallucineModel->getMovie();
        require "views/movie.view.php";
    }
}

?>