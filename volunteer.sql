SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `georgid6_wo3496` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `georgid6_wo3496` ;

CREATE TABLE IF NOT EXISTS `wp_wjwg_volunteer_sign_up` (
 `general_sports` varchar(15) DEFAULT NULL,
 `medical` varchar(15) DEFAULT NULL,
 `license_level` varchar(10) DEFAULT NULL,
 `first_name` varchar(50) NOT NULL,
 `last_name` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `str_address` varchar(100) NOT NULL,
 `str_address_2` varchar(100) NOT NULL,
 `city` varchar(50) NOT NULL,
 `state_name` varchar(10) NOT NULL,
 `zip` int(5) NOT NULL,
 `cellphone` varchar(10) NOT NULL,
 `dayphone` varchar(10) NOT NULL,
 `employer_name` varchar(50) NOT NULL,
 `t_shirt_size` varchar(3) NOT NULL,
 `preferred_sports` varchar(20) NOT NULL,
 `prev_experience` varchar(3) NOT NULL,
 `sport` varchar(20) NOT NULL,
 `waiver` text NOT NULL
) 
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `wp_wjwg_volunteer_admin` (
 `sport` varchar(20) NOT NULL,
 `start_date` DATE NULL DEFAULT NULL,
 `end_date` DATE NULL DEFAULT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

