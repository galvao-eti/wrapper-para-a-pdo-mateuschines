CREATE DATABASE turma3 DEFAULT COLLATE utf8_bin;

USE turma3;

CREATE TABLE categoria (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(40) NOT NULL,
                PRIMARY KEY (id)
);


CREATE UNIQUE INDEX categoria_idx
 ON categoria
 ( nome );

CREATE TABLE produto (
                id INT AUTO_INCREMENT NOT NULL,
                categoria_id SMALLINT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                descricao TEXT,
                valor NUMERIC(6,2) NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE produto ADD CONSTRAINT categoria_produto_fk
FOREIGN KEY (categoria_id)
REFERENCES categoria (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
