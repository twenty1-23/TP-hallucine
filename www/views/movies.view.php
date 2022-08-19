<?php

ob_start();

?>

<?php
for($i=0; $i < count($movies);$i++) : 
?>

<div class="item col">
    <img src="image/<?= $movies[$i]->getImageUrl(); ?> ">
    <br>
    <?= $movies[$i]->getTitle(); ?>
    <br>
    <?= $movies[$i]->getRelaseDate()->format("Y"); ?>
</div>

<?php endfor; ?>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Films";
require "template.view.php";
?>