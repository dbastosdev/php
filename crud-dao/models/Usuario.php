<?php

// Definição de classe - Entidade

class Usuario {

    // Atributos
    private $id;
    private $nome;
    private $email;

    // Getters & Setters
    public function getId(){
        return $this->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome= ucwords(trim($n));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e) {
        $this->nome= strtoLower(trim($e));
    }
}

// Interface DAO da entidade usuário. Toda implementação dessa interface deverá ter esses métodos
// É como um contrato. Sem que uma classe implementar uma interface, deverá definir esses métodos
interface UsuarioDAO {
    public function add(Usuario $u); // Cria um usuário
    public function findAll(); // Lê todos usuários
    public function findById($id); // Lê um único usuário
    public function update(Usuario $u); // Atualiza um usuário
    public function delete($id); // Deleta um usuário
}
