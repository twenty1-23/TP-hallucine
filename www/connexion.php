<?php
    try{
        $database = connect("localhost", "hallucine", "root", "Admin-01");
    }catch(Exception $error){
        echo "Erreur de connexion à la BDD.<br>";
        die("ERROR: ".$error->getMessage());
    }
    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    // var_dump($results->fetch(PDO::FETCH_BOTH));
    // while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
    //    echo $row["title"] . " " . $row["release_date"] . "<br>";
    // }

    $rows = $results->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $key => $value) {
        echo $value["title"]. " " . $value["release_date"] ."<br>";
    }

    $sqlInsert = "INSERT INTO `movies` (`title`, `image_url`, `runtime`, `description`, `release_date`) VALUES (?, ?, ?, ?, ?)";

    $request = $database->prepare($sqlInsert);

    $title = "Je sais pas";
    $imageUrl = "je_sais_pas.jpg";
    $runtime = 10800;
    $description = "Ceci est la desc.";
    $releaseDate = "1887-10-12";

    $request->execute([$title, $imageUrl, $runtime, $description, $releaseDate]);

    $request->closeCursor();

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    
?>