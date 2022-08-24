<?php

define("IMAGE_PATH", "image/");

require_once "controllers/HallucineController.controller.php";

$hallucineController = new HallucineController();

if(empty($_GET["page"])){
    $hallucineController->showLogin();
}else{
    switch ($_GET["page"]) {
        case 'login':
            $hallucineController->showLogin();
            break;
        case "movies":
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 0;
            $hallucineController->showMovies($sort);
            break;
        case "movie":
            $movieId = intval($_GET["movieid"]);
            $hallucineController->showMovie($movieId);
            break;
        default:
            echo "Cas de page non géré...";
            break;
    }
}

?>