<?php

class Carros {
    // Atributos
    private $pdo;

    // Construtor
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
}