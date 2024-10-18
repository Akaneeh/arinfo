<?php

class Auteur {
    public $name;
    public $nationality;
    public $birthdate;

    public function __construct(string $name, string $nationality, string $birthdate) {
        $this->name = $name;
        $this->nationality = $nationality;
        $this->birthdate = new DateTime($birthdate);
    }

    // Création d'une méthode qui permet d'afficher les détails des objets auteur//
    // public function afficherAuteur(){
    //     return "Auteur: " . $this->name . ". Nationalité: " . $this->nationality . ". Date de naissance: " . $this->birthdate->format('d-m-Y') . ".<br>";
    // }
}

// Création d'objets auteurs et de leurs propriétés, puis affichage des auteurs avec écho//
// $auteur1 = new Auteur("Martha Wells", "Américaine", new DateTime("1964-09-01"));
// echo $auteur1->afficherAuteur();

?>
