<?php

Class Usuarios {
    private $pdo;
    
    // Construtor que recebe um objeto do tipo PDO
    public function __construct($driver){
        $this->pdo = $driver;
    }

    // Método para realizar o login do usuário
    public function fazerLogin($email, $senha){

        // Verifica e-mail e senha no banco
        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        // Caso seja encontrado, seta a sessão
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['logado'] = $sql['id']; // Armazena o id (identificador único de usuário na sessão)
            return true;
        }
    }
}