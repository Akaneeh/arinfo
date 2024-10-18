<?php

class Emprunt{
    private $book;
    private $user;
    private $start_date;
    private $end_date;

    public function __construct(Livre $book, Utilisateur $user, DateTime $start_date, DateTime $end_date)
    {
        $this->book = $book;
        $this->user = $user;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    // Mise en place des getters pour récupérer les informations private// 
    public function getBook(){
        return $this->book;
    }
    public function getUser(){
        return $this->user;
    }
    public function getStartDate(){
        return $this->start_date->format('Y-m-d');
    }
    public function getEndDate(){
        return $this->end_date->format('Y-m-d');
    }

    public function afficherInfos() {
        $emprunt = "Emprunt du livre " . $this->book->title . " par " . $this->user->afficherInfos() . "";
        $emprunt .= " le " . $this->start_date->format('d/m/Y');
        
        if ($this->end_date) {
            $emprunt .= ".  Livre retourné le " . $this->end_date->format('d/m/Y');
        } else {
            $emprunt .= ", livre actuellement emprunté.";
        }
        return $emprunt;
    }

    // // Création d'une méthode pour afficher les emprunts, en récupérant des attributs public de Livre et protected (getName) d'Utilisateur.
    // public function afficherEmprunt() {
    //     return "Le livre: " . $this->book->title . ", a été emprunté par: " . $this->user->getName() . 
    //            ", du: " . $this->getStartDate() . 
    //            ", au: " . $this->getEndDate() . "<br>";
    // }
}

// Création d'objets emprunts et de leurs propriétés, puis affichage des emprunts avec "echo"//
// $livre = new Livre("Défaillance Système", "Martha Wells", 2017, "disponible");
// $utilisateur = new Utilisateur("Bob l'Eponge", "bob@live.fr");
// $emprunt1 = new Emprunt($livre, $utilisateur, new DateTime("2024-09-13"), new DateTime("2024-10-03"));
// echo $emprunt1->afficherEmprunt();

?>
