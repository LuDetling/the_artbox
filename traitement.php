<?php
require 'bdd.php';

if (
    empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || empty($_POST['description'])
    || strlen($_POST['description']) < 3
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
) {
    header('Location: ajouter.php?erreur=true');
    exit();
}


$title = htmlspecialchars($_POST["titre"]);
$artist = htmlspecialchars($_POST["artiste"]);
$img = htmlspecialchars($_POST["image"]);
$description = htmlspecialchars($_POST["description"]);

$sql = "INSERT INTO oeuvres (title, artist, img, description) VALUES (?,?,?,?)";
$oeuvresStatement = $db->prepare($sql);
$oeuvresStatement->execute([$title, $artist, $img, $description]);

header('Location: oeuvre.php?id=' . $db->lastInsertId());
