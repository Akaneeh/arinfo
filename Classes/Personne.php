<?php

abstract class Personne {
    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    abstract public function afficherInfos();
}

?>