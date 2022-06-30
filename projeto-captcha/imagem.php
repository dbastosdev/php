<?php

/*

Entendendo o sistema de captcha

1- Primeira etapa é gerar um código aleatório de 4 digitos;
2- Após isso, guarda-se esse número aleatório em uma sessão;
3- Cria-se uma imagem com o captcha;


*/
session_start();
header("Content-type: image/jpeg"); // O arquivo php se transforma em uma imagem

$n = $_SESSION['captcha'];

// Criando uma imagem do captcha
$imagem = imagecreate(100, 50);
imagecolorallocate($imagem, 200, 200, 200); // aplica cor a imagem

$fontcolor = imagecolorallocate($imagem, 20, 20, 20);

imagettftext($imagem, 40, 0, 21, 35, $fontcolor, __DIR__.'/Ginga.otf', $n);

imagejpeg($imagem, null, 100); // colocando nao imagem a cora


?>