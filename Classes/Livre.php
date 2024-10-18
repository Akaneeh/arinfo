<?php

require_once "Classes/Empruntable.php";
require_once "Classes/Auteur.php";

class Livre implements Empruntable {
    public $title;
    public $author;
    public $year;
    public $status;

    public function __construct(string $title, string $author, int $year, string $status)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = $status;
    }

    // Implémentation d'Empruntable//
    public function peutEtreEmprunte() {
        return $this->status === 'disponible';
    }

    // Création d'une méthode qui permet d'afficher les détails des objets livres
    // public function afficherLivre(){
    //     return "Voici le livre \"" . $this->title . "\" de " . $this->author . ", publié en " . $this->year . ". Il est actuellement " . $this->status . ".<br>" ;
    // }

    // // Création d'une méthode pour vérifier si un livre a été emprunté et par qui.
    // public function emprunter(Utilisateur $utilisateur1) {
    //     if ($this->peutEtreEmprunte()) {
    //         $utilisateur1->ajoutBorrowedBook($this);
    //         $this->status = "emprunté";
    //         echo "Le livre " . $this->title . " a été emprunté par " . $utilisateur1->getName() . ".";
    //     } else {
    //         echo "Le livre " . $this->title . " n'est pas disponible.";
    //     }
    // }
}

// Création d'objets livres et de leurs propriétés, puis affichage des livres avec écho//
// $livre1 = new Livre("Défaillance Système", "Martha Wells", 2017, "disponible");
// $livre2 = new Livre("Schémas Artificiels", "Martha Wells", 2018, "disponible");
// $livre3 = new Livre("Cheval de Troie", "Martha Wells", 2018, "disponible");
// $livre4 = new Livre("Télémétrie Fugitive", "Martha Wells", 2021, "disponible");

// echo $livre1->afficherLivre();
// echo $livre4->emprunter($utilisateur1);

?>