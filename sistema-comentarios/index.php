<?php
// Chamando configuração do banco de dados
require_once 'config.php';

// Recebendo dados do formulário
$nome = filter_input(INPUT_POST,'nome');
$mensagem = filter_input(INPUT_POST,'mensagem');

if($nome && $mensagem) {
    $data_msg = date("Y-m-d H:i:s");
    $bd_data = $pdo->prepare("INSERT INTO comentarios (data_msg, nome, mensagem) VALUES (:data_msg, :nome, :mensagem)");
    $bd_data->bindValue('data_msg', $data_msg);
    $bd_data->bindValue('nome', $nome);
    $bd_data->bindValue('mensagem', $mensagem);
    $bd_data->execute();
}

// Conectando ao banco e recebendo as mensagens
// Se mão colocar aqui, não aparece de primeira a mensagem
$database = $pdo->query("SELECT * FROM comentarios ORDER BY data_msg DESC");

?>


<!-- Formulário para a entrada de informações -->

<fieldset>
    <h2>Cadastro de mensagens</h2>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome"> <br>
        Mensagem: <br>
        <input type="text" name="mensagem"> <br>
        <input type="submit" value="cadastrar"> 
    </form>
</fieldset>
<br>

<!-- Exibindo de mensagens retornadas do banco -->
<?php foreach($database as $data ) :?>
<strong><?php echo $data['nome']; ?></strong> <br>
<p><?php echo $data['data_msg']; ?></p> 
<p><?php echo $data['mensagem']; ?></p>
<hr>
<?php endforeach; ?>