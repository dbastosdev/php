/*
Lembrando o diagrama: 
Uma pessoa pode alugar N carros;
Um carro pode ser alugado por N pessoas
*/


/*
Criando tabela de carros que serão reservados
*/
CREATE TABLE carros(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100)
);

/* Populando o banco*/

INSERT INTO crud.carros  (nome) VALUES ("Palio");
INSERT INTO crud.carros  (nome) VALUES ("Fiat");
INSERT INTO crud.carros  (nome) VALUES ("Voyage");
INSERT INTO crud.carros  (nome) VALUES ("Corolla");
INSERT INTO crud.carros  (nome) VALUES ("Camaro");

CREATE TABLE reservas(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_carro INT(11),
    data_inicio DATE,
    data_fim DATE,
    pessoa VARCHAR(100) 
);

INSERT INTO crud.reservas (id_carro, data_inicio, data_fim, pessoa) 
VALUES (2, '2022-06-30', '2022-07-05', "Douglas");

INSERT INTO crud.reservas (id_carro, data_inicio, data_fim, pessoa) 
VALUES (1, '2022-06-30', '2022-07-05', "Douglas");

INSERT INTO crud.reservas (id_carro, data_inicio, data_fim, pessoa) 
VALUES (3, '2022-06-30', '2022-07-05', "Douglas");

/*

Cada carro é único. Logo um carro não poderá ser reservado duas vezes no mesmo período. Com isso, 
são necessárias verificações no sistema

*/