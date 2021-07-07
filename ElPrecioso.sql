-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DBGame
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DBGame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DBGame` DEFAULT CHARACTER SET utf8 ;
USE `DBGame` ;

-- -----------------------------------------------------
-- Table `DBGame`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`User` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `age` INT NULL,
  `role` VARCHAR(45) NULL,
  `mail` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`Team` (
  `team_id` INT NOT NULL AUTO_INCREMENT,
  `team_name` VARCHAR(45) NULL,
  PRIMARY KEY (`team_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`Game` (
  `game_id` INT NOT NULL AUTO_INCREMENT,
  `game_name` VARCHAR(45) NULL,
  PRIMARY KEY (`game_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`Player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`Player` (
  `player_id` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(45) NULL,
  `nationality` VARCHAR(45) NULL,
  `game_id` INT NOT NULL,
  `team_id` INT NOT NULL,
  PRIMARY KEY (`player_id`),
  INDEX `fk_Player_Game_idx` (`game_id` ASC),
  INDEX `fk_Player_Team1_idx` (`team_id` ASC),
  CONSTRAINT `fk_Player_Game`
    FOREIGN KEY (`game_id`)
    REFERENCES `DBGame`.`Game` (`game_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Player_Team1`
    FOREIGN KEY (`team_id`)
    REFERENCES `DBGame`.`Team` (`team_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`News`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`News` (
  `news_id` INT NOT NULL AUTO_INCREMENT,
  `news_content` VARCHAR(45) NULL,
  `title` VARCHAR(45) NULL,
  PRIMARY KEY (`news_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`Match`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`Match` (
  `Match_id` INT NOT NULL AUTO_INCREMENT,
  `team_id` INT NULL,
  `date` DATETIME NULL,
  `game_id` INT NOT NULL,
  PRIMARY KEY (`Match_id`),
  INDEX `fk_Match_Game1_idx` (`game_id` ASC) ,
  CONSTRAINT `fk_Match_Game1`
    FOREIGN KEY (`game_id`)
    REFERENCES `DBGame`.`Game` (`game_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBGame`.`Match_has_Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBGame`.`Match_has_Team` (
  `Match_id` INT NOT NULL,
  `Match_team_id` INT NOT NULL,
  PRIMARY KEY (`Match_id`, `Match_team_id`),
  INDEX `fk_Match_has_Team_Team1_idx` (`Match_team_id` ASC) ,
  INDEX `fk_Match_has_Team_Match1_idx` (`Match_id` ASC) ,
  CONSTRAINT `fk_Match_has_Team_Match1`
    FOREIGN KEY (`Match_id`)
    REFERENCES `DBGame`.`Match` (`Match_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Match_has_Team_Team1`
    FOREIGN KEY (`Match_team_id`)
    REFERENCES `DBGame`.`Team` (`team_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
