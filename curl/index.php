<?php

// Tem a função de fazer a integração com serviços externos (API)

// Iniciando a biblioteca curl
$ch = curl_init();
// Configurando: biblioteca, configuração de url, endereço url 
curl_setopt($ch, CURLOPT_URL, "https://api.chucknorris.io/jokes/categories");

// Pegando o resultado da consulta
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executando a requisição
$resposta = curl_exec($ch);
// fechando a conexão
curl_close($ch);

// Exibindo os dados
print_r($resposta);


?>