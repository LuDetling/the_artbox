<?php
require 'header.php';
require 'bdd.php';

$sqlQuery = 'SELECT * FROM oeuvres';
// quand on a pas de params
$oeuvresStatement = $db->query($sqlQuery);
$oeuvres = $oeuvresStatement->fetchAll();
?>
<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre) : ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['img'] ?>" alt="<?= $oeuvre['title'] ?>">
                <h2><?= $oeuvre['title'] ?></h2>
                <p class="description"><?= $oeuvre['artist'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>