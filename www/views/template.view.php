<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="style/styles.css" rel="stylesheet">
    <title><?= isset($pageTitle) ? $pageTitle : "TP Halluciné" ?></title>
</head>

<body>
    <header>HALLUCINE</header>
    <div id="container" class="container-fluid">
        <div class="row">
            <div id="left" class="col-sm-2 col-lg-3">
            <nav>
                <ul>
                    <li>Films</li>
                    <li>Acteurs</li>
                    <li>Réalisateurs</li>
                </ul>
            </nav>
        </div>
            <div id="right" class="col-sm-10 col-lg-9 container">
                <div class="row">
                <select name="" id="" class="col-2">
                <option value="title">Par titre</option>
                <option value="added_date">Par date d'ajout</option>
                <option value="release_date">Par date de sortie</option>
            </select>
            </div>
            <div id="items" class="row">
                <?= $content ?>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>