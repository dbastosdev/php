/*
    Script para o banco de dados desse projeto:

    1- entrar no banco de dados: $ mysql -u <usuario> -p
    2- em seguida inserir senha
    
*/

/*
Verificando banco de dados existentes
*/
SHOW DATABASES;
/*

Criando um banco de dados
*/
CREATE DATABASE crud;
USE crud;
SHOW TABLES;

/*
Criando tabela de usuários
*/
CREATE TABLE usuario(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    email varchar(50)
);

/*
Inserindo e verificando dados de uma tabela no banco de dados 
*/
INSERT INTO crud.usuario (nome, email) VALUES ("Douglas","dbastos.dev@gmail.com");
SELECT * FROM usuario;
