<?php
class LivreNonEmprunteException extends Exception {
    public function __construct($message = "L'utilisateur n'a pas emprunté ce livre.") {
        parent::__construct($message);
    }
}
?>