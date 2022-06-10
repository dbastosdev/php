<?php

// Inicia sessão. Sempre a primeira declaração da página 
session_start();

// Verificação simples de login. Testa para avaliar se a sessão está com um login de usuário válido
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    echo "Área restrita";
    // Caso não esteja com a sessão setada, redireciona para login
} else {
    header('Location: login.php');
    exit;
}

?>

<br><br><br>
<a href="deslogar.php">Sair</a>