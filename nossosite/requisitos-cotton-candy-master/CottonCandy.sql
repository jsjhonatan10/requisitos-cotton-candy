USE [ProjetoFinal];

CREATE TABLE Aluno(
	id_Aluno INT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL,
	Email VARCHAR(50) NOT NULL,
	Usu�rio VARCHAR(30) NOT NULL,
	Senha VARCHAR(20) NOT NULL,
	Institui��o VARCHAR(50));

CREATE TABLE TarefaEvento(
	id_TarefaEvento INT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL,
	Cor VARCHAR(7) NOT NULL,
	id_Aluno INT CONSTRAINT fk_Aluno FOREIGN KEY REFERENCES Aluno(id_Aluno));

CREATE TABLE Avaliacao(
	id_Avaliacao INT PRIMARY KEY NOT NULL,
	Tipo VARCHAR(100) NOT NULL);

CREATE TABLE Materia(
	id_Materia INT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL,
	Cor VARCHAR(7) NOT NULL,
	id_Aluno INT CONSTRAINT fk_Materia_Aluno FOREIGN KEY REFERENCES Aluno(id_Aluno));

CREATE TABLE MateriaAvaliacao(
	id_Avaliacao INT CONSTRAINT fk_Avaliacao FOREIGN KEY REFERENCES Avaliacao(id_Avaliacao),
	id_Materia INT CONSTRAINT fk_Materia FOREIGN KEY REFERENCES Materia(id_Materia));

CREATE TABLE Nota(
	id_Nota INT PRIMARY KEY NOT NULL,
	Valor FLOAT,
	id_Avaliacao INT CONSTRAINT fk_Avaliacao FOREIGN KEY REFERENCES Avaliacao(id_Avaliacao),
	id_Materia INT CONSTRAINT fk_Materia FOREIGN KEY REFERENCES Materia(id_Materia));
SELECT * FROM Avaliacao;
DROP TABLE Nota;
DROP TABLE MateriaAvaliacao;
DROP TABLE TarefaEvento;

ALTER TABLE TarefaEvento
DROP CONSTRAINT fk_aluno;

ALTER TABLE Avaliacao
ADD Valor float;

ALTER TABLE Avaliacao
ADD id_Aluno INT;

ALTER TABLE Avaliacao
ADD id_Materia INT;

ALTER TABLE Avaliacao
ADD CONSTRAINT fk_Avaliacao_Aluno FOREIGN KEY(id_Aluno) REFERENCES Aluno(id_Aluno);

ALTER TABLE Avaliacao
ADD CONSTRAINT fk_Materia FOREIGN KEY(id_Materia) REFERENCES Materia(id_Materia);

CREATE TABLE Tarefa(
	id_Tarefa INT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL,
	Cor VARCHAR(7) NOT NULL,
	Descri��o VARCHAR(100),
	Data_Termino DATE,
	Hora_Termino DATE,
	id_Aluno INT CONSTRAINT fk_Aluno FOREIGN KEY REFERENCES Aluno(id_Aluno));

CREATE TABLE Evento(
	id_Evento INT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL,
	Lugar VARCHAR(100),
	Data_Termino DATE,
	Hora_Inicio DATE,
	Hora_Termino DATE,
	id_Aluno INT CONSTRAINT fk_Evento_Aluno FOREIGN KEY REFERENCES Aluno(id_Aluno));