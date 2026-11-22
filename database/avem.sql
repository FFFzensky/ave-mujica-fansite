-- Database schema for the Ave Mujica fan website
-- Reconstructed from the queries used in the PHP code.

CREATE DATABASE IF NOT EXISTS `avem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `avem`;

CREATE TABLE IF NOT EXISTS `akun` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `comment` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_page` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
