CREATE DATABASE FestBum ;

USE FestBum;

CREATE TABLE usuario (
	primeironome varchar(255),
    sobrenome varchar(255),
    cidade varchar(255),
    estado varchar(255),
	cep varchar(255),
	email varchar(255) primary key,
	senha varchar(255)
);
select * from usuario;

CREATE TABLE produtos (
    id INT(6) UNSIGNED AUTO_INCREMENT primary key,
    nome VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    valor DECIMAL(10,2) NOT NULL
);
select * from produtos;



