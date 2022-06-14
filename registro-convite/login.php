<?php
// RECEBENDO E PROCESSANDO DADOS FORMULÁRIO

// Configura a sessão
session_start();
// importa objeto do pdo
require_once 'config.php';

// Verifica apenas se os campos foram preenchidos. Poderia ter mais verificações
if(isset($_POST['email']) && isset($_POST['senha'])) {

    $email = filter_input(INPUT_POST,"email");
    $senha = filter_input(INPUT_POST,"senha");

    // checando os dados no banco
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email= :email AND senha= :senha");
    $sql->bindValue('email', $email);
    $sql->bindValue('senha', $senha);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $dado = $sql->fetch();
        $_SESSION['id'] = $dado['id'];
        header('Location: index.php');
    }

}

?>


<!-- Login e senha pra teste
login: dbastos.dev@gmail.com    
senha: 123456
-->

<h1>Página de login</h1>
<form method="POST">
    E-mail: <br>
    <input type="text" name="email"> <br><br>
    Senha: <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="entrar">
</form>