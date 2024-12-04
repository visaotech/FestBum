CREATE DATABASE FestBum ;

USE FestBum;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
   	primeironome varchar(255),
    sobrenome varchar(255),
    cidade varchar(255),
    estado varchar(255),
	cep varchar(255),
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    sexo ENUM('Feminino', 'Masculino', 'Outro', 'Prefiro não dizer') NOT NULL,  -- Adicionando mais opções no sexo
    data_nascimento DATE NOT NULL,
);

select * from usuarios;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL,
    tipo ENUM('Emabalagens', 'Adesivos', 'Tags', 'Personalizados') NOT NULL
);
select * from produtos;