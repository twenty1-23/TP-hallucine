<?php

require_once "Model.class.php";
require_once "User.class.php";
require_once "Movie.class.php";

class HallucineModel extends Model{
    private $_movies;
    private $_movie;
    private int $_loginStatus;

    const SORT_MOVIES_BY_TITLE = 0;
    const SORT_MOVIES_BY_RELEASE_DATE = 1;
    const SORT_MOVIES_BY_ADDED_DATE = 2;

    const LOGIN_USER_NOT_FOUND = 0;
    const LOGIN_INCORRECT_PASSWORD = 1;
    const LOGIN_OK = 2;

    const MOVIE_USER_RATE = 0;
    const MOVIE_USER_UPDATE_RATE = 1;
    const MOVIE_USER_DELETE_RATE = 2;

    public function requestLogin(string $email, string $password){
        $email = $this->_checkInput($email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        if (count($rows) == 0) {
            $this->_loginStatus = self::LOGIN_USER_NOT_FOUND;
            return;
        } else {
            $value = $rows[0];
            if ($value["password"] !== $password) {
                $this->_loginStatus = self::LOGIN_INCORRECT_PASSWORD;
                return;
            } else {
                $user = new User($value["id"], $value["firstname"], $value["lastname"], $value["email"], $value["password"], $value["sex"]);
                $this->_loginStatus = self::LOGIN_OK;
                return $user;
            }
        }
    }

    private function _checkInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        if(IS_DEBUG){
            // echo $input;
            // echo "<br>";
        }
        return $input;
    }

    public function requestMovies($sort = self::SORT_MOVIES_BY_TITLE){
        $_movies = array();

        switch ($sort) {
            case self::SORT_MOVIES_BY_TITLE:
                $sql = "SELECT * FROM `movies` ORDER BY title;";
                break;
            case self::SORT_MOVIES_BY_RELEASE_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY release_date DESC;";
                break;
            case self::SORT_MOVIES_BY_ADDED_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY added_date DESC;";
                break;
            default:
                $sql = "SELECT * FROM `movies`;";
                break;
        }

        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);

        foreach ($rows as $key => $value) {
            $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
            $this->_movies[] = $movie;
        }
    }

    public function requestMovie(int $movieId){
        $sql = "SELECT * FROM `movies` WHERE id = $movieId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        $value = $rows[0];
        $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
        $this->_movie = $movie;
    }

    public function getLoginStatus(){return $this->_loginStatus;}
    public function getMovies(){return $this->_movies;}
    public function getMovie(){return $this->_movie;}

}
?>