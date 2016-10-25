
DROP DATABASE IF EXISTS MuuSimple;

CREATE DATABASE MuuSimple;

/*
Esto es otro comentario
pero
este es
multi
linea
*/

USE MuuSimple;

CREATE TABLE usuario (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombre              VARCHAR(100) NOT NULL,
    apellido            VARCHAR(100) NOT NULL,
    email               VARCHAR(100) NOT NULL UNIQUE,
    telefono            INT NOT NULL UNIQUE,
    password            VARCHAR(100) NOT NULL
);
