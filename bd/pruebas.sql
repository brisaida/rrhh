SELECT 
    e.primerNombre,
    e.primerApellido,
    u.accesoUsuario,
	u.estadoCuenta
FROM 
    DBSIMFCOH_PRB.rrhh.empleados AS e
LEFT JOIN 
    DBSIMFCOH.seguridad.tblusuarios AS u
ON 
    e.primerNombre = u.nombre AND e.primerApellido = u.apellido
WHERE e.estado=1
ORDER BY e.primerNombre, e.segundoNombre, e.primerApellido


SELECT	e.idEmpleado,
		CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.primerApellido,' ',e.segundoApellido) as nombreCompleto,
		h.codigoEmpleado,
		h.ingreso,
		hd.idTDR,
		
		hd.idDepartamento,
		hd.idJefe
FROM rrhh.empleados e
INNER JOIN rrhh.historial h ON h.idEmpleado=e.idEmpleado
INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
INNER JOIN rrhh.puestos p ON p.idPuesto=hd.idTDR
INNER JOIN configuracion.tblDepartamentosEstados dp ON dp.idDepartamento=hd.idDepartamento
WHERE e.idEmpleado=4



