

CREATE TABLE rrhh.empleados (
	idEmpleado INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Empleado_id
		PRIMARY KEY CLUSTERED (idEmpleado),
	primerNombre VARCHAR(100) NOT NULL,
	segundoNombre VARCHAR(100) NULL,
	primerApellido VARCHAR(100) NOT NULL,
	segundoApellido VARCHAR(100) NULL,
	telefono VARCHAR(100) NOT NULL,
	fechaNacimiento DATE NULL,
	lugarNacimiento VARCHAR(100) NULL,
	nacionalidad VARCHAR(100) NULL,
	estadoCivil VARCHAR(100) NULL,
	genero VARCHAR(100) NULL,
	direccion VARCHAR(255) NOT NULL,
	ciudad VARCHAR(100) NULL,
	pasatiempos VARCHAR(MAX) NULL,
	email VARCHAR(100) NOT NULL,
	idProfesion INT NOT NULL,
	idiomas VARCHAR(255) NULL,
	estado BIT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.antecedentesLaborales (
	idAntecedentes INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_AntecedentesLaborales_id
		PRIMARY KEY CLUSTERED (idAntecedentes),
	idEmpleado INT NOT NULL,
	empresa VARCHAR(255) NOT NULL,
	telefono VARCHAR(100) NULL,
	ultimoPuesto VARCHAR(100) NULL,
	jefeInmediato VARCHAR(100) NOT NULL,
	puestoJefe VARCHAR(100)  NULL,
	ingreso DATE NOT NULL,
	retiro DATE NOT NULL,
	sueldoIniciar DECIMAL(13,2) NULL,
	sueldoFinal DECIMAL(13,2) NULL,
	causaRetiro VARCHAR(MAX) NOT NULL,
	obligaciones VARCHAR(MAX) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.educacion (
	idEducacion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Educacion_id
		PRIMARY KEY CLUSTERED (idEducacion),
	idEmpleado INT NOT NULL,
	nivel VARCHAR(100) NULL,
	centroEducativo VARCHAR(255) NOT NULL,
	desde DATE NOT NULL,
	hasta DATE NOT NULL,
	lugar VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.historiaFamiliar (
	idHistorial INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_HistoriaFamiliar_id
		PRIMARY KEY CLUSTERED (idHistorial),
	idEmpleado INT NOT NULL,
	nombre VARCHAR(100) NULL,
	parentesco VARCHAR(100) NOT NULL,
	fechaNacimiento DATE NULL,
	direccion VARCHAR(255) NOT NULL,
	telefono VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.vehiculoPropio (
	idVehiculo INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_VehiculoPropio_id
		PRIMARY KEY CLUSTERED (idVehiculo),
	idEmpleado INT NOT NULL,
	tipoVehiculo VARCHAR(100) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.esEstudiante (
	idEstudiante INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Estudiante_id
		PRIMARY KEY CLUSTERED (idEstudiante),
	idEmpleado INT NOT NULL,
	carrera VARCHAR(100) NULL,
	horario VARCHAR(100) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.referencias (
	idReferencia INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Referencias_id
		PRIMARY KEY CLUSTERED (idReferencia),
	idEmpleado INT NOT NULL,
	profesion VARCHAR(100) NULL,
	direccion VARCHAR(100) NULL,
	telefono VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.conocidos (
	idConocido INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Conocidos_id
		PRIMARY KEY CLUSTERED (idConocido),
	idEmpleado INT NOT NULL,
	nombre VARCHAR(100) NULL,
	parentesco VARCHAR(100) NULL,
	tiempoConocerlo VARCHAR(100) NULL,
	empresaLabora VARCHAR(100) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.historialEmpleado (
	idHistorialEmpleado INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_historialEmpleado_id
		PRIMARY KEY CLUSTERED (idHistorialEmpleado),
	idEmpleado INT NOT NULL,
	desde DATE NULL,
	hasta DATE NULL,
	salario DECIMAL(13,2) NULL,
	idTDR VARCHAR(100) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

/*  Perfil de Puesto  */

CREATE TABLE rrhh.perfilTDR (
	idTDR INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_perfilTDR_id
		PRIMARY KEY CLUSTERED (idTDR),
	idProfesion INT NOT NULL,
	objetivo VARCHAR(100) NULL,
	remuneracion DECIMAL(13,2) NULL,
	beneficios VARCHAR(100) NULL,
	horario VARCHAR(100) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.formacionTDR (
	idFormacion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Formacion_id
		PRIMARY KEY CLUSTERED (idFormacion),
	idTDR INT NOT NULL,
	descripcion VARCHAR(MAX) NULL,
	ponderacion INT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.responsabilidades (
	idResponsabilidades INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Responsabilidades_id
		PRIMARY KEY CLUSTERED (idResponsabilidades),
	idTDR INT NOT NULL,
	descripcion VARCHAR(MAX) NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO
CREATE TABLE rrhh.habilidades (
	idHabilidades INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Habilidades_id
		PRIMARY KEY CLUSTERED (idHabilidades),
	idTDR INT NOT NULL,
	descripcion VARCHAR(MAX) NULL,
	ponderacion INT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO