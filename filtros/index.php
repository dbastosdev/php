<?php

// Buscando a configuração do banco de dados
require_once 'config.php';

// Buscando dados no mysql
$sexo; // tornando a variável global

// Tratando selecção do filtro de sexo
//if($_POST['sexo'] == 0 || $_POST['sexo'] == 1 ) {
if(isset($_POST['sexo']) && $_POST['sexo'] < 2) { // Já é um valor fora do nosso range
    $sexo = $_POST['sexo'];
    $sql = $pdo->prepare("SELECT * FROM user_filter WHERE sexo = :sexo");
    $sql->bindValue(':sexo', $sexo);
    $sql->execute();
    $sql = $sql->fetchAll();
} else {
    $sexo = ''; // Caso não esteja setado $_POST['sexo']. Do contrário buga a lógica.
    $sql = $pdo->query("SELECT * FROM user_filter");
    $sql = $sql->fetchAll();
}


// Conversor de números e sexo
// Com isso, utilizamos os números como chave para fazer a conversão entre masculino e feminino
$sexos = array(
    '0' => 'Masculino',
    '1' => 'Feminino'
);

?>


<!-- Criando um formulário para o filtro 

Ao realizar a selecção, a parte do arquivo correspondente ao PHP poderá receber a escolha e 
utilizar dentro do SELECT para fitrar adequadamente a opção

--> 
<form method="POST">
    <select name="sexo">
        <option value="0" <?php echo ($sexo == '0')? 'selected' : ''; ?>>Masculino</option> <!-- Forçando a marcação da opção com o selected -->
        <option value="1" <?php echo ($sexo == '1')? 'selected' : ''; ?>>Feminino</option>
        <option value="2" <?php echo ($sexo > 1 || $sexo == '')? 'selected' : ''; ?>>---</option>
    </select>
    <input type="submit" value="filtrar">
</form>


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