<?php
require_once 'Classes/Livre.php';
require_once 'Classes/Auteur.php';
require_once 'Classes/Utilisateur.php';
require_once 'Classes/Emprunt.php';
require_once 'Exceptions/LivreDejaEmprunteException.php';
require_once 'Exceptions/LivreNonEmprunteException.php';

// Liste des livres + array//
$livre1 = new Livre("Défaillance Système", "Martha Wells", 2017, "disponible");
$livre2 = new Livre("Schémas Artificiels", "Martha Wells", 2018, "disponible");
$livre3 = new Livre("Cheval de Troie", "Martha Wells", 2018, "disponible");
$livre4 = new Livre("Télémétrie Fugitive", "Martha Wells", 2021, "disponible");
$livre5 = new Livre("Dune", "Frank Herbert", 1965, "disponible");
$livre6 = new Livre("Rosewater", "Tade Thompson", 2019, "disponible");
$livre7 = new Livre("Transcendance Astrale", "Carolane Mrksic", 2020, "disponible");

$livres = [$livre1, $livre2, $livre3, $livre4, $livre5, $livre6, $livre7];

// Liste des auteurs + array //
$auteur1 = new Auteur("Frank Herbert", "Américain", "1920-10-08");
$auteur2 = new Auteur("Martha Wells", "Américaine", "1964-09-01");
$auteur3 = new Auteur("Tade Thompson", "Britannique", "1970-06-25");
$auteur4 = new Auteur("Carolane Mrksic", "Française", "1992-02-13");

$auteurs = [$auteur1, $auteur2, $auteur3, $auteur4];

// Liste des utilisateurs//
$utilisateur1 = new Utilisateur("Bob l'Eponge", "bob@live.fr");
$utilisateur2 = new Utilisateur("Carlos Calamar", "carlos@live.fr");
$utilisateur3 = new Utilisateur("Cindy l'Ecureuil", "cindy@live.fr");

// Liste des emprunts dans un array//
$emprunts = [];
$emprunts[] = new Emprunt($livre1, $utilisateur1, new DateTime('2024-07-05'), new DateTime('2024-10-03'));
$emprunts[] = new Emprunt($livre7, $utilisateur3, new DateTime('2024-09-13'), new DateTime('2024-09-30'));
$emprunts[] = new Emprunt($livre4, $utilisateur3, new DateTime('2024-09-13'), new DateTime('2024-09-27'));

//Gestion des exceptions et erreurs//
try {
    $dateDebut = new DateTime('2024-09-13');
    $dateFin = new DateTime('2024-10-03');
    $emprunt = new Emprunt($livre1, $utilisateur1, $dateDebut, $dateFin);
    // echo " " . $emprunt->afficherInfos() . " ";

    //test pour emprunter un livre
    $utilisateur1->emprunterLivre($livre1);
    $utilisateur3->emprunterLivre($livre7);
    $utilisateur3->emprunterLivre($livre4);
    // echo "Le livre " . $livre1->title . "a été emprunté.";

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . ".";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bibliothèque</title>
</head>
<body>
<div class="container">
        <h1 class="mt-4">Bienvenue à la bibliothèque</h1>
        <p class="mt-4">Liste des livres :</p>
        <ul>
            <?php foreach ($livres as $livre) {
                echo "<li>{$livre->title} ({$livre->year}) - {$livre->author} - {$livre->status}</li>";
            }?>
        </ul>

        <p class="mt-4">Liste des auteurs :</p>
        <ul>
            <?php foreach ($auteurs as $auteur) {
            echo "<li>{$auteur->name} ({$auteur->nationality}) - {$auteur->birthdate->format('Y-m-d')}</li>";}?>
        </ul>

        <p class="mt-4">Liste des emprunts :</p>
        <ul>
            <?php foreach ($emprunts as $emprunt) {
            echo "<li>{$emprunt->afficherInfos()}</li>";}?>
        </ul>

    </div></body>
</html>