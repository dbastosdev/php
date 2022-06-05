<?php
// usando o arquivo de configuração do mysql
require_once 'config.php';
// usando o arquivo de usuário dao
require_once 'dao/UsuarioDaoMySql.php';

// Instanciando o usuário, o contrutor recebe um objeto do tipo $pdo
$usuarioDao = new UsuarioDaoMySql($pdo);

// Armaezenando todos os usuários do banco de dados a partir de uma consulta com o objeto DAO de usuários
// A lista guardará vários objetos do tipo usuário (model). Antigamente guardava vários arrays
$lista = $usuarioDao->findAll();

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
    <?php foreach($lista as $usuario): ?>
        <tr>
            <!-- Exibindo os dados de cada objeto do array de objetos obtidos no findAll-->
            <td><?=$usuario->getId(); ?></td>
            <td><?=$usuario->getNome(); ?></td>
            <td><?=$usuario->getEmail();?></td>
            <td>
                <a href="editar.php?id=<?=$usuario->getId();?>">[editar]</a>   <!--Envia id editar.php -->
                <a href="deletar.php?id=<?=$usuario->getId();?>">[deletar]</a> <!--Envia id deletar.php -->
            </td>
        </tr>
    <?php endforeach ?>

</table>