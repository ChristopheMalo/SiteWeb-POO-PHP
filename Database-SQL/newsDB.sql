-- --------------------------------------
-- CREATION DE LA BASE newsDB
-- --------------------------------------
CREATE DATABASE newsDB CHARACTER SET 'utf8';
USE newsDB;

-- --------------------------------------
-- CREATION DE LA TABLE news
-- --------------------------------------
CREATE TABLE news (
    id SMALLINT(5) UNSIGNED AUTO_INCREMENT,
    auteur VARCHAR(30) NOT NULL,
    titre VARCHAR(100) NOT NULL,
    contenu TEXT NOT NULL,
    dateAjout DATETIME NOT NULL,
    dateModif DATETIME NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=INNODB;

-- --------------------------------------
-- CREATION DE LA TABLE comments
-- --------------------------------------
CREATE TABLE IF NOT EXISTS comments (
    id MEDIUMINT(9) UNSIGNED AUTO_INCREMENT,
    news SMALLINT(6) UNSIGNED NOT NULL,
    auteur VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL,
    date DATETIME NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=INNODB;