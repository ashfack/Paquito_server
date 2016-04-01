-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`yaml`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`yaml` (
  `id_yaml` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `version` INT NOT NULL,
  `homepage` VARCHAR(45) NULL,
  `summary` VARCHAR(128) NULL,
  `description` VARCHAR(255) NULL,
  `copyright` VARCHAR(128) NULL,
  `maintainer` VARCHAR(128) NULL,
  `depotGitSvn` VARCHAR(255) NULL,
  PRIMARY KEY (`id_yaml`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`author` (
  `id_author` INT NOT NULL AUTO_INCREMENT,
  `mail` VARCHAR(128) NOT NULL,
  `passwordA` VARCHAR(255) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NULL,
  `homepage` VARCHAR(128) NULL,
  PRIMARY KEY (`id_author`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`yaml_author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`yaml_author` (
  `id_yaml` INT NULL,
  `id_author` INT NULL,
  PRIMARY KEY (`id_yaml`, `id_author`),
  INDEX `id_author_idx` (`id_author` ASC),
  CONSTRAINT `fk_yaml_author_id_yaml`
    FOREIGN KEY (`id_yaml`)
    REFERENCES `mydb`.`yaml` (`id_yaml`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_yaml_author_id_author`
    FOREIGN KEY (`id_author`)
    REFERENCES `mydb`.`author` (`id_author`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`package`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`package` (
  `id_package` INT NULL,
  `name` VARCHAR(128) NULL,
  PRIMARY KEY (`id_package`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`files` (
  `id_file` INT NULL,
  `name` VARCHAR(128) NOT NULL,
  `source` VARCHAR(128) NOT NULL,
  `permissions` INT NOT NULL,
  PRIMARY KEY (`id_file`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dependencie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dependencie` (
  `id_dependencie` INT NULL,
  `name` VARCHAR(128) NOT NULL,
  `flag_runtime_build` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_dependencie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`distribution_name_paquet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`distribution_name_paquet` (
  `id_distributionNP` INT NULL,
  `distribution` VARCHAR(128) NOT NULL,
  `name_paquet` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id_distributionNP`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`command`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`command` (
  `name` VARCHAR(128) NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`yaml_package`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`yaml_package` (
  `id_yaml` INT NULL,
  `id_package` INT NULL,
  PRIMARY KEY (`id_yaml`, `id_package`),
  INDEX `fk_yaml_package_id_package_idx` (`id_package` ASC),
  CONSTRAINT `fk_yaml_package_id_yaml`
    FOREIGN KEY (`id_yaml`)
    REFERENCES `mydb`.`yaml` (`id_yaml`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_yaml_package_id_package`
    FOREIGN KEY (`id_package`)
    REFERENCES `mydb`.`package` (`id_package`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`package_files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`package_files` (
  `id_package` INT NULL,
  `id_file` INT NULL,
  PRIMARY KEY (`id_package`, `id_file`),
  INDEX `fk_package_files_id_file_idx` (`id_file` ASC),
  CONSTRAINT `fk_package_files_id_package`
    FOREIGN KEY (`id_package`)
    REFERENCES `mydb`.`package` (`id_package`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_package_files_id_file`
    FOREIGN KEY (`id_file`)
    REFERENCES `mydb`.`files` (`id_file`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dependencie_distrib_paquet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dependencie_distrib_paquet` (
  `id_dependencie` INT NULL,
  `id_distributionNP` INT NULL,
  PRIMARY KEY (`id_dependencie`, `id_distributionNP`),
  INDEX `fk_depend_distrib_id_distribNP_idx` (`id_distributionNP` ASC),
  CONSTRAINT `fk_depend_distrib_id_depend`
    FOREIGN KEY (`id_dependencie`)
    REFERENCES `mydb`.`dependencie` (`id_dependencie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depend_distrib_id_distribNP`
    FOREIGN KEY (`id_distributionNP`)
    REFERENCES `mydb`.`distribution_name_paquet` (`id_distributionNP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`package_command`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`package_command` (
  `id_package` INT NULL,
  `name` VARCHAR(128) NULL,
  PRIMARY KEY (`id_package`, `name`),
  INDEX `fk_package_command_name_idx` (`name` ASC),
  CONSTRAINT `fk_package_command_id_package`
    FOREIGN KEY (`id_package`)
    REFERENCES `mydb`.`package` (`id_package`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_package_command_name`
    FOREIGN KEY (`name`)
    REFERENCES `mydb`.`command` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`yaml_dependencie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`yaml_dependencie` (
  `id_yaml` INT NULL,
  `id_dependencie` INT NULL,
  PRIMARY KEY (`id_yaml`, `id_dependencie`),
  INDEX `fk_yaml_depend_id_depend_idx` (`id_dependencie` ASC),
  CONSTRAINT `fk_yaml_depend_id_depend`
    FOREIGN KEY (`id_dependencie`)
    REFERENCES `mydb`.`dependencie` (`id_dependencie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_yaml_depend_id_yaml`
    FOREIGN KEY (`id_yaml`)
    REFERENCES `mydb`.`yaml` (`id_yaml`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

