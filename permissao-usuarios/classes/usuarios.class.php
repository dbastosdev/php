<?php

Class Usuarios {
    private $pdo;
    private $id;
    private $nome;
    
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

    // Seta o usuário com dados da seção
    public function setUsuario($id){
        // Guarda no objeto o id do usuário
        $this->id = $id;

        // Busca as permissões do usuário
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            // armazenando os dados do servidor
            $sql = $sql->fetch();
            // transformando os dados de permissão em um array - separa por vírgula.
            // Não é boa prática, pois estamos guardando dados não atômicos no banco
            $this->permissoes = explode(',', $sql['permissoes']);
        }

    }

    public function getPermissoes() {
        return $this->permissoes;
    }

    // Verifica se o usuário possui determinada permissão que o permita manipular determinado arquivo
    public function temPermissao($p) {
       if(in_array($p, $this->permissoes)) {
            return true;     
       } else {
           return false;
       }
    }
    // Com esse trecho de código, podemos inserir um if sempre antes de determinada ação no site. 
    // Nesse caso, se o usuário tiver a permissão requerida, ele poderá executar determinada ação. Do contrário,
    // Não poderá. 

    public function getNome($id){
        // Busca as permissões do usuário
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            // armazenando os dados do servidor
            $sql = $sql->fetch();
            // transformando os dados de permissão em um array - separa por vírgula.
            // Não é boa prática, pois estamos guardando dados não atômicos no banco
            return $this->nome = $sql['nome'];
        }

    }
}