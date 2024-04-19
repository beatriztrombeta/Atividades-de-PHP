-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Gênero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Gênero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_genero` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Livro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) NOT NULL,
  `autor` VARCHAR(150) NOT NULL,
  `id_genero` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_id_genero`
    FOREIGN KEY (`id_genero`)
    REFERENCES `mydb`.`Gênero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empréstimos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empréstimos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATE NOT NULL,
  `data_devolucao` DATE NULL,
  `id_livro` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_id_livro`
    FOREIGN KEY (`id_livro`)
    REFERENCES `mydb`.`Livro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `mydb`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- Inserindo um gênero
INSERT INTO `mydb`.`Gênero` (`nome_genero`, `descricao`) 
VALUES ('Ficção Científica', 'Livros que exploram cenários futuristas e avanços científicos.');

-- Obtendo o ID do gênero inserido
SET @id_genero := LAST_INSERT_ID();

-- Inserindo dois livros associados ao gênero inserido
INSERT INTO `mydb`.`Livro` (`titulo`, `autor`, `id_genero`)
VALUES ('Neuromancer', 'William Gibson', @id_genero);

INSERT INTO `mydb`.`Livro` (`titulo`, `autor`, `id_genero`)
VALUES ('Fundação', 'Isaac Asimov', @id_genero);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
