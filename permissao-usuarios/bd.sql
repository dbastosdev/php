/* Inclui campo para gerir permissões da tabela de usuários

Exmplos de permissões: 

ADD: Permissão para adicionar algo;
DEL: Permissão para deletar e por aí vai

*/
ALTER TABLE usuario ADD permissoes VARCHAR(50);

/* Criando um usuário*/
INSERT INTO usuario (nome, email, senha, codigo, status, permissoes) 
    VALUES ('fulano', 'fulano@gmail.com', 123456, 'xpto', NULL, 'ADD, EDIT, DEL, SECRET');

/* Tabela de documentos para ilustrar as permissões*/
CREATE TABLE documentos(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    titulo TEXT
);

INSERT INTO documentos (titulo) VALUES ('CPF de cicrano ');
INSERT INTO documentos (titulo) VALUES ('Recibo do carro X ');
INSERT INTO documentos (titulo) VALUES ('boleto pago ');