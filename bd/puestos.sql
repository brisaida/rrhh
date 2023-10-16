

CREATE TABLE rrhh.puestoCoordinador (
	idN1 INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel1_id
		PRIMARY KEY CLUSTERED (idN1),
	puesto VARCHAR(225) NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

INSERT INTO rrhh.puestoCoordinador(puesto,nombre,usuarioCreado) VALUES('Coordinador Ejectutivo','Terence Fuschich',1) 


CREATE TABLE rrhh.puestosDirectores (
	idDirector INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel2_id
		PRIMARY KEY CLUSTERED (idDirector),
	puesto VARCHAR(225) NOT NULL,
	proyecto INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.puestosGerentes (
	idGerentes INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel3_id
		PRIMARY KEY CLUSTERED (idGerentes),
	puesto VARCHAR(225) NOT NULL,
	proyecto INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.puestosAdministrativos (
	idAdministrativos INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel35_id
		PRIMARY KEY CLUSTERED (idAdministrativos),
	puesto VARCHAR(225) NOT NULL,
	proyecto INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.puestosEspecialistas (
	idEspecialistas INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel4_id
		PRIMARY KEY CLUSTERED (idEspecialistas),
	puesto VARCHAR(225) NOT NULL,
	proyecto INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.puestosTecnicos (
	idTecnicos INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_nivel5_id
		PRIMARY KEY CLUSTERED (idTecnicos),
	puesto VARCHAR(225) NOT NULL,
	proyecto INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO