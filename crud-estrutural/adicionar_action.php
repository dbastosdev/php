<?php
require_once 'config.php';

// Filtrando e validando as entradas
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if($name && $email){ // Se tiver nome e e-mail adiciona no banco de dados
    
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();

    // Só insere o registro no banco de dados se o e-mail cadastrado for novo. Se existir e-mail, redireciona
    if($sql->rowCount() === 0){   
        // Prepara a query antes de executar para eliminar problemas de query maliciosa
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $name);    // associa o valor
        $sql->bindParam(':email', $email);  // Associa a variável e-mail - referência
        $sql->execute();
    
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