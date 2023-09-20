/* Ficha de empleado */

CREATE TABLE rrhh.empleados (
	idEmpleado INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Empleado_id
		PRIMARY KEY CLUSTERED (idEmpleado),
	foto VARCHAR(100) NOT NULL,
	DNI VARCHAR(20) NOT NULL,
	primerNombre VARCHAR(100) NOT NULL,
	segundoNombre VARCHAR(100) NULL,
	primerApellido VARCHAR(100) NOT NULL,
	segundoApellido VARCHAR(100) NULL,
	telefono VARCHAR(100) NOT NULL,
	fechaNacimiento DATE NOT NULL,
	lugarNacimiento VARCHAR(100) NULL,
	nacionalidad VARCHAR(100) NULL,
	estadoCivil VARCHAR(100) NULL,
	genero VARCHAR(100) NULL,
	ciudad VARCHAR(100) NULL,
	email VARCHAR(100) NOT NULL,
	estado BIT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.direcciones(
	idDireccion INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Direcciones_id
		PRIMARY KEY CLUSTERED (idDireccion),
		idEmpleado INT NOT NULL,
		direccion VARCHAR(MAX) NOT NULL,
		latitud VARCHAR(50) NOT NULL,
		longitud VARCHAR(50) NOT NULL,
		fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
		usuarioCreado VARCHAR(100) NOT NULL,
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

CREATE TABLE rrhh.conocidos (
	idConocido INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Conocidos_id
		PRIMARY KEY CLUSTERED (idConocido),
	idEmpleado INT NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	parentesco VARCHAR(100) NULL,
	tiempoConocerlo VARCHAR(100) NOT NULL,
	empresaLabora VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.salud (
	idSalud INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Salud_id
		PRIMARY KEY CLUSTERED (idSalud),
	idEmpleado INT NOT NULL,
	contactoEmergencia1 VARCHAR(100) NOT NULL,
	tel1 VARCHAR(20) NOT NULL,
	contactoEmergencia2 VARCHAR(100) NULL,
	tel2 VARCHAR(20) NOT NULL,
	tipoSangre VARCHAR(10) NOT NULL,
	enfermedades VARCHAR(MAX) NOT NULL,
	medico VARCHAR(100) NOT NULL,
	telMedico VARCHAR(20) NOT NULL,
	centroMedico VARCHAR(100) NOT NULL,
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
	estudio VARCHAR(255) NOT NULL,
	desde DATE NOT NULL,
	hasta DATE NOT NULL,
	lugar VARCHAR(100) NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.idiomas (
	idIdioma INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Idioma_id
		PRIMARY KEY CLUSTERED (idIdioma),
	idEmpleado INT NOT NULL,
	idioma VARCHAR(100) NULL,
	porcentaje INT NOT NULL,
	fechaCreado DATETIME NOT NULL DEFAULT GETDATE(),
	fechaModificado DATETIME NULL,
	usuarioCreado VARCHAR(100) NOT NULL,
	usuarioModificado VARCHAR(100) NULL
);
GO

CREATE TABLE rrhh.estudiosActuales (
	idEstudiante INT IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Estudiante_id
		PRIMARY KEY CLUSTERED (idEstudiante),
	idEmpleado INT NOT NULL,
	carrera VARCHAR(100) NOT NULL,
	horaEntrada TIME NOT NULL,
	horaSalida TIME NOT NULL,
	finalización DATE NOT NULL,
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
	sueldoInicial DECIMAL(13,2) NULL,
	sueldoFinal DECIMAL(13,2) NULL,
	causaRetiro VARCHAR(MAX) NOT NULL,
	obligaciones VARCHAR(MAX) NOT NULL,
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