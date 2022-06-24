<?php

session_start();
require_once 'config.php';

// Se usuário não estiver logado, será redirecionado para a página de login. Do contrário, continua na 
// página e consegue acesso ao sistema. 
if(!$_SESSION['logado']) {
    header('Location: login.php');
    exit;
}

echo "Login efetuado com sucesso! ";