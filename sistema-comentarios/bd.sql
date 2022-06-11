CREATE TABLE comentarios (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data_msg DATETIME,
    nome varchar(50),
    mensagem varchar(255)
);