SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema getcaregiverdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `getcaregiverdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `getcaregiverdb` ;

-- -----------------------------------------------------
-- Table `getcaregiverdb`.`state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`state` (
  `state_id` INT NOT NULL,
  `state_name` VARCHAR(45) NULL,
  PRIMARY KEY (`state_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`employer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`employer` (
  `employer_id` INT NOT NULL,
  `employer_fname` VARCHAR(45) NULL,
  `employer_lname` VARCHAR(45) NULL,
  `employer_email` VARCHAR(45) NULL,
  `employer_phone` VARCHAR(45) NULL,
  `employer_company` VARCHAR(45) NULL,
  `employer_address` VARCHAR(45) NULL,
  `employer_idnumber` VARCHAR(45) NULL,
  `state_id` INT NULL,
  `employer_date` TIMESTAMP NULL,
  PRIMARY KEY (`employer_id`),
  UNIQUE INDEX `employer_email_UNIQUE` (`employer_email` ASC),
  UNIQUE INDEX `employer_idnumber_UNIQUE` (`employer_idnumber` ASC),
  INDEX `FK2_idx` (`state_id` ASC),
  CONSTRAINT `FK2`
    FOREIGN KEY (`state_id`)
    REFERENCES `getcaregiverdb`.`state` (`state_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`employee` (
  `employee_id` INT NOT NULL,
  `employee_fname` VARCHAR(45) NULL,
  `employee_lname` VARCHAR(45) NULL,
  `employee_email` VARCHAR(45) NULL,
  `employee_phone` VARCHAR(45) NULL,
  `employee_address` VARCHAR(45) NULL,
  `employee_idnumber` VARCHAR(45) NULL,
  `state_id` INT NULL,
  `employee_date` TIMESTAMP NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE INDEX `employee_email_UNIQUE` (`employee_email` ASC),
  UNIQUE INDEX `employee_idnumber_UNIQUE` (`employee_idnumber` ASC),
  INDEX `FK1_idx` (`state_id` ASC),
  CONSTRAINT `FK1`
    FOREIGN KEY (`state_id`)
    REFERENCES `getcaregiverdb`.`state` (`state_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`employertrx`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`employertrx` (
  `employertrx_id` INT NOT NULL,
  `employertrx_date` TIMESTAMP NULL,
  `employertrx_amt` FLOAT NULL,
  `employertrx_status` TINYINT NULL,
  `employertrx_employerid` INT NULL,
  PRIMARY KEY (`employertrx_id`),
  INDEX `FK3_idx` (`employertrx_employerid` ASC),
  CONSTRAINT `FK3`
    FOREIGN KEY (`employertrx_employerid`)
    REFERENCES `getcaregiverdb`.`employer` (`employer_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`employeetrx`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`employeetrx` (
  `employeetrx_id` INT NOT NULL,
  `employeetrx_date` TIMESTAMP NULL,
  `employeetrx_amt` FLOAT NULL,
  `employeetrx_status` TINYINT NULL,
  `employeetrx_employerid` INT NULL,
  PRIMARY KEY (`employeetrx_id`),
  INDEX `FK1_idx` (`employeetrx_employerid` ASC),
  CONSTRAINT `FK6`
    FOREIGN KEY (`employeetrx_employerid`)
    REFERENCES `getcaregiverdb`.`employee` (`employee_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`resume`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`resume` (
  `resume_id` INT NOT NULL,
  `resume_name` VARCHAR(45) NULL,
  `resume_employeeid` INT NULL,
  PRIMARY KEY (`resume_id`),
  INDEX `FK5_idx` (`resume_employeeid` ASC),
  CONSTRAINT `FK5`
    FOREIGN KEY (`resume_employeeid`)
    REFERENCES `getcaregiverdb`.`employee` (`employee_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `getcaregiverdb`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `getcaregiverdb`.`post` (
  `post_id` INT NOT NULL,
  `post_name` VARCHAR(45) NULL,
  `post_address` VARCHAR(45) NULL,
  `post_stateid` INT NULL,
  `post_employerid` INT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `FK4_idx` (`post_employerid` ASC),
  INDEX `FK7_idx` (`post_stateid` ASC),
  CONSTRAINT `FK4`
    FOREIGN KEY (`post_employerid`)
    REFERENCES `getcaregiverdb`.`employer` (`employer_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `FK7`
    FOREIGN KEY (`post_stateid`)
    REFERENCES `getcaregiverdb`.`state` (`state_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
