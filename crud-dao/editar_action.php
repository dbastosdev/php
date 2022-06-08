<?php

// Sempre que for manipular o banco, deverá importar o trio abaixo devido ao
// chamamento da classe UsuarioDao e da configuração do pdo
require_once 'config.php';
require_once 'dao/UsuarioDaoMySql.php';
$usuarioDao = new UsuarioDaoMySql($pdo);

// Filtrando e validando as entradas que vem do formulário de edição
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if($id && $name && $email){ // Se tiver nome e e-mail adiciona no banco de dados
    
    $u = new Usuario();
    $u->setId($id);
    $u->setNome($name);
    $u->setEmail($email);

    /*
    Alternativa ao código acima
    $u = $usuarioDa->findById($id);
    $u->setNome($name);
    $u->setEmail($email);
    */ 

    $usuarioDao->update($u);

    header("Location: index.php");
    exit;
   
} else { // Se não for enviado o nome e e-mail redireciona para a página de cadastro.
    header("Location: editar.php?=".$id); // Se der problema, volta a pag. de edição
    exit;
}