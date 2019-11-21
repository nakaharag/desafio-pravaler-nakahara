CREATE SCHEMA `pravaler_gustavo` ;

USE `pravaler_gustavo` ;

CREATE TABLE `pravaler_gustavo`.`instituicao` (
  `id_instituicao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(199) NULL,
  `cnpj` VARCHAR(20) NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id_instituicao`),
  UNIQUE INDEX `cnpj` (`cnpj` ASC));

CREATE TABLE `pravaler_gustavo`.`curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT,
  `id_instituicao` INT NOT NULL,
  `nome` VARCHAR(199) NULL,
  `duracao` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id_curso`));

CREATE TABLE `pravaler_gustavo`.`aluno` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `id_curso` INT NOT NULL,
  `nome` VARCHAR(199) NULL,
  `cpf` VARCHAR(15) NULL,
  `data_nasc` VARCHAR(99) NULL,
  `email` VARCHAR(99) NULL,
  `celular` VARCHAR(45) NULL,
  `endereco` VARCHAR(199) NULL,
  `numero` VARCHAR(45) NULL,
  `bairro` VARCHAR(99) NULL,
  `cidade` VARCHAR(45) NULL,
  `uf` VARCHAR(2) NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE INDEX `cpf` (`cpf` ASC));
