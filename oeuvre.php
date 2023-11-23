<?php
require 'header.php';
require 'bdd.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
}

$sqlQuery = 'SELECT * FROM oeuvres WHERE id = :id';
$oeuvresStatement = $db->prepare($sqlQuery);
$oeuvresStatement->execute(["id" => $_GET["id"]]);
$oeuvre = $oeuvresStatement->fetch();

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (is_null($oeuvre)) {
    header('Location: index.php');
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['img'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['artist'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>