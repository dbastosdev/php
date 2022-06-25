<?php

session_start();
require_once 'config.php';
require 'classes/usuarios.class.php';
require 'classes/documentos.class.php';


// Se usuário não estiver logado, será redirecionado para a página de login. Do contrário, continua na 
// página e consegue acesso ao sistema. 
if(!$_SESSION['logado']) {
    header('Location: login.php');
    exit;
}

// Seta o usuário que está logado
// Assim, salvará em uma instância do usuário as permissões deste e outras características relevantes
// No controle de acesso puro e simples, temos que guardar apenas o id da seção, na prática poderíamos 
// guardar todos os dados na seção
$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

// Baixando os documentos do banco de dados
$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();

?>

<h1>Sistema</h1>

<h2>Usuario logado: <?php echo $usuarios->getNome($_SESSION['logado']); ?></h2> 
 
<br>
<!-- Se o usuário tiver a permissão de adicionar, poderá ver o botão adicionar -->
<?php if($usuarios->temPermissao('ADD')) :?>
<a href=""> adicionar novo documento</a>
<br>
<br>
<?php endif ?>

<table border="1">
    <tr>
        <th>Nome do arquivo</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $item) : ?>
    <tr>
        <td><?php echo $item['titulo']; ?></td>
        <td>
            <?php if($usuarios->temPermissao('EDIT')) :?>
            <a href="">Editar</a>
            <?php endif ?>
            <?php if($usuarios->temPermissao('DEL')) :?>
            <a href="">Apagar</a>
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
