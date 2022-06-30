<?php

// Gera número aleatório e salva na seção se o capcha já não estiver setado
session_start();

if(!isset($_SESSION['captcha'])) {
    $n = rand(1000,9999);
    $_SESSION['captcha'] = $n;
}

// Recebendo e verificando o formulário
if(!empty($_POST['codigo'])) {
    $codigoDigitado = $_POST['codigo'];

    if($codigoDigitado == $_SESSION['captcha']) {
        echo "ACERTOU <br>";
    } else {
        echo "ERROU <br>";
    }

    $n = rand(1000,9999);
    $_SESSION['captcha'] = $n;
}

?>

<!-- O segredo é produzir uma imagem utilizando o php -->
<img src="imagem.php" width="100" height="50">


<!-- Criando um formulário -->
<br><br>
<form method="POST">
    <input type="text" name="codigo">
    <input type="submit" value="Verificar">
</form>
