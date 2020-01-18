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
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
    `idusuario` INT NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(45) NOT NULL,
    `senha` VARCHAR(45) NOT NULL,
    `nome` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`postagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`postagem` (
    `idpostagem` INT NOT NULL AUTO_INCREMENT,
    `usuario_idusuario` INT NOT NULL,
    `mensagem` VARCHAR(500) NULL,
    PRIMARY KEY (`idpostagem`, `usuario_idusuario`),
    -- INDEX `fk_postagem_usuario_idx` (`usuario_idusuario` ASC) VISIBLE,
    CONSTRAINT `fk_postagem_usuario`
        FOREIGN KEY (`usuario_idusuario`)
        REFERENCES `mydb`.`usuario` (`idusuario`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
