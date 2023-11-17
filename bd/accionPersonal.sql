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
	estado INT NOT NULL DEFAULT 1,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
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
	fechaModificado DATETIME NULL,
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
