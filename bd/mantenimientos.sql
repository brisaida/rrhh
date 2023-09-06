USE master
GO

USE DBSIMFCOH_PRB
GO

CREATE SCHEMA rrhh
GO


/* Profesión */
CREATE TABLE rrhh.profesiones (
	idProfesion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Profesion_id
		PRIMARY KEY CLUSTERED (idProfesion),
	nombre VARCHAR(100) NOT NULL
);
GO

/* Proyectos 
CREATE TABLE rrhh.proyectos (
	idProfesion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Profesion_id
		PRIMARY KEY CLUSTERED (idProfesion),
	nombre VARCHAR(100) NOT NULL
);
GO */

/* Acciones de Personal */
CREATE TABLE rrhh.tipoAccionesPersonal (
	idTipoAccion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Profesion_id
		PRIMARY KEY CLUSTERED (idTipoAccion),
	nombre VARCHAR(100) NOT NULL
);
GO