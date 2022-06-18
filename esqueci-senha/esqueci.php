<?php

require_once 'config.php';

// Trattando a soliitação de alteração de senha

if(!empty($_POST['email'])) {

    // Verificando se o e-mail existe no banco de dados
    
    //Query
    $email = $_POST['email'];
    $sql = $pdo->prepare("SELECT * FROM user_login WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    // Se dado no banco, cria token de alteração de senha
    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
        // Pega o id do usuário que terá senha atualizada
        $id = $sql['id'];
        // Cria token md5
        $token = md5(time().rand(0,9999).rand(0,9999));
        // Armazenando token na tabela user_token
        $sql = "INSERT INTO user_token (id_user, token, expired_in) VALUES (:id_user, :token, :expired_in)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id_user', $id);
        $sql->bindValue(':token', $token);
        $sql->bindValue(':expired_in', date('Y-m-d H:i', strtotime('+1 hour')));
        $sql->execute();

        // Criando um email a ser enviado ao usuário com o token
        $link = "http://localhost:8000/redefinir.php?token=".$token;
        $mensagem =  "clique no link para redefinir sua senha ".$link;

        /*AQUI ENTRA ALGUMA FUNÇÃO DE ENVIO DE E-MAIL DO PHP OU LIBS
        mail(
            $email,
           "Recuperação de senha",
            $mensagem,
        );
        */

        // O link abaixo deverá ser enviado automaticamente por e-mail
        echo $mensagem;
        exit;

    }


}

?>



<h1>Página de recuperação de senhas</h1>

<form method="POST">
    <label>
        Qual o seu e-mail?<br/>
        <input type="email" name="email"/>
    </label><br/><br/>
    <input type="submit" value="Enviar"/>
</form>