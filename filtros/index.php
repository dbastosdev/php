<?php

// Buscando a configuração do banco de dados
require_once 'config.php';

// Buscando dados no mysql
$sql = $pdo->query("SELECT * FROM user_filter");
$sql = $sql->fetchAll();

// Conversor de números e sexo
// Com isso, utilizamos os números como chave para fazer a conversão entre masculino e feminino
$sexos = array(
    '0' => 'Masculino',
    '1' => 'Feminino'
);

?>


<!-- Criando um formulário para o filtro --> 



<table border="1">
    <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>
    <?php foreach($sql as $usuario) : ?>
    <tr>
        <td><?php echo $usuario['nome']; ?></td>
        <td><?php echo $sexos[$usuario['sexo']]; ?></td>
        <td><?php echo $usuario['idade']; ?></td>
    </tr>
    <?php endforeach ; ?>
</table>