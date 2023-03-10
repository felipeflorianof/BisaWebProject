create database bisa;
use bisa;

CREATE TABLE Tipo_Entrada (
  id_tipo_entrada INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NULL
);

CREATE TABLE Entrada (
  id_entrada INT PRIMARY KEY AUTO_INCREMENT,
  numero_da_conta INT UNSIGNED UNIQUE NOT NULL,
  id_tipo_entrada INT NULL,
  descricao Text,
  data_hora_entrada DATETIME,
  valor_entrada INT UNSIGNED NOT NULL,
  FOREIGN KEY (id_tipo_entrada) REFERENCES Tipo_Entrada (id_tipo_entrada)
);

CREATE TABLE Tipo_Saida (
  id_tipo_saida INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NULL
);

CREATE TABLE Saida (
  id_saida INT PRIMARY KEY AUTO_INCREMENT,
  numero_da_conta INT UNSIGNED UNIQUE NOT NULL,
  id_tipo_saida INT NULL,
  descricao Text,
  data_hora_saida DATETIME,
  valor_saida INT UNSIGNED NOT NULL ,
  FOREIGN KEY (id_tipo_saida) REFERENCES Tipo_Saida (id_tipo_saida)
);

CREATE TABLE Conta (
  id_conta INT PRIMARY KEY AUTO_INCREMENT,
  saldo_atual INT NULL default 0
);

CREATE TRIGGER atualiza_saldo_entrada
AFTER INSERT ON entrada
FOR EACH ROW
  UPDATE Conta SET saldo_atual = saldo_atual + NEW.valor_entrada; -- Adicionando um Where eu consigo escolher em qual conta vou fazer a atualização.

CREATE TRIGGER atualiza_saldo_saida
AFTER INSERT ON saida
FOR EACH ROW
  UPDATE Conta SET saldo_atual = saldo_atual - NEW.valor_saida; -- Adicionando um Where eu consigo escolher em qual conta vou fazer a atualização.

SET SQL_SAFE_UPDATES=0; -- !important 
-- Como não estou usando um where para manipular as operações em várias contas diferentes eu preciso rodar este comando, pois as triggers acima vão atualizar os registros independente do 'numero_da_conta'.