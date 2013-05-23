

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Simulador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Simulador` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Simulador` (
  `idSimulador` VARCHAR(20) NOT NULL ,
  `nomSimulador` VARCHAR(20) NOT NULL ,
  `fecha_ingreso` DATETIME NOT NULL ,
  `mante_preventivo` DATETIME NOT NULL ,
  `mante_correctivo` DATETIME NOT NULL ,
  `casa_distribuidora` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`idSimulador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`personas` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`personas` (
  `idencargado` INT NOT NULL ,
  `nombres` VARCHAR(20) NOT NULL ,
  `apellidos` VARCHAR(20) NOT NULL ,
  `asignatura` VARCHAR(15) NOT NULL ,
  `telefono` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`idencargado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Estudiante` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Estudiante` (
  `personas_idencargado` INT NOT NULL ,
  INDEX `fk_Estudiante_personas1_idx` (`personas_idencargado` ASC) ,
  CONSTRAINT `fk_Estudiante_personas1`
    FOREIGN KEY (`personas_idencargado` )
    REFERENCES `mydb`.`personas` (`idencargado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Administrador` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Administrador` (
  `idAdministrador` VARCHAR(10) NOT NULL ,
  `nomAdministrador` VARCHAR(20) NOT NULL ,
  `apeAdministrador` VARCHAR(20) NOT NULL ,
  `telAdministrador` VARCHAR(10) NOT NULL ,
  `cargo` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`idAdministrador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Equipo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Equipo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Equipo` (
  `idEquipo` VARCHAR(10) NOT NULL ,
  `nomEquipo` VARCHAR(10) NOT NULL ,
  `mante_preventivo` DATETIME NOT NULL ,
  `mante_correctivo` DATETIME NOT NULL ,
  PRIMARY KEY (`idEquipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Practica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Practica` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Practica` (
  `idPractica` VARCHAR(10) NOT NULL ,
  `nomPractica` VARCHAR(10) NOT NULL ,
  `fecha_Practica` DATETIME NOT NULL ,
  `asignatura` VARCHAR(20) NOT NULL ,
  `modulo` VARCHAR(1) NOT NULL ,
  `Simulador_idSimulador` VARCHAR(20) NOT NULL ,
  `Equipo_idEquipo` VARCHAR(10) NOT NULL ,
  `personas_idencargado` INT NOT NULL ,
  PRIMARY KEY (`idPractica`, `Simulador_idSimulador`, `Equipo_idEquipo`, `personas_idencargado`) ,
  INDEX `fk_Practica_Simulador_idx` (`Simulador_idSimulador` ASC) ,
  INDEX `fk_Practica_Equipo1_idx` (`Equipo_idEquipo` ASC) ,
  INDEX `fk_Practica_personas1_idx` (`personas_idencargado` ASC) ,
  CONSTRAINT `fk_Practica_Simulador`
    FOREIGN KEY (`Simulador_idSimulador` )
    REFERENCES `mydb`.`Simulador` (`idSimulador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Practica_Equipo1`
    FOREIGN KEY (`Equipo_idEquipo` )
    REFERENCES `mydb`.`Equipo` (`idEquipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Practica_personas1`
    FOREIGN KEY (`personas_idencargado` )
    REFERENCES `mydb`.`personas` (`idencargado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Insumos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Insumos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Insumos` (
  `idInsumos` VARCHAR(10) NOT NULL ,
  `nomInsumo` VARCHAR(10) NOT NULL ,
  `cantidad` INT NOT NULL ,
  `unidad` VARCHAR(10) NULL ,
  PRIMARY KEY (`idInsumos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Docente` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Docente` (
  `personas_idencargado` INT NOT NULL ,
  INDEX `fk_Docente_personas1_idx` (`personas_idencargado` ASC) ,
  CONSTRAINT `fk_Docente_personas1`
    FOREIGN KEY (`personas_idencargado` )
    REFERENCES `mydb`.`personas` (`idencargado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Insumos_has_Practica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Insumos_has_Practica` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Insumos_has_Practica` (
  `Insumos_idInsumos` VARCHAR(10) NOT NULL ,
  `Practica_idPractica` VARCHAR(10) NOT NULL ,
  `cantidad` INT NULL ,
  PRIMARY KEY (`Insumos_idInsumos`, `Practica_idPractica`) ,
  INDEX `fk_Insumos_has_Practica_Practica1_idx` (`Practica_idPractica` ASC) ,
  INDEX `fk_Insumos_has_Practica_Insumos1_idx` (`Insumos_idInsumos` ASC) ,
  CONSTRAINT `fk_Insumos_has_Practica_Insumos1`
    FOREIGN KEY (`Insumos_idInsumos` )
    REFERENCES `mydb`.`Insumos` (`idInsumos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Insumos_has_Practica_Practica1`
    FOREIGN KEY (`Practica_idPractica` )
    REFERENCES `mydb`.`Practica` (`idPractica` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;