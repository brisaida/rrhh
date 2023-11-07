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