CREATE DATABASE helper;

USE helper;

CREATE TABLE pessoa (
  id_pessoa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(20) NULL,
  senha VARCHAR(50) NULL,
  PRIMARY KEY(id_pessoa)
);

CREATE TABLE suporte (
  id_suporte INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(20) NULL,
  assunto VARCHAR(50) NULL,
  descricao LONGTEXT NULL,
  PRIMARY KEY(id_suporte)
);

CREATE TABLE adm (
  id_adm INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(20) NULL,
  senha VARCHAR(50) NULL,
  PRIMARY KEY(id_adm)
);

CREATE TABLE denuncia (
  id_denuncia INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  pessoa_id_pessoa INTEGER UNSIGNED NOT NULL,
  descricao LONGTEXT NULL,
  imagem LONGBLOB NULL,
  nome VARCHAR(100) NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(75) NULL,
  PRIMARY KEY(id_denuncia),
  INDEX denuncia_FKIndex1(pessoa_id_pessoa)
);

