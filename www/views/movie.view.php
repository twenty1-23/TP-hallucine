<?php

ob_start();

?>

<section id="movie_section">
    <div id="movie_section_content">
        <div id="movie_section_content_left">
            <img src="image/kompromat.jpg" alt="Kompromat">
        </div>
        <div id="movie_section_content_right">
            <h2>Kompromat</h2>
            <h3>12-12-2021</h3>
            <div id="rating" data-attr="">
                <div id="progressBar"></div>
            </div>
            <h4>Genre : Horreur, Aventure</h4>
            <h4>Durée : 1H40</h4>
            <h4>Acteurs : Kad Merad, Marina Foïs, Kad Merad, Marina Foïs, Kad Merad, Marina Foïs, Kad Merad, Marina Foïs</h4>
            <h4>Scénariste : Kad Merad, Marina Foïs</h4>
            <h4>Réalisateur : Kad Merad, Marina Foïs</h4>
            <h3>Résumé :<br> Un film français plein de gags avec Kad Merad, Marina Foïs...</h3>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Films";
require "template.view.php";
?>