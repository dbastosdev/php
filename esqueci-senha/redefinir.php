<?php

require_once 'config.php';

// Página para conferir se o token é valido e atualizar a senha

// Verifica se foi enviado algum token
if(!empty($_GET['token'])) {
    $token = $_GET['token'];

    // O token deve estar no banco e ter prazo de validade ainda não vencido para poder ser utilizado
    $sql = "SELECT * FROM user_token WHERE token = :token AND used = 0 AND expired_in > NOW()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":token", $token);
    $sql->execute();

    // Se o token existir e for válido segue para edição da senha. Do contrário, exibe mensagem de erro
    if($sql->rowCount() > 0){

        $sql = $sql->fetch();
        $id = $sql['id_user'];
        
        // Faz tratamento dos dados recebidos pelo formulário de edição de senha
        $senha = filter_input(INPUT_POST,"senha");
        if($senha) {
            $senha = md5($senha);
            // Atualiza a senha no banco de dados
            $sql = "UPDATE user_login SET senha = :senha WHERE id = :id ";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":id", $id);
            $sql->execute();

            // Atualiza a tabela com tokens
            $sql = "UPDATE user_token SET used = 1 WHERE token = :token";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();

            echo "Senha alterada com sucesso";
            exit; // para não exibir mais uma vez o formulário
        }

        // fecha trecho php
        ?>

        <form method="POST">
            Digite a nova senha: <br>
            <input type="password" name="senha"> <br>
            <input type="submit" value ="alterar senha">
        </form>
        
        <?php
        // continua php

    } else {
        echo "Token inválido ou usado";
    }

}
?>