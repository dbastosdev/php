<?php

session_start();
require_once 'config.php'; // Importa o objeto PDO
require_once 'classes/usuarios.class.php'; // Importa a classe que trata dos usuários

// Verifica os dados enviados via o formulário de login e seta a sessão caso os dados estejam no bd
if(!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    // Instancia um novo usuário
    $usuarios = new Usuarios($pdo);

    // Se o método fazer login obtiver sucesso, o login foi realizado com sucesso e a sessão é setada
    if($usuarios->fazerLogin($email, $senha)){
        header('Location: index.php');
        exit;
    } else {
        echo "login ou senha errados";
    }
}

?>

<h1>Página de login</h1>
<form method="POST"> <!--Envia para  a mesma página, pois não tem action direcionando a uma página específica-->
    E-mail: <br>
    <input type="text" name="email"> <br><br>
    Senha: <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="entrar">
</form>
