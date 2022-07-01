<?php

Class Reservas {

    // Atributos
    private $pdo;

    // Construtor
    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    // Método para listar as reservas
    public function getReservas(){
        $array = array();

        // Query
        $sql = "SELECT * FROM reservas";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

}