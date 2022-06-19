<?php

class Historico {

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function registrar($action){
        $ip = '192.168.0.1';
        $sql = "INSERT INTO logs (ip, data_action, log_action) VALUES (:ip, NOW(), :action) ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':ip', $ip);
        $sql->bindValue(':action', $action);
        $sql->execute();
    }
}