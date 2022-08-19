<?php

define("IMAGE_PATH", "image/");

require_once "controllers/HallucineController.controller.php";

$hallucineController = new HallucineController();

if(empty($_GET["page"])){
    $hallucineController->showMovies();
}else{
    switch ($_GET["page"]) {
        case "movies":
            $hallucineController->showMovies();
            break;
        case "movie":
            $movieId = $_GET["movieid"];
            $hallucineController->showMovie($movieId);
            break;
        default:
            # code...
            break;
    }
}

?>