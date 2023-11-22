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



/* DIRECTOR DE PROYECTO */


SELECT * FROM rrhh.historial WHERE idEmpleado=7

SELECT idProyecto FROM rrhh.historialDetalle WHERE idHistorial=83

SELECT *from rrhh.puestos where idProyecto=9 and nivel=1

SELECT *FROM rrhh.historialDetalle where idTDR=46

SELECT *FROM rrhh.historial where idHistorial=109

SELECT *FROM rrhh.empleados where idEmpleado=36