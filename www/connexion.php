<?php
    $database = connect("localhost", "hallucine", "root", "Admin-01");
    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    while ($row = $results->fetch()) {
        echo $row["id"] . $row["title"] . " " . $row["release_date"] . "<br>";
    }

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password);
    }
    
?>