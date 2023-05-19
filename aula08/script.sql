DROP DATABASE aula8;

DROP DATABASE IF EXISTS aula8;

USE aula08;

CREATE TABLE contato(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  telefone CHAR(11) NOT NULL
);

INSERT INTO contato (nome, telefone) VALUES ('Harry Potter','2222222222');
INSERT INTO contato (nome, telefone) VALUES ('Jeff Jokes','1111111111');
INSERT INTO contato (nome, telefone) VALUES ('A Very Creative Name','12345678901');
INSERT INTO contato (nome, telefone) VALUES ('PHP da Silva Sauro','12345678912');