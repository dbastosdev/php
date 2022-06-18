<?php

// Esse arquivo recebe o link e realiza a mudança do estado de cadastro no banco de dados

require_once 'config.php';

// Pegando e verificando a variável 'h' que é enviada ao clique do usuário no link

$h = $_GET['h'];

if(!empty($h)) {
    $pdo->query("UPDATE usuario SET status = '1' WHERE MD5(id) = '$h'");
    echo "cadastro confirmado com sucesso";
}
