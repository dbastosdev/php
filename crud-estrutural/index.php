<?php
// usando o arquivo de configuração
require_once 'config.php';

// Listando dados
$lista = []; // cria lista vazia

// faz query no banco de dados
$sql = $pdo->query("SELECT * FROM usuario");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!-- View -->

<!-- Leva ao arquivo que faz a adição de um novo usuário -->
<a href="adicionar.php">Novo usuário</a> 
<br><br>

<table border="1" width="100%">
    <tr>
        <th>id</th>
        <th>nome</th>
        <th>email</th>
        <th>ações</th>
    </tr>
    <?php foreach ($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <a href="editar.php?id=<?=$usuario['id'];?>">[editar]</a>   <!--Envia id editar.php -->
                <a href="deletar.php?id=<?=$usuario['id'];?>">[deletar]</a> <!--Envia id deletar.php -->
            </td>
        </tr>
    <?php endforeach ?>

</table>