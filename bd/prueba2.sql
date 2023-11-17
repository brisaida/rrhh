CREATE VIEW perfilCliente.vw_tecnologiasPorCliente AS

SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Prácticas Culturales' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.practicaCultural = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Gestión de Recursos Naturales' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.gestionRecursos = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Manejo de Plagas y Enfermedades' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.manejoPlagas = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Fertilidad y Conservación del Suelo' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.fertilidadYConservacion = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Mitigación del Cambio Climático' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.mitigacionYCambio = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Adaptación al Clima/Gestión del Riesgo Climático' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.adaptacionClima = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Manipulación y Almacenamiento Poscosecha' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.manipulacionPostcosecha = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Tratamiento con Valor Añadido' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.tratamientoValorAniadido = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Pecuarias' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.pecuarias = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Mercadeo' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.mercadeo = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'

UNION ALL


SELECT 
    tClientes.numeroDNI,
	CONCAT(tClientes.nombre,' ',
	tClientes.apellido) as nombre,
	tTiposTecno.descripcionTipoTecnologia,
    tLotes.loteCultivoCodigo,
    tProductos.descripcionAreaInversionAsunto AS [Area de Inversion],
    tTecnologias.descripcionTecnologia AS [Tecnologia],
    'Administrativas' AS [Práctica o Gestión Aplicada]
FROM perfilcliente.tblClientesLotesCultivos AS tLotes

LEFT JOIN       perfilcliente.tblClientes                            AS tClientes        ON tClientes.idPerfilCliente        = tLotes.idPerfilCliente
INNER JOIN      configuracion.tblDepartamentosEstados                AS tDeptos          ON tDeptos.idDepartamento           = tClientes.idDepartamento
LEFT JOIN       perfilcliente.tblDepartamentoAjustado                AS tAjustado        ON tClientes.idMunicipio            = tAjustado.idMunicipio
LEFT JOIN       configuracion.tblDepartamentosEstados                AS tDeptos2         ON tDeptos2.idDepartamento          = tAjustado.idDepartamento
LEFT JOIN       seguridad.tblUsuarios                                AS tTecnicos        ON tTecnicos.idUsuario              = tClientes.idUsuarioTecnicoPropietario
LEFT JOIN       proyectos.tblTecnicosEquipoColaboradores             AS tEquipo          ON tEquipo.idUsuario_Colaborador    = tTecnicos.idUsuario
LEFT JOIN       seguridad.tblUsuarios                                AS tGerente         ON tGerente.idUsuario               = tEquipo.idUsuario_Propietario
INNER JOIN      perfilcliente.tblClientesTecnologias                 AS tClTecnologias   ON tClTecnologias.idLoteCultivo     = tLotes.idLoteCultivo    
INNER JOIN      perfilcliente.tblTiposTecnologias                    AS tTiposTecno      ON tTiposTecno.idTipoTecnologia     = tClTecnologias.idTipoTecnologia
INNER JOIN      perfilcliente.tblTecnologias                         AS tTecnologias     ON tClTecnologias.idTecnologia      = tTecnologias.idTecnologia
INNER JOIN      perfilcliente.tblTiposClientes                       AS tTiposClien      ON tTiposClien.idTipoCliente        = tClientes.idTipoCliente
INNER JOIN      perfilcliente.tblProductos                           AS tProductos       ON tProductos.idProducto            = tLotes.idProducto
INNER JOIN      perfilcliente.tblTipoProducto                        AS tTiposProduc     ON tTiposProduc.idTipoProducto      = tLotes.idTipoProducto
WHERE tLotes.estadoLotesCultivo = 1 
    AND tClTecnologias.estadoTecnologia = 1 
    AND tTecnologias.administrativas = 1
    AND tClTecnologias.fechaImplementacion BETWEEN '2021-10-01' AND '2028-09-30'
