<?php
// permite ter acesso a configuração do pdo utilizando o mysql
require_once 'config.php';
// permite acesso à classe Usuário Dao
require_once 'dao/UsuarioDaoMySql.php';

// Instancia um usuário dao, passando para o contrutor por injeção de dependencia
// o pdo para manipulação no banco de dados mysql
$usuarioDao = new UsuarioDaoMySql($pdo);


// Filtrando e validando as entradas
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

// Se tiver nome e e-mail adiciona no banco de dados
if($name && $email){ 
    
   // Verifica se o e-mail já foi cadastrado no banco de dados. Em caso positivo, redireciona
   // Caso o e-mail seja novo, permite adção no banco de dados de um novo usuário
   if($usuarioDao->findByEmail($email) === false){
       $novoUsuario = new Usuario();
       $novoUsuario->setNome($name);
       $novoUsuario->setEmail($email);

       // Adiciona novo usuário no banco de dados
       $usuarioDao->add($novoUsuario);

       // Redireciona para o index
       header("Location: index.php"); // ao inserir redireciona para o index
       exit();

   } else {
       header("Location: adicionar.php");
       exit;
   }
   
} else { // Se não for enviado o nome e e-mail redireciona para a página de cadastro.
    header("Location: adicionar.php");
    exit;
}