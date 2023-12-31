USE [DBSIMFCOH_PRB]
GO
/****** Object:  Schema [rrhh]    Script Date: 30/11/2023 8:58:18 ******/
CREATE SCHEMA [rrhh]
GO
/****** Object:  Table [rrhh].[accionPersonal]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[accionPersonal](
	[idAccionPersonal] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[fechaSolicitud] [date] NOT NULL,
	[tipoAccion] [int] NOT NULL,
	[cantidadDias] [int] NOT NULL,
	[Comentarios] [varchar](max) NULL,
	[desde] [datetime] NOT NULL,
	[hasta] [datetime] NOT NULL,
	[AprobadoN1] [int] NULL,
	[AprobadoN2] [int] NULL,
	[fechaCreado] [datetime] NOT NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[estado] [int] NOT NULL,
	[comentariosN1] [varchar](max) NULL,
	[comentariosN2] [varchar](max) NULL,
	[fechaAprobadoN1] [datetime] NULL,
	[fechaAprobadoN2] [datetime] NULL,
	[cancelado] [int] NULL,
	[fechaCancelado] [datetime] NULL,
	[comentariosCancelado] [varchar](max) NULL,
 CONSTRAINT [PK_idAccionPersonal_id] PRIMARY KEY CLUSTERED 
(
	[idAccionPersonal] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[adjuntos]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[adjuntos](
	[idAdjunto] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[foto] [varchar](100) NULL,
	[dniFront] [varchar](100) NULL,
	[dniBack] [varchar](100) NULL,
	[cv] [varchar](100) NULL,
	[penales] [varchar](100) NULL,
	[policiales] [varchar](100) NULL,
	[pasaporte] [varchar](100) NULL,
	[licenciaCarroFront] [varchar](100) NULL,
	[licenciaCarroBack] [varchar](100) NULL,
	[licenciaMotoFront] [varchar](100) NULL,
	[licenciaMotoBack] [varchar](100) NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Adjuntos_id] PRIMARY KEY CLUSTERED 
(
	[idAdjunto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[antecedentesLaborales]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[antecedentesLaborales](
	[idAntecedentes] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[empresa] [varchar](255) NOT NULL,
	[tipoEmpresa] [varchar](255) NOT NULL,
	[direccion] [varchar](max) NOT NULL,
	[telefono] [varchar](100) NULL,
	[ultimoPuesto] [varchar](100) NULL,
	[jefeInmediato] [varchar](100) NOT NULL,
	[telJefe] [varchar](100) NULL,
	[ingreso] [date] NOT NULL,
	[retiro] [date] NOT NULL,
	[sueldoInicial] [decimal](13, 2) NULL,
	[sueldoFinal] [decimal](13, 2) NULL,
	[causaRetiro] [varchar](max) NOT NULL,
	[obligaciones] [varchar](max) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_AntecedentesLaborales_id] PRIMARY KEY CLUSTERED 
(
	[idAntecedentes] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[conocidos]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[conocidos](
	[idConocido] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[nombre] [varchar](100) NOT NULL,
	[parentesco] [varchar](100) NULL,
	[tiempoConocerlo] [varchar](100) NOT NULL,
	[empresaLabora] [varchar](100) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Conocidos_id] PRIMARY KEY CLUSTERED 
(
	[idConocido] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[direcciones]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[direcciones](
	[idDireccion] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[direccion] [varchar](max) NOT NULL,
	[latitud] [varchar](50) NOT NULL,
	[longitud] [varchar](50) NOT NULL,
	[ZONA] [varchar](max) NULL,
	[fechaCreado] [datetime] NOT NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[estado] [int] NOT NULL,
 CONSTRAINT [PK_Direcciones_id] PRIMARY KEY CLUSTERED 
(
	[idDireccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[educacion]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[educacion](
	[idEducacion] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[nivel] [varchar](100) NULL,
	[centroEducativo] [varchar](255) NOT NULL,
	[estudio] [varchar](255) NOT NULL,
	[desde] [int] NOT NULL,
	[hasta] [int] NOT NULL,
	[lugar] [varchar](100) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Educacion_id] PRIMARY KEY CLUSTERED 
(
	[idEducacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[empleados]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[empleados](
	[idEmpleado] [int] IDENTITY(1,1) NOT NULL,
	[DNI] [varchar](20) NOT NULL,
	[primerNombre] [varchar](100) NOT NULL,
	[segundoNombre] [varchar](100) NULL,
	[primerApellido] [varchar](100) NOT NULL,
	[segundoApellido] [varchar](100) NULL,
	[telefono] [varchar](100) NOT NULL,
	[fechaNacimiento] [date] NOT NULL,
	[lugarNacimiento] [varchar](100) NULL,
	[nacionalidad] [varchar](100) NULL,
	[estadoCivil] [varchar](100) NULL,
	[genero] [varchar](100) NULL,
	[email] [varchar](100) NOT NULL,
	[cuentaBancaria] [varchar](20) NOT NULL,
	[vencimientoLicencia] [date] NULL,
	[vencimientoLicenciaMoto] [date] NULL,
	[vencimientoPasaporte] [date] NULL,
	[estado] [bit] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Empleado_id] PRIMARY KEY CLUSTERED 
(
	[idEmpleado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[empleadosTemp]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[empleadosTemp](
	[id] [int] NOT NULL,
	[dni] [varchar](100) NOT NULL,
	[nombre] [varchar](100) NULL,
	[proyecto] [int] NOT NULL,
	[viverista] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[estadoCivil]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[estadoCivil](
	[idEstadoCivil] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](100) NOT NULL,
 CONSTRAINT [PK_EstadoCivil_id] PRIMARY KEY CLUSTERED 
(
	[idEstadoCivil] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[estadosAccion]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[estadosAccion](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[estado] [varchar](200) NOT NULL,
	[descripcion] [varchar](200) NOT NULL,
 CONSTRAINT [PK_estadosAccion_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[estudiosActuales]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[estudiosActuales](
	[idEstudiante] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[carrera] [varchar](100) NOT NULL,
	[horaEntrada] [varchar](10) NOT NULL,
	[horaSalida] [varchar](10) NOT NULL,
	[finalizacion] [date] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
	[estado] [int] NULL,
 CONSTRAINT [PK_Estudiante_id] PRIMARY KEY CLUSTERED 
(
	[idEstudiante] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[historiaFamiliar]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[historiaFamiliar](
	[idHistorial] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[nombre] [varchar](100) NULL,
	[parentesco] [varchar](100) NOT NULL,
	[fechaNacimiento] [date] NULL,
	[direccion] [varchar](255) NOT NULL,
	[telefono] [varchar](100) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
	[estado] [int] NULL,
 CONSTRAINT [PK_HistoriaFamiliar_id] PRIMARY KEY CLUSTERED 
(
	[idHistorial] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[historial]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[historial](
	[idHistorial] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[codigoEmpleado] [varchar](50) NOT NULL,
	[codigoSAP] [varchar](50) NULL,
	[ingreso] [date] NULL,
	[Retiro] [date] NULL,
	[telefonoAsignado] [varchar](50) NULL,
	[emailAsignado] [varchar](80) NULL,
	[idUsuario] [int] NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
	[superUsuario] [bit] NULL,
 CONSTRAINT [PK_Historial_id] PRIMARY KEY CLUSTERED 
(
	[idHistorial] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[historialDetalle]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[historialDetalle](
	[idHistorialDetalle] [int] IDENTITY(1,1) NOT NULL,
	[idHistorial] [int] NOT NULL,
	[fechaInicio] [date] NULL,
	[fechaRetiro] [date] NULL,
	[idProyecto] [int] NOT NULL,
	[idDepartamento] [int] NOT NULL,
	[sitio] [varchar](100) NULL,
	[idTDR] [int] NOT NULL,
	[salario] [decimal](13, 2) NULL,
	[idJefe] [int] NULL,
	[fechaCreado] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
	[manejaPersonal] [bit] NULL,
	[perteneceRRHH] [bit] NULL,
	[jefeProyecto] [int] NULL,
 CONSTRAINT [PK_HistorialDetalle_id] PRIMARY KEY CLUSTERED 
(
	[idHistorialDetalle] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[idiomas]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[idiomas](
	[idIdioma] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[idioma] [varchar](100) NULL,
	[porcentaje] [int] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
	[estado] [int] NULL,
 CONSTRAINT [PK_Idioma_id] PRIMARY KEY CLUSTERED 
(
	[idIdioma] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[infoVacaciones]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[infoVacaciones](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tiempoAnio] [int] NOT NULL,
	[vacaciones] [int] NOT NULL,
	[acumulado] [int] NULL,
 CONSTRAINT [PK_idTablaVacaciones_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[modulo]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[modulo](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](max) NOT NULL,
	[estado] [int] NOT NULL,
 CONSTRAINT [PK_modulo_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[permisos]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[permisos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[submodulo] [int] NOT NULL,
	[estado] [int] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_permisos_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[puestos]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[puestos](
	[idPuesto] [int] IDENTITY(1,1) NOT NULL,
	[nombrePuesto] [varchar](225) NOT NULL,
	[nivel] [int] NOT NULL,
	[idProyecto] [int] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_puestos_id] PRIMARY KEY CLUSTERED 
(
	[idPuesto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[referencias]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[referencias](
	[idReferencia] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[nombre] [varchar](100) NOT NULL,
	[profesion] [varchar](100) NOT NULL,
	[direccion] [varchar](100) NOT NULL,
	[telefono] [varchar](100) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Referencias_id] PRIMARY KEY CLUSTERED 
(
	[idReferencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[salud]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[salud](
	[idSalud] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[contactoEmergencia1] [varchar](100) NOT NULL,
	[tel1] [varchar](20) NOT NULL,
	[contactoEmergencia2] [varchar](100) NULL,
	[tel2] [varchar](20) NOT NULL,
	[tipoSangre] [varchar](10) NOT NULL,
	[enfermedades] [varchar](max) NOT NULL,
	[medico] [varchar](100) NOT NULL,
	[telMedico] [varchar](20) NOT NULL,
	[centroMedico] [varchar](100) NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
	[fechaModificado] [datetime] NULL,
	[usuarioCreado] [varchar](100) NOT NULL,
	[usuarioModificado] [varchar](100) NULL,
 CONSTRAINT [PK_Salud_id] PRIMARY KEY CLUSTERED 
(
	[idSalud] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[submodulo]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[submodulo](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[modulo] [int] NOT NULL,
	[nombre] [varchar](max) NOT NULL,
	[ruta] [varchar](max) NOT NULL,
	[estado] [int] NOT NULL,
 CONSTRAINT [PK_submodulo_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[tipoAccion]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[tipoAccion](
	[idAccion] [int] IDENTITY(1,1) NOT NULL,
	[accion] [varchar](200) NOT NULL,
	[descripcion] [varchar](255) NULL,
	[diasPermiso] [int] NULL,
 CONSTRAINT [PK_tipoAccion_id] PRIMARY KEY CLUSTERED 
(
	[idAccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [rrhh].[vacaciones]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh].[vacaciones](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[vacacionesDisponibles] [int] NOT NULL,
	[vacacionesAcumuladas] [int] NOT NULL,
	[fechaCreado] [datetime] NOT NULL,
 CONSTRAINT [PK_Vacaciones_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [rrhh].[accionPersonal] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[accionPersonal] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [rrhh].[adjuntos] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[antecedentesLaborales] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[conocidos] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[direcciones] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[direcciones] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [rrhh].[educacion] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[empleados] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[estudiosActuales] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[estudiosActuales] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [rrhh].[historiaFamiliar] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[historiaFamiliar] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [rrhh].[historial] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[historial] ADD  DEFAULT ((0)) FOR [superUsuario]
GO
ALTER TABLE [rrhh].[historialDetalle] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[historialDetalle] ADD  DEFAULT ((0)) FOR [manejaPersonal]
GO
ALTER TABLE [rrhh].[historialDetalle] ADD  DEFAULT ((0)) FOR [perteneceRRHH]
GO
ALTER TABLE [rrhh].[idiomas] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[idiomas] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [rrhh].[permisos] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[puestos] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[referencias] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[salud] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
ALTER TABLE [rrhh].[vacaciones] ADD  DEFAULT (getdate()) FOR [fechaCreado]
GO
/****** Object:  StoredProcedure [rrhh].[actualizarAccionPersonalYVacaciones]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [rrhh].[actualizarAccionPersonalYVacaciones]
  
    @idAccionPersonal INT,
	@estado INT,
	@comentarios VARCHAR(MAX),
	@usuario INT
AS
BEGIN

    -- DECLARACIÓN DE VARIABLES
    DECLARE @idEmpleado INT, 
			@vacacionesAcumuladas INT,
            @diasVacaciones INT, 
			@vacacionesDisponibles INT,
            @tiempo INT, 
			@deberiaTener INT, 
			@nuevasVacacionesDisponibles INT, 
			@ganado INT, 
			@disponible INT, 
			@tipoAccion INT;


	--ACTUALIZAR LA ACCIÓN DE PERSONAL
	UPDATE rrhh.accionPersonal
    SET estado=@estado,
    ComentariosN2=@comentarios,
    fechaAprobadoN2=GETDATE(),
    AprobadoN2=@usuario
    WHERE idAccionPersonal=@idAccionPersonal;


	
	--CAPTURA DE INFORMACIÓN DE LA TABLA DE ACCION DE PERSONAL
    SELECT	@diasVacaciones=cantidadDias, 
			@tipoAccion=tipoAccion 
	FROM rrhh.accionPersonal 
	WHERE idAccionPersonal=@idAccionPersonal;


	--SI EL TIPO DE ACCIÓN ES PENDIENTE
	IF @tipoAccion=1
	BEGIN
		
		--CAPTURA DEL ID DEL EMPLEADO, VACACIONES ACUMULADAS Y VACACIONES DISPONIBLES EN LA TABLA DE VACACIONES.
		SELECT TOP 1	@idEmpleado = idEmpleado, 
						@vacacionesAcumuladas = vacacionesAcumuladas, 
						@disponible =vacacionesDisponibles
		FROM rrhh.vacaciones
		WHERE idEmpleado = (SELECT idEmpleado FROM rrhh.accionPersonal WHERE idAccionPersonal = @idAccionPersonal)
		ORDER BY fechaCreado DESC;

		--CALCULAR LOS AÑOS TRABAJADOS EN LA EMPRESA
		SELECT @tiempo= DATEDIFF(year, ingreso, GETDATE()) 
		FROM rrhh.historial 
		WHERE idEmpleado=@idEmpleado;


		--CAPTURAR LAS VACACIONES ACUMULADAS SEGUN FECHA DE INGRESO DEL EMPLEADO
		SELECT	@deberiaTener = acumulado, 
				@ganado = vacaciones 
		FROM rrhh.infoVacaciones 
		WHERE tiempoAnio=@tiempo;


		--SI LAS VACACIONES ACUMULADAS NO CONCUERDAN CON LAS QUE DEBERIA TENER
		IF @vacacionesAcumuladas<>@deberiaTener 
			BEGIN
				SET @nuevasVacacionesDisponibles = @ganado+@disponible;
				SET @nuevasVacacionesDisponibles = @nuevasVacacionesDisponibles - @diasVacaciones
				INSERT INTO rrhh.vacaciones(idEmpleado,vacacionesDisponibles,vacacionesAcumuladas)
				VALUES (@idEmpleado,@nuevasVacacionesDisponibles,@deberiaTener);
			END

		--SI LAS VACACIONES SON LAS QUE DEBERIA TENER SOLO RESTA
		ELSE
		
			BEGIN
				SET @nuevasVacacionesDisponibles = @disponible - @diasVacaciones
				INSERT INTO rrhh.vacaciones(idEmpleado,vacacionesDisponibles,vacacionesAcumuladas)
				VALUES (@idEmpleado,@nuevasVacacionesDisponibles,@deberiaTener);
			END
	END

END;
GO
/****** Object:  StoredProcedure [rrhh].[agregarPermisos]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		BRIDIS AIDA LOPEZ
-- Create date: 29/11/2023
-- Description:	Agrega/Actualiza permisos del modulo de RRHH
-- =============================================
CREATE PROCEDURE [rrhh].[agregarPermisos]
	-- Add the parameters for the stored procedure here
	@idEmpleado INT,
	@submodulo INT,
	@usuario INT,
	@estado INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	DECLARE @idPermiso INT;
   
	--Captura el id del permiso correspondiente al empleado
	SELECT @idPermiso=id FROM rrhh.permisos WHERE idEmpleado=@idEmpleado AND submodulo=@submodulo

	IF @idPermiso IS NULL
		BEGIN
			-- Ya que @idPermiso es NULL, no existe un permiso, entonces inserta uno nuevo
			INSERT INTO rrhh.permisos(idEmpleado, submodulo,estado,usuarioCreado)
			VALUES (@idEmpleado, @submodulo,@estado,@usuario);
		END
	ELSE
		BEGIN
			--En caso de que ya exista solo lo actualiza
			UPDATE rrhh.permisos
			SET estado=@estado,
				fechaModificado=GETDATE(),
				usuarioModificado=@usuario
			WHERE idEmpleado=@idEmpleado AND submodulo=@submodulo
		END
END
GO
/****** Object:  StoredProcedure [rrhh].[cancelarVacaciones]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [rrhh].[cancelarVacaciones]
  
    @idAccionPersonal INT,
	@estado INT,
	@comentarios VARCHAR(MAX),
	@usuario INT
AS
BEGIN

    -- DECLARACIÓN DE VARIABLES
    DECLARE @estadoAnterior INT,
			@fechaActual DATE,
			@desde DATE,
			@hasta DATE,
			@idEmpleado INT,
			@vacacionesDisponibles INT,
			@vacacionesAcumuladas INT,
			@nuevasVacaciones INT,
			@dias INT;

	SET @fechaActual=GETDATE();


	--CAPTURDAR EL ESTADO ANTERIOR
	SELECT	@estadoAnterior=estado,
			@desde=desde,
			@hasta=hasta,
			@idEmpleado=idEmpleado,
			@dias=cantidadDias
	FROM rrhh.accionPersonal
	WHERE idAccionPersonal=@idAccionPersonal


	IF @estadoAnterior=3
		BEGIN
				--ENCUENTRA LAS ULTIMAS VACACIONES
						SELECT TOP 1 @vacacionesDisponibles=vacacionesDisponibles,
									 @vacacionesAcumuladas=vacacionesAcumuladas
						FROM rrhh.vacaciones 
						WHERE idEmpleado=@idEmpleado 
						ORDER BY id DESC

				IF @desde>@fechaActual
				BEGIN
					

					SET @nuevasVacaciones=@vacacionesDisponibles+@dias
					
					--INSERTAR LAS NUEVAS VACACIONES
					INSERT INTO rrhh.vacaciones(idEmpleado,vacacionesDisponibles,vacacionesAcumuladas)
					VALUES (@idEmpleado,@nuevasVacaciones,@vacacionesAcumuladas)
				END
			ELSE IF @hasta>@fechaActual
				BEGIN
					SET @dias = DATEDIFF(day, @fechaActual, @hasta);
					SET @nuevasVacaciones=@vacacionesDisponibles+@dias
					--INSERTAR LAS NUEVAS VACACIONES
					INSERT INTO rrhh.vacaciones(idEmpleado,vacacionesDisponibles,vacacionesAcumuladas)
					VALUES (@idEmpleado,@nuevasVacaciones,@vacacionesAcumuladas)
				END
		END

	--ACTUALIZAR LA ACCIÓN DE PERSONAL
	UPDATE rrhh.accionPersonal
	SET estado=4,
	comentariosCancelado=@comentarios,
	fechaCancelado=GETDATE(),
	cancelado=@usuario
	WHERE idAccionPersonal=@idAccionPersonal;

END;
GO
/****** Object:  StoredProcedure [rrhh].[ObtenerUltimasVacacionesEmpleado]    Script Date: 30/11/2023 8:58:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [rrhh].[ObtenerUltimasVacacionesEmpleado]
    @idEmpleado int
AS
BEGIN
    WITH VacacionesOrdenadas AS (
        SELECT 
            h.ingreso,
            DATEDIFF(YEAR, h.ingreso, GETDATE()) AS TiempoServicioAnios,
            v.vacacionesDisponibles,
            v.vacacionesAcumuladas,
            v.fechaCreado,
            ROW_NUMBER() OVER (PARTITION BY v.idEmpleado ORDER BY v.fechaCreado DESC) AS rn
        FROM 
            rrhh.historial h
        INNER JOIN 
            rrhh.vacaciones v ON h.idEmpleado = v.idEmpleado
        WHERE 
            h.idEmpleado = @idEmpleado
    )
    SELECT 
        ingreso, 
        TiempoServicioAnios,
        vacacionesDisponibles,
        vacacionesAcumuladas,
        fechaCreado
    FROM 
        VacacionesOrdenadas
    WHERE 
        rn = 1;
END;
GO
