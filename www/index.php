<?php

session_start();
// session_destroy();

// var_dump($_SESSION['user']);

require "config.php";

require_once "controllers/HallucineController.controller.php";

$hallucineController = new HallucineController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $params = explode("=", filter_var($_SERVER["QUERY_STRING"]));
    // var_dump($params);
    // var_dump($_SERVER);
    switch ($params[1]) {
        case 'login':
            $hallucineController->showLogin();
            break;
        
        default:
            
            break;
    }
} else {
    if(empty($_GET["page"])){
        if (isset($_SESSION['user'])) {
            $hallucineController->showMovies();
        } else {
            $hallucineController->showLogin();
        }
    }else{
        switch ($_GET["page"]) {
            case 'login':
                $hallucineController->showLogin();
                break;
            case 'logout':
                session_destroy();
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
}




?>