<?php
// Inclure les fichiers nécessaires
require_once 'Livre.php';
require_once 'Auteur.php';
require_once 'Utilisateur.php';
require_once 'Emprunt.php';
require_once 'Personne.php';

// Création des objets d'exemple
// Ici, vous devez créer quelques objets d'exemple pour les auteurs, les livres, et les utilisateurs
// Par exemple :
// $auteur1 = nouvel objet(paramettre1, paramettre1,...);


// Essayez d'emprunter des livres et de gérer les erreurs si un livre est déjà emprunté
// Utilisez des blocs try/catch pour capturer les erreurs d'emprunt
// Par exemple :
// try {
//     emprunterlivre1
// } catch (LivreDejaEmprunteException $e) {
//     echo "Erreur : " . $e->getMessage() . "<br>";
// }

// Affichage de la liste des livres
echo "<h1>Liste des Livres</h1>";
echo "<ul>";
// Parcourez les livres et affichez leurs informations (titre, auteur, statut)
// Exemple de structure :
/*
foreach ($livres as $livre) {
    echo "<li>" . titre du livre . " - " . auteur du livre . " (" . année du livre . ")";
    if (le livre est emprunté) {
        echo " <strong>(Emprunté)</strong>";
    } else {
        echo " <strong>(Disponible)</strong>";
    }
    echo "</li>";
}
*/
echo "</ul>";

// Affichage de la liste des auteurs
echo "<h2>Liste des Auteurs</h2>";
echo "<ul>";
// Parcourez les auteurs et affichez leurs informations (nom, nationalité, date de naissance)
// Exemple de structure :
/*
foreach ($auteurs as $auteur) {
    echo "<li>" . nom de l'auteur . " - " . Nationalité de l'auteur . " (Né le " . date de naissance de l'auteur . ")</li>";
}
*/
echo "</ul>";

// Affichage de la liste des emprunts
echo "<h2>Liste des Emprunts</h2>";
// Parcourez les emprunts et affichez les informations (livre emprunté, utilisateur, date d'emprunt)
// Exemple de structure :
/*
if (isset($emprunt1) || isset($emprunt2)) {
    echo "<ul>";
    if (isset($emprunt1)) {
        echo "<li>Le livre '" . titre du livre . "' a été emprunté par " . utilisateur . " le " . date dormaté en Y-m-d  . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucun emprunt actuellement.</p>";
}
*/
?>
