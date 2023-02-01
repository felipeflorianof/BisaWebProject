create database BisaWebProject;

use BisaWebProject;

CREATE TABLE Tipos_Entradas (
  id_tipo_entrada INT PRIMARY KEY,
  nome VARCHAR(255)
);

CREATE TABLE Entradas (
  id_entrada INT PRIMARY KEY,
  id_tipo_entrada INT,
  descricao VARCHAR(255),
  data_hora_entrada DATETIME,
  FOREIGN KEY (id_tipo_entrada) REFERENCES Tipos_Entradas (id_tipo_entrada)
);

CREATE TABLE Tipos_Saida (
  id_tipo_saida INT PRIMARY KEY,
  nome VARCHAR(255)
);

CREATE TABLE Saida (
  id_saida INT PRIMARY KEY,
  id_tipo_saida INT,
  descricao VARCHAR(255),
  data_hora_saida DATETIME,
  FOREIGN KEY (id_tipo_saida) REFERENCES Tipos_Saida (id_tipo_saida)
);