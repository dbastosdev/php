/*
O registro precisa modificar a tabela de usuários  de forma a criar um campo com o código 
para o link de cadastro.
*/

/* Adicionando um campo código na tabela de usuario*/
ALTER TABLE usuario ADD codigo varchar(32);

/*Preenchendo o código para os usuários*/
UPDATE usuario SET codigo = 'adf35sad4fsda564fads' WHERE id = 2;
UPDATE usuario SET codigo = 'adf35sad4dfsf5gsfads' WHERE id = 6;
UPDATE usuario SET codigo = 'adf35s5489sda564fads' WHERE id = 8;
UPDATE usuario SET codigo = 'adf35s54dseda564fads' WHERE id = 10;

/* Ao estar logado no sistema, o usuário terá acesso a um link especial que poderá ser usado para convidar
outros usuários a se cadastrarem no sistema*/

/*
 Ao usar o link, o sistema deverá avaliar se o código é válido e somente com isso permitir o cadastro de usuários
*/

/*
É possível ainda criar mais um campo no banco para ser incrementado a cada vez que o link for usado
*/