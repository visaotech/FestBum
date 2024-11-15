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
    id INT NOT NULL AUTO_INCREMENT, 
    nome VARCHAR(45) NOT NULL, 
    imagem VARCHAR(80) NOT NULL, 
    preco DECIMAL (5,2) NOT NULL, 
PRIMARY KEY (id));
ALTER TABLE produtos ADD COLUMN tipo VARCHAR(255) NOT NULL;
ALTER TABLE produtos ADD COLUMN descricao TEXT;


select * from produtos;

#delete from produtos where id >33;
update produtos set imagem = concat("../img/",imagem) where id= 33;

select * from usuario;


alter table usuario add perfil varchar(50) default(0);
update usuario set perfil = 'admin' where email = 'festbum@gmail.com';

