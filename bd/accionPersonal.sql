CREATE TABLE rrhh.accionPersonal (
	idAccionPersonal INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_idAccionPersonal_id
		PRIMARY KEY CLUSTERED (idAccionPersonal),
	idEmpleado INT NOT NULL,
	fechaSolicitud DATE NOT NULL,
    tipoAccion INT NOT NULL,
    cantidadDias INT NOT NULL,
    Comentarios VARCHAR(MAX) NULL,
    desde DATETIME NOT NULL,
    hasta DATETIME NOT NULL,
	AprobadoN1 INT NULL,
	AprobadoN2 INT NULL,
	fechaAprobadoN1 DATETIME NULL,
	fechaAprobadoN2 DATETIME NULL,
	estado INT NOT NULL DEFAULT 1,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.estadosAccion (
	id INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_estadosAccion_id
		PRIMARY KEY CLUSTERED (id),
	estado INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,1530
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.tipoAccion (
	id INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_idTipoAccion_id
		PRIMARY KEY CLUSTERED (id),
	descripcion DATE NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.vacaciones (
	id INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Vacaciones_id
		PRIMARY KEY CLUSTERED (id),
	idEmpelado INT NOT NULL,
	vacacionesDisponibles INT NOT NULL,
	vacacionesAcumuladas INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
);
GO


CREATE TABLE rrhh.infoVacaciones (
	id INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_idTablaVacaciones_id
		PRIMARY KEY CLUSTERED (id),
	tiempoAnio int NOT NULL,
	vacaciones int NOT NULL,
GO

INSERT INTO rrhh.infoVacaciones (tiempoAnio, vacaciones) VALUES (1, 10);
INSERT INTO rrhh.infoVacaciones (tiempoAnio, vacaciones) VALUES (2, 12);
INSERT INTO rrhh.infoVacaciones (tiempoAnio, vacaciones) VALUES (3, 15);
INSERT INTO rrhh.infoVacaciones (tiempoAnio, vacaciones) VALUES (4, 20);

