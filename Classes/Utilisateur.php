<?php
require_once 'Livre.php';
require_once 'Personne.php';
require_once 'Exceptions/LivreDejaEmprunteException.php';
require_once 'Exceptions/LivreNonEmprunteException.php';

class Utilisateur extends Personne {
    protected $email;
    protected $borrowed_books; //array//

    public function __construct(string $name, string $email)
    {
        parent::__construct($name); // Appel du constructeur parent //
        $this->email = $email;
        $this->borrowed_books = []; //Création de l'array pour récupérer tous les livres existants//
    }

    // Implémentation de la méthode afficherInfos() depuis Personne//
    public function afficherInfos() {
        return "l'utilisateur: " . $this->name . ", Email: " . $this->email . "";
    } 

    //Création d'une méthode pour les livres déjà empruntés ou non.
    public function emprunterLivre(Livre $book) {
        if ($book->status !== 'disponible') {
            throw new LivreDejaEmprunteException();
        }
        $this->borrowed_books[] = $book;
        $book->status = 'emprunté';
    }

    //Création d'une méthode pour les livres pour pouvoir retourner un livre ou non.
    public function retournerLivre(Livre $book) {
        $key = array_search($book, $this->borrowed_books, true);
        if ($key === false) {
            throw new LivreNonEmprunteException();
        }
        unset($this->borrowed_books[$key]);
        $book->status = 'disponible';
    }

    // //    Création des getters pour récupérer les informations protected// 
    // public function getName() {
    //     return $this->name;
    // }
    // public function getEmail() {
    //     return $this->email;
    // }
    // public function getBorrowedBooks() {
    //     return $this->borrowed_books;
    // } 

    // Création d'une méthode pour afficher les utilisateurs//
    // public function afficherUtilisateur(){
    //     return "Utilisateur: " . $this->name . ". Email: " . $this->email . ".<br>";
    // }
}

// Création d'objets utilisateurs et de leurs propriétés, puis affichage des utilisateur avec "echo"//
// $utilisateur1 = new Utilisateur("Bob l'Eponge", "bob@live.fr");
// $utilisateur2 = new Utilisateur("Carlos Calamar", "carlos@live.fr");
// $utilisateur3 = new Utilisateur("Cindy l'Ecureuil", "cindy@live.fr");

// echo $utilisateur1->afficherUtilisateur();

?>
