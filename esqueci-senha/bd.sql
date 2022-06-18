CREATE TABLE user_login (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(100),
    senha varchar(50)
);

INSERT INTO user_login (email, senha) VALUES ('suporte@b7web.com.br', md5(12345));
INSERT INTO user_login (email, senha) VALUES ('fulano@gmail.com', md5(12345));

SELECT * FROM user_login;

/* fim tabela user_login */

/* Após atualizar a senha, altera-se o campo used. Outra coisa importante é o sistema avaliar se o tempo para
uso ainda é válido. */

CREATE TABLE user_token (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    token varchar(32),
    used TINYINT(1) DEFAULT 0,
    expired_in DATETIME
);
