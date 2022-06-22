CREATE TABLE user_filter (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    sexo TINYINT(1),
    idade INT(3)
);

INSERT INTO user_filter (nome, sexo, idade) VALUES ('fulano', 0, 10 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('ciclano', 0, 19 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('beltrano', 0, 18 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('tia', 1, 45 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('madrinha', 1, 50 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('avó', 1, 80 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('primo', 0, 25 );
INSERT INTO user_filter (nome, sexo, idade) VALUES ('afilhada', 1, 9 );