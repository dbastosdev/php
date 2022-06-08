<?php

// Para editar um cadastro, devemos receber o id, buscar no banco de dados, fornecer os valores
// no formulário para edição e deixar que o usuário envie os dados modificados 
// O envio do id para essa página é feito pela url, query string

// 1- Usaremos o findById para achar o dado a ser editado e retornar na view

// usando o arquivo de configuração do mysql. Vai fornecer o objeto $pdo
require_once 'config.php';
// usando o arquivo de usuário dao - Vai fornecer a classe usuário dao para ser instanciada
require_once 'dao/UsuarioDaoMySql.php';

// Instanciando o usuário, o contrutor recebe um objeto do tipo $pdo
$usuarioDao = new UsuarioDaoMySql($pdo);

// Variável para armazenar resultado da query no banco. Caso não ache no banco, retorna false.
$usuario = false;
// Pegao o id enviado via get, vem do botão de editar da página index.php
$id = filter_input(INPUT_GET, 'id');

if($id) {
    // Armazena as informações retornadas do banco de dados em uma variável do tipo usuário
    $usuario  = $usuarioDao->findById($id);
} 

// Se o usuário for encontrado, não entrará no if abaixo. Do conrário, entrará e redirecionará pra index.php
if($usuario == false) {
    header("Location: index.php");
    exit;
}


?>


<h1>Editar usuário</h1>

<form method="POST" action="editar_action.php"> 
    <input type="hidden" name="id" value="<?=$usuario->getId();?>"/><!-- envia id para a pág. de edição-->
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$usuario->getNome();?>"/> <!-- Atualiza o formulário com consulta -->
    </label><br/><br/>
    <label>
        E-mail:<br/>
        <input type="text" name="email" value="<?=$usuario->getEmail();?>"/> <!-- Atualiza o formulário com consulta -->
    </label><br/><br/>
    <input type="submit" value="Editar"/>

</form>

<!-- Leva ao arquivo que faz a adição de um novo usuário -->
<br><br><br>
<a href="index.php">Página inicial</a> 
