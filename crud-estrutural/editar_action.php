<?php
require_once 'config.php';

// Filtrando e validando as entradas
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if($id && $name && $email){ // Se tiver nome e e-mail adiciona no banco de dados
    
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id= :id");
    $sql->bindValue(':nome',$name);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':id',$id);
    $sql->execute();

    header("Location: index.php");
    exit;
   
} else { // Se não for enviado o nome e e-mail redireciona para a página de cadastro.
    header("Location: editar.php");
    exit;
}