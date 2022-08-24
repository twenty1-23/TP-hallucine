<?php

require_once "Model.class.php";
require_once "Movie.class.php";

class HallucineModel extends Model{
    private $_movies;
    private $_movie;

    const SORT_MOVIES_BY_TITLE = 0;
    const SORT_MOVIES_BY_RELEASE_DATE = 1;
    const SORT_MOVIES_BY_ADDED_DATE = 2;

    public function requestMovies($sort = self::SORT_MOVIES_BY_TITLE){
        $_movies = array();

        switch ($sort) {
            case self::SORT_MOVIES_BY_TITLE:
                $sql = "SELECT * FROM `movies` ORDER BY title;";
                break;
            case self::SORT_MOVIES_BY_RELEASE_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY release_date;";
                break;
            case self::SORT_MOVIES_BY_ADDED_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY added_date;";
                break;
            default:
                $sql = "SELECT * FROM `movies`;";
                break;
        }

        $request = $this->_getDatabase(HOST, DB_NAME, LOGIN, PASSWORD)->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        foreach ($rows as $key => $value) {
            $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
            $this->_movies[] = $movie;
        }
    }

    public function requestMovie(int $movieId){
         $sql = "SELECT * FROM `movies` WHERE id = $movieId;";
        $request = $this->_getDatabase("localhost", "hallucine", "root", "Admin-01")->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        $value = $rows[0];

        $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
        $this->_movie = $movie;
    }

    public function getMovies(){return $this->_movies;}
    public function getMovie(){return $this->_movie;}

}
?>