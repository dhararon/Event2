CREATE DATABASE Eventos;

USE Eventos;

CREATE TABLE IF NOT EXISTS Tipos_Usuarios(

	tipoUsuario_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombreTipo VARCHAR(30)

)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Carreras(

	carrera_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombreCarrera VARCHAR(150),
	abreviatura VARCHAR(10)

)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Usuarios(

	usuario_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombreUsuario VARCHAR(80) NOT NULL,
	apellidoPat VARCHAR(80) NOT NULL,
	apellidoMat VARCHAR(80) NOT NULL,
	cuenta VARCHAR(10) UNIQUE,
	carrera_fk INT NOT NULL,
	semestre INT,
	imagen VARCHAR(250),
	password VARCHAR(50),
	tipo_fk INT NOT NULL,

	CONSTRAINT FOREIGN KEY (tipo_fk) REFERENCES Tipos_Usuarios(tipoUsuario_pk)
		ON DELETE CASCADE ON UPDATE CASCADE,

	CONSTRAINT FOREIGN KEY (carrera_fk) REFERENCES Carreras(carrera_pk)
		ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Aulas(

	aula_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	edificio VARCHAR(2) NOT NULL,
	salon VARCHAR(50) NOT NULL,
	capacidad INT NOT NULL

)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Eventos(

	evento_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombreEvento VARCHAR(100) NOT NULL,
	fechaInicio DATE NOT NULL,
	fechaTermino DATE NOT NULL,
	descripcion TEXT NOT NULL

)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Ponentes(

	ponente_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombrePonente VARCHAR(150) NOT NULL,
	carrera VARCHAR(150) NOT NULL,
	descripcion TEXT

)ENGINE=INNODB;

/* El tipo es  Taller, conferencia, platica*/
CREATE TABLE IF NOT EXISTS Actividades(

	actividad_pk INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nombreActividades VARCHAR(100) NOT NULL,
	tipo VARCHAR(30) NOT NULL,
	fecha DATE,
	hora VARCHAR(11),
	ponente_fk INT NOT NULL,
	aula_fk INT NOT NULL,
	evento_fk INT NOT NULL,
	descripcion TEXT,
	inscritos INT DEFAULT 0,

	CONSTRAINT FOREIGN KEY (ponente_fk) REFERENCES Ponentes(ponente_pk) 
		ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT FOREIGN KEY (aula_fk) REFERENCES Aulas(aula_pk)
		ON DELETE CASCADE ON UPDATE CASCADE,

	CONSTRAINT FOREIGN KEY (evento_fk) REFERENCES Eventos(evento_pk)
		ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=INNODB;

/* Creamos los permisos de los usuarios*/
INSERT INTO Tipos_Usuarios(nombreTipo) VALUES('Administrador');
INSERT INTO Tipos_Usuarios(nombreTipo) VALUES('Organizador');
INSERT INTO Tipos_Usuarios(nombreTipo) VALUES('Participante');

/* Creamos las carreras */
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Informatica administrativa','LIA');
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Ingenieria en computacion','ICO');
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Psicologia','LPS');
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Contabilidad','LCN');
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Administracion','LAM');
INSERT INTO Carreras(nombreCarrera,abreviatura) VALUES('Derecho','LDC');

/* Creamos el administrador */
INSERT INTO Usuarios VALUES('','Dharwin Aaron','Perez','Rodriguez','1025747',1,6,'','chachito',1);