<?php
    try{
        $database = connect("localhost", "hallucine", "root", "Admin-0");
    }catch(Exception $error){
        echo "Erreur de connexion à la BDD.<br>";
        die("ERROR: ".$error->getMessage());
    }
    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    while ($row = $results->fetch()) {
        echo $row["id"] . $row["title"] . " " . $row["release_date"] . "<br>";
    }

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password);
    }
    
?>