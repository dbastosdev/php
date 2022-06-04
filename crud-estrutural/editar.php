<?php

// Para editar um cadastro, devemos receber o id, buscar no banco de dados, fornecer os valores
// no formulário para edição e deixar que o usuário envie os dados modificados 

// O envio do id para essa página é feito pela url, query string

require_once 'config.php';

// 1- recebendo os dados
$id = filter_input(INPUT_GET, 'id');
if($id){
   $sql = $pdo->prepare("SELECT * FROM usuario WHERE id= :id"); 
   $sql->bindValue(':id',$id);
   $sql->execute();

   // checando resultados da consulta

   // Array para armazenar o resultado da consulta
   $data = [];

   if($sql->rowCount() > 0){
        $data = $sql->fetch(PDO::FETCH_ASSOC); // pega apenas e então somente o primeiro registro
   } else {
        header('Location: index.php');
        exit();
   }

} else {
    header('Location: index.php');
    exit();
}

?>


<h1>Editar usuário</h1>

<form method="POST" action="editar_action.php"> 
    <input type="hidden" name="id" value="<?=$data['id'];?>"/><!-- envia id para a pág. de edição-->
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$data['nome'];?>"/> <!-- Atualiza o formulário com consulta -->
    </label><br/><br/>
    <label>
        E-mail:<br/>
        <input type="text" name="email" value="<?=$data['email'];?>"/> <!-- Atualiza o formulário com consulta -->
    </label><br/><br/>
    <input type="submit" value="Editar"/>

</form>

<!-- Leva ao arquivo que faz a adição de um novo usuário -->
<br><br><br>
<a href="index.php">Página inicial</a> 
