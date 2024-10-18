<?php
class LivreDejaEmprunteException extends Exception {
    public function __construct($message = "Le livre est déjà emprunté.") {
        parent::__construct($message);
    }
}
?>