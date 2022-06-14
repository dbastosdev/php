<?php

// Inicia sessão. Sempre a primeira declaração da página 
session_start();

// Importando objeto do pdo
require_once 'config.php';


// Verificação simples de login. Testa para avaliar se a sessão está com um login de usuário válido
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    echo "Área restrita"."<br><br>";
    // checando os dados no banco
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id= :id");
    $sql->bindValue('id', $_SESSION['id']);
    $sql->execute();

    if($sql->rowCount() > 0){
        $user = $sql->fetch();
        echo "Usuário: ".$user['email']."<br>";
        echo "Link de convite: "."<a>http://localhost:8000/cadastrar.php?codigo=</a>".$user['codigo']."<br>";
    }
    // Caso não esteja com a sessão setada, redireciona para login
} else {
    header('Location: login.php');
    exit;
}

?>

<br><br><br>
<a href="deslogar.php">Sair</a>