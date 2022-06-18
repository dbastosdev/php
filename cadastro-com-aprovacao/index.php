<?php

// Como se trata do envio de email, é necessário a configuração de um servidor externo para funcionar. 

// Alterando a tabela de usuários para receber um campo status que verifica se usuário foi ou não confirmado.
// ALTER TABLE usuario ADD status TINYINT;

// Recebendo os dados

require_once 'config.php';

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    // Insere os dados na tabela de usuários
    $pdo->query("INSERT INTO usuario SET nome = '$nome', email = '$email'");
    // Pega o id do usuário cadastrado por último
    $id = $pdo->lastInsertId();

    // Criando um hash usando o id do usuário cadastrado para que seja enviado junto ao e-mail e seja um 
    // código único de confirmação da validade do e-mail.
    $md5 = md5($id);
    // Link de cadastro já com o hash de verificação
    $link = 'http://www.b7web.com.br/cadastroconfirma/confirma.php?h='.$md5;

    // Dados para o envio do e-mail
    $assunto = "Confirme seu cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
    $headers = "From: dbastos.dev@gmail.com"."\r\r"."X-Mailer: PHP/".phpversion();
    mail($email, $assunto, $msg, $headers);

    echo "Vá ao seu e-mail e confirme seu cadastro";
    exit; // Não exibe o formulário novamente
}

?>

<h1>Adicionar usuário</h1>

<form method="POST">
    <label>
        Nome:<br/>
        <input type="text" name="nome"/>
    </label><br/><br/>
    <label>
        E-mail:<br/>
        <input type="text" name="email"/>
    </label><br/><br/>
    <input type="submit" value="Cadastrar"/>

</form>

