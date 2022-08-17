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

    $sqlInsert = "INSERT INTO `movies` (`id`, `title`, `image_url`, `runtime`, `description`, `release_date`) VALUES (NULL, 'J\'en ai pas', 'film.jpg', '7688', 'Desc de film.', '2022-10-05')";

    $database->query($sqlInsert);

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    
?>