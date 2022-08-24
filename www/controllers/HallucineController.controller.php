<?php

require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showLogin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->_hallucineModel->requestLogin($_POST["email"], $_POST["password"]);
            $loginStatus = $this->_hallucineModel->getLoginStatus();
            switch ($loginStatus) {
                case HallucineModel::LOGIN_USER_NOT_FOUND:
                case HallucineModel::LOGIN_INCORRECT_PASSWORD:
                    require "views/login.view.php";
                    break;
                case HallucineModel::LOGIN_OK:
                    $_SESSION['user'] = serialize($user);
                    var_dump($_SESSION['user']);
                    $this->showMovies();
                    break;
                default:
                    "Cas non géré...";
                    break;
            }
        } else {
            require "views/login.view.php";
        }
        
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