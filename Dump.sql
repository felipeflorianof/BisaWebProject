create database bisa;

use bisa;

CREATE TABLE Tipo_Entrada (
  id_tipo_entrada INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE Entrada (
  id_entrada INT PRIMARY KEY AUTO_INCREMENT,
  id_tipo_entrada INT,
  descricao Text NOT NULL,
  data_hora_entrada DATETIME,
  FOREIGN KEY (id_tipo_entrada) REFERENCES Tipo_Entrada (id_tipo_entrada)
);

CREATE TABLE Tipo_Saida (
  id_tipo_saida INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE Saida (
  id_saida INT PRIMARY KEY AUTO_INCREMENT,
  id_tipo_saida INT,
  descricao Text NOT NULL,
  data_hora_saida DATETIME,
  FOREIGN KEY (id_tipo_saida) REFERENCES Tipo_Saida (id_tipo_saida)
);